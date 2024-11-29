<?php

namespace App\Http\Controllers;
use App\Models\Billing;
use App\Models\Transaction;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

use App\Models\Enrollment_group;
use App\Models\Region;
use App\Models\Branch;
use App\Models\District;
use App\Models\Invoice;

// O'quvchining guruhlarini olish uchun ===========
use App\Models\Enrollment;
use App\Models\User;
// O'quvchining guruhlarini olish uchun / ===========

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search query from the request
        $searchTerm = $request->input('search');

        // Fetch students, optionally filtering by first and last name if a search term is provided
        $students = Student::when($searchTerm, function ($query, $searchTerm) {
                $query->where('first_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('phone', 'like', '%' . $searchTerm . '%');
            })->where('status', '!=', 'completed')->orderByDesc('id') // Sort by ID or any relevant column
            ->paginate(10);
          
        // Pass students and the search term to the view
        return view('pages.students.student', compact('students', 'searchTerm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all(); 
        $regions = Region::all();
        return view('pages.students.create', compact('regions', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();

        $region = Region::findOrFail($request->region_id);
        $district = District::findOrFail($request->district_id);

        // Телефон рақамини тозалаш
        $phone = preg_replace('/[^+\d]/', '', $request->phone);

        if($request->password){
            $validated['password'] = Hash::make($validated['password']);    
        }

        $newstudent = Student::create([
            'branch_id' => $request->branch_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'brith_date' => $request->brith_date,
            'pinfl' => $request->pinfl,
            'phone' => $phone, // Тозаланган телефон рақами
            'gender' => $request->gender,
            'address' => $region->name .", ". $district->name,
            'status' => $request->status,
            'privilege' => $request->privilege,
            'region_id' => $region->id,
            'district_id' => $district->id
        ]);

        $billing = Billing::create([
            'amount' => 0.00,
            'account' => 'ac' . $newstudent->id,
            'student_id' => $newstudent->id,
        ]);

        return redirect()->route('student.index')->with('success', 'Student registered successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        
        $billings = Billing::where('student_id', $student->id)->get();
        $payments = Payment::where('student_id', $student->id)->get();
        $invoices = Invoice::where('student_id', $student->id)
                ->with([
                    'group.teachers', 
                    'group.courses', 
                    'group.enrollments'
                ])
                ->orderBy('created_at', 'desc') // 'desc' - teskari tartib
                ->get();

        $lastTransaction = Payment::where('student_id', $student->id)->first();

        // O'quvchining guruhlarini olish uchun ===========
        $users = User::whereNotIn('id', [16, 2])->latest()->paginate(10);
        // O'qituvchining guruhlari
        $groups = $student->groups;
        // Guruh ID'larini tekshiramiz
        $groupIds = $groups->pluck('id');
    
        $enrollments = Enrollment::where('user_id', $student->id)->with('student')->get();
        $teacherStudents = $enrollments->map(function($enrollment) {
            return $enrollment->student;
        });
        // O'quvchining guruhlarini olish uchun / ===========

        return view('pages.students.show', compact('student','billings','payments','invoices','lastTransaction', 'teacherStudents', 'enrollments', 'users', 'groups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $branches = Branch::all();
        $billing = Billing::where('student_id', $student->id)->first();
        $regions = Region::all();
        $districts = District::where('region_id', $student->region_id)->get();
        return view('pages.students.edit', compact('student', 'billing','districts', 'regions', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
//        $validated = $request->validated();
        //$billing = Billing::where('student_id', $student->id)->first();
        //$billing->amount = intval($request['amount']) + intval($billing->amount);
        //$billing->save();
        if ($request->has('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }
        $data = $request->all(); // Get all input data
        $data['phone'] = preg_replace('/[^+\d]/', '', $request->phone_number); // Override 'phone' with 'phone_number'

        $student->update($data);

        return redirect()->route('student.index')->with('success', 'Student information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }


    public function showAllPayment(Request $request){
        $payments = Payment::where('student_id', $request->student_id)->get();
        return view('pages.students.showAllPayment' , compact('payments'));
    }

    public function showAllInvoice(Request $request){
        $invoices = Invoice::where('student_id', $request->student_id)->get();
        return view('pages.students.showAllInvoice' , compact('invoices'));
    }

    public function delete_status(Request $request){
        $student = Student::findOrFail($request->student_id);
        
        $student->update([
            'status' => 'completed'
        ]);

        return redirect()->route('students.index')->with('success', 'student deleted successfully');
    }

    public function branch_store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
            'phone' => 'nullable|string|max:19|min:19',
            'date' => 'nullable|date',
            'status' => 'nullable|string|max:15',
            'directions' => 'nullable|array',
        ]);

        $branch = Branch::create($request->all());

        return redirect()->back()->with('success', 'Branch created successfully.');
    
    }
}
