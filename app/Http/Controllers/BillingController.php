<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Enrollment_group;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billings = Billing::with('student')->get();
        return view('pages.billings.index', compact('billings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('pages.billings.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function update_billing(Request $request)
{
    try {
        $val = $request->validate([
            'student_id' => 'required|exists:students,id',
            'account' => 'required|string|max:255',
            'amount' => 'nullable|numeric',
            'payment_type' => 'required|string|in:cash,payme',
        ]);
    

        $casher = auth()->user()->id;
        $data = [
            'student_id' => $val['student_id'],
            'state' => 2,
            'type' => 'cash',
            'amount' => $val['amount'],
            'casher' => $casher,
            'create_time' => $request->create_time
        ];

       $response = Billing::deposit($data);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return back()->withErrors($e->errors());
    }


    return redirect()->route('student.index')->with('success', 'Billing created successfully.');
}


    





    /**
     * Display the specified resource.
     */
    public function show(Billing $billing)
    {
        return view('billings.show', compact('billing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Billing $billing)
    {
        $students = StudentRegister::all();
        return view('billings.edit', compact('billing', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Billing $billing)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'account' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $billing->update($request->all());

        return redirect()->route('billings.index')->with('success', 'Billing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Billing $billing)
    {
        $billing->delete();

        return redirect()->route('billings.index')->with('success', 'Billing deleted successfully.');
    }
public function getUserBillings($id)
{
    try {
        $billings = Billing::where('student_id', $id)->get();
        return response()->json($billings);
    } catch (\Exception $e) {
        // Exceptionni log qilish va 500 status kodi bilan xato xabarini qaytarish
        \Log::error('Error fetching billings for user '.$id.': '.$e->getMessage());
        return response()->json(['error' => 'Server error'], 500);
    }
}

}
