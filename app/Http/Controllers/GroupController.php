<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Group;
use App\Models\Invoice;
use App\Models\Transaction;
use App\Models\Enrollment_group;
use App\Models\Billing;
use App\Models\Attendance;
use App\Models\Branch;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class GroupController extends Controller
{
    // Get monthly attendance for a specific group
    public function getMonthAttendance(Request $request)
    {
        \Log::info('getMonthAttendance called with request:', $request->all());

        try {
            $month = $request->input('month');
            $startOfMonth = Carbon::parse($month . '-01');
            $daysInMonth = $startOfMonth->daysInMonth;
            $monthName = $startOfMonth->format('M');

            $group = Group::findOrFail($request->group_id);
            $students = $group->enrollments;
            $attendanceData = [];

            foreach ($students as $student) {
                $attendance = [];
                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $currentDate = $startOfMonth->copy()->addDays($day - 1)->toDateString();
                    $studentAttendance = Attendance::where('student_id', $student->id)
                        ->whereDate('date', $currentDate)
                        ->first();
                    $status = $studentAttendance ? $studentAttendance->status : '-';
                    $attendance[] = $status;
                }
                $attendanceData[] = [
                    'id' => $student->id,
                    'name' => $student->first_name . ' ' . $student->last_name,
                    'attendance' => $attendance,
                ];
            }

            return response()->json([
                'daysInMonth' => $daysInMonth,
                'monthName' => $monthName,
                'attendanceData' => $attendanceData,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching monthly attendance: ', ['exception' => $e]);

            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    // Display a listing of groups
    public function index()
    {
        $groups = Group::orderBy('created_at', 'desc')->paginate(9);
        $groupsWithLimit = $groups->mapWithKeys(function ($group) {
            return [$group->id => $group->limit];
        });
        return view('pages.groups.index', compact('groups','groupsWithLimit'));
    }

    // Show the form for creating a new group
    public function create()
    {
        $enrollments = Enrollment::all();
        $teachers = User::where('role', 2)->get();
        $branches = Branch::all();
        $courses = Course::all();
        return view('pages.groups.create', compact('branches', 'courses', 'teachers','enrollments'));
    }

    // Store a newly created group in storage
public function store(Request $request)
{
    $validated = $request->validate([
        'branch_id' => 'required|exists:branches,id',
        'enrollment_id' => 'nullable|exists:enrollments,id',
        'course_id' => 'required|exists:courses,id',
        'teacher_id' => 'required|exists:users,id',
        'room' => 'nullable|string',
        'group_name' => 'nullable|string',
        'days_of_week' => 'nullable|array',
        'days_of_week.*' => 'string|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        'start_time' => 'nullable|date_format:H:i',
        'end_time' => 'nullable|date_format:H:i',
        'status' => 'required|in:active,paused,completed,recruiting,cancelled',
        'limit' => 'nullable|integer|min:1',
    ]);

    // Yangi guruhni yaratish
    $group = Group::create($validated);

    // Avtomatik guruh nomini yaratish
    if (empty($group->group_name)) {
        $group->group_name = 'Guruh-' . str_pad($group->id, 3, '0', STR_PAD_LEFT);
        $group->save();
    }

    return redirect()->route('groups.index')->with('success', 'Group created successfully.');
}





// Display the specified group
public function show($id)
{
    // Guruhni olish
    $group = Group::with([
        'courses',
        'teachers',
        'enrollments' => function ($query) {
            $query->withPivot('date', 'status');
        }
    ])->findOrFail($id);

    // O'quvchilarni olish
    $enrollments = Enrollment_group::where('group_id', $group->id)
                                    ->with('student')
                                    ->get();

    // Agar date formatini DateTime obyektiga aylantirish kerak bo'lsa
    foreach ($enrollments as $enrollment) {
        $enrollment->date = Carbon::parse($enrollment->date);
    }

    // Talabalarni chiqarish
    $students = Student::where('status', '!=', 'completed')->get();
    // Student IDlarini olish
    $studentIds = $students->pluck('student_id')->toArray();

    // Guruhga tegishli tranzaksiyalarni olish
    $invoices = Invoice::where('group_id', $id)->get();

    // Umumiy amount qiymatini hisoblash
    $totalAmountInvoises = $invoices->sum('amount');
   

    // Guruhga tegishli to'lovlarni olish
    $transactions = Transaction::where('group_id', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();

    // Umumiy to'lov qiymatini hisoblash
    $totaltransaction = $transactions->sum('amount');

    // Guruhdagi o'quvchilar sonini olish
    $studentCount = $enrollments->count();

    // Kurs pulini olish (bu sizning struktura va kodingizga bog'liq)
    $courseFee = $group->courses->cost;

    // Guruh o'quvchilar sonini kurs puliga ko'paytirish
    $totalCourseFee = $studentCount * $courseFee;

    // Branch va teacherlarni olish
    $branches = Branch::all();
    $teachers = User::where('role', 2)->get();

    return view('pages.groups.show', compact(
        'group',
        'branches',
        'teachers',
        'students',
        'transactions',
        'invoices',
        'enrollments',
        'totalAmountInvoises',
        'totaltransaction',
        'totalCourseFee'
    ));
}






    // Show the form for adding students to a group
    public function studentStoreGet($id)
    {
        $group = Group::find($id);
        
        // Fetch students who are not enrolled in the specified group
        $students = Student::whereDoesntHave('groups', function ($query) use ($id) {
            $query->where('group_id', $id);
        })->where('status', '!=', 'completed')->get();
        return view('pages.groups.studentStore', compact('group', 'students'));
    }

    // Store students in a group
    public function studentStore(Request $request)
    {
        
        $validated = $request->validate([
            'students' => 'required|array',
            'students.*' => 'exists:students,id',
            'group_id' => 'required|exists:groups,id',
            'date' => 'nullable|date',
            'status' => 'required|in:active,paused',
        ]);
        $group = Group::findOrFail($request->group_id);

        // Ensure all students exist in student_registers table
        $studentsExist = DB::table('students')
            ->whereIn('id', $validated['students'])
            ->pluck('id')
            ->toArray();

        if (count($studentsExist) !== count($validated['students'])) {
            return redirect()->back()->withErrors(['students' => 'One or more student IDs are invalid.']);
        }

        foreach ($validated['students'] as $student){
            $student = Student::findOrFail($student);
            $student->update([
                'status' => "active"
            ]);
        }

        $currentEnrollments = $group->enrollments()->pluck('student_id')->toArray();
        $studentsToAttach = array_diff($validated['students'], $currentEnrollments);

        // Guruhda mavjud talabalarning soni
        $currentStudentCount = count($currentEnrollments);

        // Talabalarni qo'shishdan keyingi umumiy talabalar soni
        $totalStudentCount = $currentStudentCount + count($studentsToAttach);

        // Calculate remaining limit
        $remainingLimit = $group->limit - $currentStudentCount;
        $limit  = $group->limit;

        if ($totalStudentCount > $group->limit) {
            return redirect()->back()->withErrors(['limit' => "Guruhda o`quvchilar limiti $limit ta. Yana $remainingLimit ta o'quvchini qo'shish mumkin."]);
        }

        if (!empty($studentsToAttach)) {
            $attachData = [];
            foreach ($studentsToAttach as $studentId) {
                $attachData[$studentId] = [
                    'date' => $validated['date'],
                    'status' => $validated['status']
                ];
            }
            $group->enrollments()->attach($attachData);
        }

        // Calculate amount based on status
        $amount = 0; // Default to 0

        if ($request->status == 'active') {
            $amount = $group->courses->cost ; // For active status
        } elseif ($request->status == 'paused') {
            $amount = 0; // For paused status
        }

        // Uncomment the below code if Order creation is needed
        // foreach ($studentsExist as $studentId) {
        //     Order::create([
        //         'group_id' => $group->id,
        //         'account' => "AC" . $group->created_at->format('YmdHis'), // Ensure unique account value
        //         'amount' => $amount,
        //         'student_id' => $studentId,
        //     ]);
        // }

        return redirect()->route('groups.show', $group->id)->with('success', 'Students added successfully.');
    }





    // Remove a student from a group
    public function removeStudent(Request $request, $groupId, $studentId)
    {
        $group = Group::findOrFail($groupId);
        $group->enrollments()->detach($studentId);
        return redirect()->route('groups.show', $groupId)->with('success', 'Student removed successfully.');
    }

    // Show the form for editing a group
    public function edit(Group $group)
    {
        $enrollments = Enrollment::all();
        $branches = Branch::all();
        $courses = Course::all();
        $teachers = User::where('role', 2)->get();

         $students = Student::all();
        return view('pages.groups.edit', compact('group', 'branches', 'teachers', 'courses','enrollments', 'students'));
    }

    // Update the specified group in storage
    public function update(Request $request, Group $group)
    {
        
        // Debugging: Check the incoming request data

        // Define validation rules
        $validated = $request->validate([
            'branch_id' => 'nullable|exists:branches,id',
            'enrollment_id' => 'nullable|exists:enrollments,id',
            'course_id' => 'nullable|exists:courses,id',
            'teacher_id' => 'nullable|exists:users,id',
            'room' => 'nullable|string',
            'group_name' => 'nullable|string',
            'days_of_week' => 'nullable|array',
            'days_of_week.*' => 'string|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'start_time' => 'nullable|date_format:H:i:s', // Updated format
            'end_time' => 'nullable|date_format:H:i:s',   // Updated format
            'status' => 'required|in:active,paused,completed,recruiting,cancelled', // Validate status
            'limit'  =>  'nullable|string'

        ]);

        // Debugging: Check if validation passed
        // dd($validated);

        // Update the group with validated data
        $group->update($validated);

        // Redirect with success message
        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }


    // Remove the specified group from storage
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }

    // Search for students
    public function searchStudents(Request $request)
    {
        $query = $request->get('query', '');

        if ($query) {
            $students = User::where('first_name', 'LIKE', "%{$query}%")
                ->orWhere('last_name', 'LIKE', "%{$query}%")
                ->get(['id', 'first_name', 'last_name']);
        } else {
            $students = User::all(['id', 'first_name', 'last_name']);
        }

        return response()->json($students);
    }

    // Show attendance for a group
    public function studentAttendance($id)
    {
        $currentDate = Carbon::now()->toDateString();
        $group = Group::find($id);
        $students = $group->enrollments;
        $branches = Branch::all();
        return view('pages.groups.attendance', compact('group', 'students', 'currentDate', 'branches'));
    }

    // Store attendance for a group
    public function storeAttendance(Request $request)
    {
       
        $validated = $request->validate([
            'status' => 'required|in:active,paused',
            'group_id' => 'required|exists:groups,id',
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*' => 'in:1,2,3',
        ]);

        $group = Group::findOrFail($validated['group_id']);

        foreach ($validated['attendance'] as $studentId => $status) {
            Attendance::updateOrCreate(
                ['group_id' => $group->id, 'student_id' => $studentId, 'date' => $validated['date'], 'status' => $validated['status']],
                ['status' => $status]
            );
        }

        return redirect()->route('showAttendance', $group->id)->with('success', 'Attendance recorded successfully.');
    }

    // Show attendance view for a group
    public function showAttendance($id)
    {
        $group = Group::findOrFail($id);
        $students = $group->enrollments;
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $attendance = Attendance::whereBetween('date', [$startOfMonth, $endOfMonth])->get();

        return view('pages.groups.showAttendance', compact('group', 'students', 'attendance', 'startOfMonth', 'endOfMonth'));
    }
}
