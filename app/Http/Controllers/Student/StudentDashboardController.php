<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Transaction;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();

        $invoices = Invoice::where('student_id', $student->id)->get();
        $payments = Payment::where('student_id', $student->id)->get();
        $groups = $student->groups;
        $lastTransaction = Transaction::where('student_id', $student->id)->orderBy('created_at', 'desc')->first();

        return view('student.dashboard', compact('student', 'invoices', 'payments', 'groups', 'lastTransaction'));
    }
}
