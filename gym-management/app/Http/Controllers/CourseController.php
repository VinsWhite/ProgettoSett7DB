<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StorecourseRequest;
use App\Http\Requests\UpdatecourseRequest;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_role = auth()->user()->role;
        $courses = DB::table('courses');
        
        return view ("viewCourses", ['courses' => $courses->get(), 'user_role' => $user_role]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createCourse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecourseRequest $request)
    {
        $courseData = [
            'name' => $request->name,
            'description' => $request->description,
            'capacity' => $request->capacity,
        ];

        Course::create($courseData);        
        
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $user = auth()->user();
        $reservation = $course->reservations()->where('user_id', $user->id)->first();

        return view('detailCourse', ['course' => $course, 'user' => $user, 'reservation' => $reservation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course deleted successfully');
    }
}
