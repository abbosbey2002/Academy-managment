<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


use App\Models\Attendance;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;

class AttendanceController extends Controller
{

  public function getMonthAttendance(Request $request)
    {
        \Log::info('getMonthAttendance called with request:', $request->all());
                    dd($request->all());

        try {
            dd($request->all());
            $month = $request->input('month');
            $startOfMonth = Carbon::parse($month . '-01');
            $daysInMonth = $startOfMonth->daysInMonth;
            $monthName = $startOfMonth->format('M');

            $students = Student::all();
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
                        dd($request->all());

            \Log::error('Error in getMonthAttendance: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error Quvonchbek'], 500);
        }
    }





    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
