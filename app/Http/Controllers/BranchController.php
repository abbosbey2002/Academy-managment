<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Branch;
use App\Models\Group;

use Illuminate\Support\Facades\DB;

use App\Models\Invoice;
use App\Models\Transaction;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use App\Models\Payment;
use App\Models\Region;
use App\Models\District;
use App\Models\Billing;
use Illuminate\Http\Request;

use Carbon\Carbon; // Carbon kutubxonasini import qilish

class BranchController extends Controller
{
    
    public function index()
    {
        $reuslt =  Billing::deposit(['amount' => 5000, 'student_id' => 1, 'casher' => 1]);
       
        $branches = Branch::where('status', '!=', 'completed')->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.branches.index', compact('branches'));
    }

   
    public function create()
    {
        $regions = Region::all();
        $districts = District::all();
        // You can fetch additional data needed for the create form here
        return view('pages.branches.create', compact('regions', 'districts'));
    }

    
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
            'phone' => 'nullable|string|max:19|min:19',
            'date' => 'nullable|date',
            'status' => 'nullable|string|max:15',
            'directions' => 'nullable|array',
        ]);

        // Sanitize the phone number if provided
        if ($request->filled('phone')) {
            $validatedData['phone'] = preg_replace('/[^+\d]/', '', $request->phone);
        }

        // Create a new branch with the validated and sanitized data
        $branch = Branch::create($validatedData);

        // Redirect with success message
        return redirect()->route('branch.index')->with('success', 'Branch created successfully.');
    }


    public function show(Branch $branch)
    {
        $invoices = Invoice::with('group.teachers', 'group.courses', 'group.enrollments')
                    ->orderBy('created_at', 'desc')
                    ->get();

        $branchId = $branch->id;
        $transactions = Transaction::paginate(20);
        
        // Outputting the transactions for debugging purposes
        $payments = DB::table('payments as p')
            ->join('students as s', 's.id', '=', 'p.student_id')
            ->join('transactions as t', 't.student_id', '=', 's.id')
            ->where('s.branch_id', $branchId)
            ->select(
                't.unical_id',
                DB::raw("CONCAT(s.first_name, ' ', s.last_name) AS full_name"),
                'p.amount',
                'p.type',
                'p.paycom_time_datetime',
                'p.state'
            )
            ->paginate(10);

        $groups = Group::where('branch_id', $branchId)
                    ->with('courses', 'teachers')
                    ->paginate(10);

        $courseIds = $groups->pluck('course_id')->unique();
        $courses = Course::whereIn('id', $courseIds)->get();

        // Correct the query to Eloquent model
        $students = DB::table('students as s')
            ->leftJoin('group_enrollment as ge', 'ge.student_id', '=', 's.id')
            ->leftJoin('groups as g', 'g.id', '=', 'ge.group_id')
            ->leftJoin('courses as c', 'c.id', '=', 'g.course_id')
            ->leftJoin('transactions as t', 't.student_id', '=', 's.id')
            ->leftJoin('billings as b', 'b.student_id', '=', 's.id')
            ->select(
                's.id',
                's.pinfl',
                DB::raw("CONCAT(s.first_name, ' ', s.last_name) AS full_name"),
                DB::raw("COALESCE(c.course_name, 'No course') AS course_name"),
                DB::raw("COALESCE(g.group_name, 'No group') AS group_name"),
                'ge.created_at',
                DB::raw("COALESCE(t.unical_id, 'No ID') AS unical_id"),
                'b.amount'
            )
            ->where('s.branch_id', $branchId)
            ->groupBy('s.id', 's.first_name', 's.last_name', 's.pinfl', 'c.course_name', 'g.group_name', 'ge.created_at', 't.unical_id', 'b.amount')
            ->paginate(10);

        $teachers = User::where('role', 2)
            ->where('branch_id', $branchId)
            ->get();

        $groupsEndDates = $groups->mapWithKeys(function ($group) {
            $durationInMonths = $group->courses->duration ?? 0;
            $endDate = Carbon::parse($group->created_at)->addMonths($durationInMonths);
            return [$group->id => $endDate];
        });

        $groupsWithLimit = $groups->mapWithKeys(function ($group) {
            return [$group->id => $group->limit];
        });

        return view('pages.branches.show', compact('branch', 'groups', 'courses' , 'students', 'groupsEndDates', 'invoices', 'payments', 'teachers', 'groupsWithLimit','transactions'));
    }

    public function edit(Branch $branch)
    {
        // Filialga tegishli guruhlarni olish
        $groups = Group::where('branch_id', $branch->id)->get();
        // Guruhdan kelayotgan kurs IDlarini olish
        $courseIds = $groups->pluck('course_id')->unique();

        // Kurs IDlariga mos keladigan barcha kurslarni olish
        $courses = Course::whereIn('id', $courseIds)->get();
        $students = [];


        foreach ($groups as $group) {
            $students = $group->enrollments;
        }

        $regions = Region::all();
        $districts = District::all();
        // You can fetch additional data needed for the edit form here

        return view('pages.branches.edit', compact('branch', 'groups', 'courses', 'students', 'regions', 'districts'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
            'phone' => 'nullable|string|min:19|max:19',
            'date' => 'nullable|date',
            'status' => 'nullable|string|max:15',
            'directions' => 'nullable|array',
        ]);

        // Find the existing branch by ID
        $branch = Branch::findOrFail($id);

        // Sanitize the phone number to remove unwanted characters
        $sanitizedPhone = null;
        if ($request->filled('phone')) {
            $sanitizedPhone = preg_replace('/[^+\d]/', '', $request->phone);
        }

        // Update the branch with sanitized phone number and other data
        $branch->update([
            'name' => $request->name,
            'region_id' => $request->region_id,
            'district_id' => $request->district_id,
            'phone' => $sanitizedPhone,
            'date' => $request->date,
            'status' => $request->status,
            'directions' => $request->directions,
        ]);

        // Redirect with a success message
        return redirect()->route('branch.index')->with('success', 'Branch updated successfully.');
    }

    
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);

        User::where('branch_id', $branch->id)->update(['branch_id' => null]);
    
        // Now delete the branch
        $branch->delete();
    
        return redirect()->route('branch.index')->with('success', 'Branch deleted successfully.');
    }

    public function getDistricts($region_id)
    {
        try {
            $districts = District::where('region_id', $region_id)->get();
            return response()->json($districts);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function delete_status(Request $request){
        
        $branch = Branch::findOrFail($request->branch_id);
        $branch->update([
            'status' => "completed",
        ]);

        return redirect()->route('branch.index')->with('success', 'branch successfully deleted');
    }

}

