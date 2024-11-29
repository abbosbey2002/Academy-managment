<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        return view('pages.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Enrollment::all();
        return view('pages.courses.create',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Log all incoming request data for debugging

    // Clean the cost input to ensure it only contains numeric values
    $cost = $request->input('cost');

    // Remove non-numeric characters (except decimal separator if needed)
    $plainCost = preg_replace('/[^\d]/', '', $cost);

    // Alternatively, handle decimal separator if it's used
    // $plainCost = preg_replace('/[^\d.]/', '', $cost);

    // Update the request with the cleaned cost
    $request->merge(['cost' => $plainCost]);

    // Validate the request data
    $validated = $request->validate([
        'course_name' => 'required|string|max:255',
        'duration' => 'required|integer',
        'cost' => 'required|numeric',
    ]);

    // Create a new course with the validated data
    Course::create($validated);

    // Redirect to the courses index page with a success message
    return redirect()->route('courses.index')->with('success', 'Course created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('pages.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('pages.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
{
    // Log all incoming request data for debugging
    // dd($request->all());

    // Clean the cost input to ensure it only contains numeric values
    $cost = $request->input('cost');

    // Remove non-numeric characters (except decimal separator if needed)
    $plainCost = preg_replace('/[^\d]/', '', $cost);

    // Alternatively, handle decimal separator if it's used
    // $plainCost = preg_replace('/[^\d.]/', '', $cost);

    // Update the request with the cleaned cost
    $request->merge(['cost' => $plainCost]);

    // Validate the request data
    $validated = $request->validate([
        'course_name' => 'required|string|max:255',
        'duration' => 'required|integer',
        'cost' => 'required|numeric',
    ]);

    // Update the course with the validated data
    $course->update($validated);

    // Redirect to the courses index page with a success message
    return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
