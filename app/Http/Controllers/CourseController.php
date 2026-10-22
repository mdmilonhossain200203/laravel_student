<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StorecourseRequest;
use App\Http\Requests\UpdatecourseRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


       $allCourse= Course::all();
        return view('course.course',compact('allCourse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('course.course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecourseRequest $request)
{
    // Check 
    if (Course::where('courseName', strtolower($request->courseName))->exists()) {
        return redirect()->back()
            ->with('error', 'This course already exists.');
    }

    // Create new course
    Course::create([
        'courseName' => strtolower($request->courseName),
    ]);

    return redirect()->back()
        ->with('success', 'Course created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(course $course ,$id)
    {
        //
        
       $showCourse= Course::findOrFail($id);
       return view('course.course',compact('showCourse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(course $course, $id)
    {
        //
        $editId= Course::findOrFail($id);
        return view('course.course',compact('editId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecourseRequest $request, Course $course, $id)
    {
        $courseNew = strtolower($request->courseUpdate);
    
     // Check 
      if (Course::where('courseName', $courseNew)->exists()) {
     return redirect()->back()
        ->with('error', 'This course already exists.');
}
    
        // Find the existing course
        $course = Course::findOrFail($id);
    
        // Update the course
        $course->update([
            'courseName' => $courseNew,
        ]);
    
        return redirect()->back()
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(course $course)
    {
        //
    }
}
