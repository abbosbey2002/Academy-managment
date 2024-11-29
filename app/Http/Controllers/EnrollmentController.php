<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\Models\User;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')
            ->where('users.role', 1)
            ->select('enrollments.*')
            ->paginate(20);

        return view('pages.enrollment.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = User::where('role', 1)->get();
        $users = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')
            ->where('users.role', 1)
            ->select('enrollments.*')
            ->get();
        return view('pages.enrollment.create', compact('users','student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnrollmentRequest $request)
    {
        Enrollment::create([
            'user_id' => $request->user_id,
            'date' => $request->date,
            'status' => 'new',
        ]);

        return redirect()->route('enrollments.index')->with('success', "successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        return view('pages.enrollment.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        $users = Enrollment::join('users', 'enrollments.user_id', '=', 'users.id')
            ->where('users.role', 1)
            ->select('enrollments.*')
            ->get();
        return view('pages.enrollments.edit', compact('enrollment', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        $enrollment->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->back();
    }
}
