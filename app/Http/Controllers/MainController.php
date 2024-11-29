<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Group;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        // Retrieve recent branches, groups, and students for display
        $branches = Branch::orderBy('created_at', 'desc')->take(5)->get();
        $groups = Group::with('branch')->orderBy('created_at', 'desc')->paginate(8);
        $last_groups = Group::with('branch')->orderBy('created_at', 'desc')->paginate(4);
        $students = Student::orderBy('created_at', 'desc')->paginate(4);

        // Total counts of various entities
        $amoun_of_group = Group::count();
        $amoun_of_branch = Branch::count();
        $amoun_of_course = Course::count();

        // Current and last month's date ranges
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();
        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

        $coursesWithStudentCount = Course::select('courses.id', 'courses.course_name')
            ->leftJoin('groups', 'groups.course_id', '=', 'courses.id')
            ->leftJoin('group_enrollment', 'group_enrollment.group_id', '=', 'groups.id')
            ->leftJoin('students', 'students.id', '=', 'group_enrollment.student_id')
            ->selectRaw('COUNT(students.id) AS current_student_count')
            ->groupBy('courses.id', 'courses.course_name')
            ->orderBy('current_student_count', 'desc')
            ->take(5) // Limit to 5 courses
            ->get();


                // Calculate percentage change for each course
                $coursesWithStudentCount = collect($coursesWithStudentCount)->map(function ($course) {
                    $lastCount = $course->last_student_count;
                    $currentCount = $course->current_student_count;

                    $course->percentage_change = ($lastCount > 0)
                        ? (($currentCount - $lastCount) / $lastCount) * 100
                        : ($currentCount > 0 ? 100 : 0);

                    return $course;
                });

                

        // Branch statistics
        $branchesData = Branch::where('status', 'Active')->get()->map(function ($branch) use ($currentMonthStart, $currentMonthEnd, $lastMonthStart, $lastMonthEnd) {
            $currentMonthCount = Student::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
                ->where('branch_id', $branch->id)
                ->count();
            $lastMonthCount = Student::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])
                ->where('branch_id', $branch->id)
                ->count();

            $percentageChange = ($lastMonthCount > 0)
                ? (($currentMonthCount - $lastMonthCount) / $lastMonthCount) * 100
                : ($currentMonthCount > 0 ? 100 : 0);

            return [
                'branch' => $branch,
                'current_month' => $currentMonthCount,
                'last_month' => $lastMonthCount,
                'percentage_change' => $percentageChange,
                'student_count' => $branch->students()->count(),
            ];
        });


        // Sort branches by percentage change
        $sortedBranches = $branchesData->sortByDesc('percentage_change')->values();

        // Include 'limit' in the view data for groups
        $groupsWithLimit = $groups->mapWithKeys(function ($group) {
            return [$group->id => $group->limit];
        });

        // Calculate current month counts
        $currentCounts = [
            'amount_of_teacher' => User::where('role', 2)->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count(),
            'amount_of_course' => Course::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count(),
            'amount_of_group' => Group::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count(),
            'amount_of_branch' => Branch::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count(),
            'amount_of_student' => Student::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count(),
            'amount_of_staff' => User::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count(),
        ];

        // Calculate last month counts
        $lastCounts = [
            'amount_of_teacher' => User::where('role', 2)->whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count(),
            'amount_of_course' => Course::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count(),
            'amount_of_group' => Group::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count(),
            'amount_of_branch' => Branch::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count(),
            'amount_of_student' => Student::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count(),
            'amount_of_staff' => User::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count(),
        ];

        // Calculate percentage change for overall statistics
        $percentageChanges = [];
        foreach ($currentCounts as $key => $currentCount) {
            $lastCount = $lastCounts[$key];
            $percentageChanges[$key] = ($lastCount > 0)
                ? (($currentCount - $lastCount) / $lastCount) * 100
                : ($currentCount > 0 ? 100 : 0);
        }

        // Total counts
        $totalCounts = [
            'amount_of_teacher' => User::where('role', 2)->count(),
            'amount_of_course' => Course::count(),
            'amount_of_group' => Group::where('status', 'active')->count(),
            'amount_of_branch' => Branch::where('status', 'Active')->count(),
            'amount_of_student' => Student::where('status', 'Active')->count(),
            'amount_of_staff' => User::count(),
        ];

        // Return the view with all calculated data
        return view('pages.home', compact(
            'groups',
            'last_groups',
            'students',
            'coursesWithStudentCount',
            'sortedBranches',
            'branches',
            'groupsWithLimit',
            'percentageChanges',
            'totalCounts'
        ));
    }

    public function knowledge(){
        return view('pages.knowledge');
    }
}
