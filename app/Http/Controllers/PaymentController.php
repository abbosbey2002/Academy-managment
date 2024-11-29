<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
public function index(Request $request)
{
    // Retrieve search and filter inputs
    $search = $request->input('search');
    $length = $request->input('paymentList_length', 10);
    $dateRange = $request->input('date_range', 'all');  // Default to 'all' if not provided
    $selectedYear = $request->input('year', now()->year);  // Default to the current year

    // Initialize query with eager loading of related models
    $transactionsQuery = Payment::with('invoice', 'student');

    // Apply search filters if search term is provided
    // Apply search filters if search term is provided
    if ($search) {
        $transactionsQuery->where(function($query) use ($search) {
            // Search by student names
            $query->where(function($q) use ($search) {
                // Search by student's full name
                $q->whereHas('student', function($q) use ($search) {
                    $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
                });
                // Search by payment amount
                $q->orWhere('amount', 'like', "%{$search}%");

                // Search by create_time (date) - assuming search input is in YYYY-MM-DD format
                $q->orWhereDate('create_time', $search);
            });

        });
    }

    // Apply year filter (always apply)
    if ($selectedYear) {
        $transactionsQuery->whereYear('create_time', $selectedYear);
    }

    // Apply date range filters if provided
    if ($dateRange && $dateRange != 'all') {
        switch ($dateRange) {
            case 'day':
                $transactionsQuery->whereDate('create_time', '=', now()->toDateString());
                break;
            case 'week':
                $transactionsQuery->whereBetween('create_time', [now()->startOfWeek(), now()->endOfWeek()]);
                break;
            case 'month':
                $transactionsQuery->whereMonth('create_time', now()->month)
                                  ->whereYear('create_time', $selectedYear);
                break;
            case 'quarter':
                $transactionsQuery->whereBetween('create_time', [now()->firstOfQuarter(), now()->lastOfQuarter()]);
                break;
        }
    }

    // Paginate results
    $payments = $transactionsQuery->orderBy('create_time', 'desc')->paginate($length);

    // Get current and previous month/year details
    $currentMonth = now()->month;
    $currentYear = now()->year;
    $previousMonth = now()->subMonth()->month;
    $previousMonthYear = now()->subMonth()->year;

    // Calculate total amounts and percentage changes
    $totalPaidAmount = $this->calculateTotalAmount('2', $currentMonth, $currentYear);
    $totalPaidAmountLastMonth = $this->calculateTotalAmount('2', $previousMonth, $previousMonthYear);
    $percentageChange = $this->calculatePercentageChange($totalPaidAmount, $totalPaidAmountLastMonth);

    $totalUnpaidAmount = $this->calculateTotalAmount('1', $currentMonth, $currentYear);
    $totalUnpaidAmountLastMonth = $this->calculateTotalAmount('1', $previousMonth, $previousMonthYear);
    $percentageChangeUnpaid = $this->calculatePercentageChange($totalUnpaidAmount, $totalUnpaidAmountLastMonth);

    $totalCancelAmount = $this->calculateTotalAmount('-2', $currentMonth, $currentYear);
    $totalCancelAmountLastMonth = $this->calculateTotalAmount('-2', $previousMonth, $previousMonthYear);
    $percentageChangeCancel = $this->calculatePercentageChange($totalCancelAmount, $totalCancelAmountLastMonth);

    // Get distinct years for filtering
    $years = Payment::select(DB::raw('YEAR(create_time) as year'))
                    ->distinct()
                    ->orderBy('year', 'desc')
                    ->pluck('year');
    
    if ($request->ajax()) {
        // Render only the payment list and pagination as JSON response
        $html = view('pages.payments.partials._payments_table', compact('payments'))->render();  // Ensure this partial only contains table rows <tr> tags
        $pagination = $payments->links('components.pagination')->render();  // Adjust the path according to your pagination component

        return response()->json(['html' => $html, 'pagination' => $pagination]);
    }
    // Return view with data
    return view('pages.payments.index', compact(
        'payments',
        'years',
        'totalPaidAmount',
        'percentageChange',
        'totalUnpaidAmount',
        'percentageChangeUnpaid',
        'totalCancelAmount',
        'percentageChangeCancel'
    ));
}

    // Helper function to calculate total amount by state and time period
    private function calculateTotalAmount($state, $month, $year)
    {
        return Payment::where('state', $state)
                    ->whereMonth('create_time', $month)
                    ->whereYear('create_time', $year)
                    ->sum('amount');
    }

    // Helper function to calculate percentage change between two amounts
    private function calculatePercentageChange($currentAmount, $previousAmount)
    {
        if ($previousAmount > 0) {
            return (($currentAmount - $previousAmount) / $previousAmount) * 100;
        } else {
            return $currentAmount > 0 ? 100 : 0;
        }
    }


    public function create()
    {
        return view('pages.payments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'date' => 'required|date',
            'comment' => 'nullable',
        ]);

        Payment::create($request->all());
        if ($request->ajax()) {
            return view('payments.index', compact('payments'))->render();
        }

        return redirect()->route('payments.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Payment $payment)
    {
        return view('pages.payments.show', compact('payment'));
        
    }

    public function edit(Payment $payment)
    {
        return view('pages.payments.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'date' => 'required|date',
            'comment' => 'nullable',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }
}
