<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Invoice;
use App\Models\Group;
use App\Models\Billing;
use App\Models\Student;
use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Http\Request;



class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // In your OrderController or relevant controller
    // In your OrderController or relevant controller
    // OrderController.php
public function index(Request $request)
{
    $search = $request->input('search');

    $invoices = Invoice::with(['group.courses', 'group.teachers', 'group.students'])->where('status', '!=', 'bekor qilindi')
        ->where(function($query) use ($search) {
            $query->where('start_date', 'LIKE', "%{$search}%")
                ->orWhere('end_date', 'LIKE', "%{$search}%")
                ->orWhereHas('group', function ($query) use ($search) {
                    $query->where('group_name', 'LIKE', "%{$search}%")
                        ->orWhere('room', 'LIKE', "%{$search}%")
                        ->orWhereHas('courses', function ($query) use ($search) {
                            $query->where('course_name', 'LIKE', "%{$search}%");
                        })
                        ->orWhereHas('students', function ($query) use ($search) {
                            $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$search}%"]);
                        });
                });
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10); // Use paginate instead of get

    
    return view('pages.invoices.index', compact('invoices'));
}


    /**
     * Show the form for creating a new resource.
        */
    public function create(Group $group)
    {
        $group = Group::with([
            'courses',
            'teachers',
            'enrollments' => function ($query) {
                $query->withPivot('date', 'status');
            }
        ])->findOrFail($group->id);

        return view('pages.invoices.create', compact('group'));
    }



public function store(Request $request)
{
    $ipAddress = $request->ip();

    // Validation
    $validated = $request->validate([
        'students' => 'required|array',
        'students.*' => 'exists:students,id',
        'group_id' => 'required|exists:groups,id',
        'start_date' => 'required|date',
        'status' => 'nullable',
    ]);

    // Get the group
    $group = Group::findOrFail($request->group_id);

    // Calculate dates
    $startDate = \Carbon\Carbon::parse($validated['start_date']);
    $endDate = $startDate->copy()->addMonth();
    $totalDays = $startDate->diffInDays($endDate) + 1;

    // Constants
    $totalLessons = 12; // 12 lessons in one month
    $totalCost = $group->courses->cost;

    // Calculate lesson rate
    $lessonRate = $totalCost / $totalLessons;

    // Process each student
    foreach ($validated['students'] as $studentId) {
        $student = Student::find($studentId);

        if ($student) {
            // Calculate lessons and amount
            $weeksInPeriod = ceil($totalDays / 7);
            $lessonsInPeriod = $weeksInPeriod * ($totalLessons / 4);
            $amount = $totalCost; // Full lesson cost

            // Retrieve billing information
            $billing = Billing::where('student_id', $student->id)->first();

            // Create the invoice
            $invoice = Invoice::create([
                'start_date' => $startDate->format('Y-m-d'),
                'end_date' => $endDate->format('Y-m-d'),
                'group_id' => $group->id,
                'account' => "AC" . $group->created_at->format('YmdHis') . $studentId, // Ensure unique account value
                'amount' => $amount,
                'student_id' => $studentId,
                'ip_address' => $ipAddress, 
                'status' => 'sent',
            ]);

            // If billing is available, attempt to withdraw
            if ($billing) {
                // Prepare data for billing withdrawal
                $billingData = [
                    'invoice_id' => $invoice->id,
                    'amount' => $amount,
                    'student_id' => $studentId,
                    'group_id' => $group->id,
                    'month' => $startDate->format('F'),
                ];

                // Withdraw from billing
                $response = Billing::withdraw($billingData);

                // If billing amount covers the full invoice amount
                if ($billing->amount >= $amount) {
                    $invoice->update([
                        'status' => 'paid',
                    ]);
                } elseif ($billing->amount > 0 && $billing->amount < $amount) { 
                    // If billing amount is partially sufficient
                    $invoice->update([
                        'status' => 'partially paid',
                    ]);
                }

                // Check response for errors
                if (isset($response['result']['status']) && $response['result']['status'] == 'error') {
                    // Handle error (optional)
                    return redirect()->route('groups.show', $group->id)
                                    ->with('error', $response['result']['message']);
                }
            } else {
                // Handle case where billing record does not exist (optional)
                return redirect()->route('groups.show', $group->id)
                                ->with('error', 'Billing record not found for student ID ' . $studentId);
            }
        }
    }

    return redirect()->route('groups.show', $group->id)->with('success', 'Invoices created successfully.');
}




    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {   
        $transactions = Transaction::where('invoice_id', $invoice->id)->get();
      
        return view('pages.invoices.show', compact('invoice', 'transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $groups = Group::all();
        return view('pages.invoices.edit', compact('invoice', 'groups'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input data
        $validatedData = $request->validate([
            'account' => 'required|string|max:255',
            'group_id' => 'required|integer',
            'amount' => 'required|numeric',
            'status' => 'required|string',  // Consider adding stricter validation for known statuses
            'reason' => 'nullable|string|max:1000', // Consider making this required for specific statuses
        ]);

        // Retrieve the invoice by ID, or throw a 404 if not found
        $invoice = Invoice::findOrFail($id);

        // Retrieve the related transaction
        $transaction = Transaction::where('invoice_id', $id)->first();
        
        // Update the invoice with validated data
        $invoice->update($validatedData);

        // Update the related transaction if it exists
        if ($transaction) {
            $transaction->update([
                'status' => $request->status,
                'reason' => $request->reason ?? null,
            ]);
        }

        // Retrieve the billing record for the student related to the invoice
        $billing = Billing::where('student_id', $invoice->student_id)->first();
        // Update the billing record if it exists
        if ($billing && $transaction) {
            $amount = $billing->amount + $invoice->amount;  // Ensure this logic matches your business needs
            $billing->update([
                'amount' => $amount,
            ]);
        }

        // Redirect back to the invoices index with a success message
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();   

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully');
    }

    public function delete_status(Request $request){
        $invoice = Invoice::findOrFail($request->invoice_id);

        $invoice->update([
            'status' => "Deleted",
        ]);

        return redirect()->back();
    }

}
