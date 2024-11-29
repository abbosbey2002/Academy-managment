<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $transactionsQuery = Payment::with('invoice', 'student');

        if ($search) {
            $transactionsQuery->whereHas('student', function($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                        $subQuery->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$search}%"]);
                    });
            })->orWhereHas('invoice', function($query) use ($search) {
                if (Schema::hasColumn('invoices', 'order_number')) {
                    $query->where('invoice_number', 'like', "%{$search}%");
                }
            });
        }

        $payments = $transactionsQuery->orderBy('created_at', 'desc')->paginate(10);
        
        // Transactionlarni student ma'lumotlari bilan birga olish
       $transactions = Transaction::with('student')->orderBy('created_at', 'desc')->paginate(20);

        
        // Transactionlarni yig'ish
        $allTransactions = Transaction::all();
        
        return view('pages.transactions.index', compact('payments', 'transactions', 'allTransactions'));
    }

    public function create()
    {
        return view('pages.transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'comment' => 'nullable',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transaction.index')->with('success', 'Payment created successfully.');
    }

    public function show(Transaction $transaction)
    {
    
        // Transaction bilan birga student va group ma'lumotlarini olish
        return view('pages.transactions.view', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('pages.transactions.edit', compact('transaction'));
    }

    public function update(Request $request,Transaction $transaction)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'comment' => 'nullable',
        ]);

        $payment->update($request->all());

        return redirect()->route('transaction.index')->with('success', 'Payment updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transaction.index')->with('success', 'Payment deleted successfully.');
    }
}
