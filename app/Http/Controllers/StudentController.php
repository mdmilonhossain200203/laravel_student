<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $students = Student::all();

   
    // dd($students);
        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $courses = Course::all();
        
        return view('create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestudentRequest $request)
    {
       


        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email',
            'phone' => [
                'required',
                'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'
            ],
            'roll' => 'required',
            
            'photos' => 'nullable|image|mimes:jpg,jpeg,png,webp',

        ]);

        

        $photoPath = null;

        if ($request->hasFile('photos')) {
            $file = $request->file('photos');

            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('photos'), $fileName);

            $photoPath = 'photos/' . $fileName;
        }
        

        student::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'roll' => $request->roll,
            'course_id' => $request->course,

            'photos' => $photoPath,

            // dd($request),
        ]);

        return redirect()->back()->with('success', 'Student registered successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student, $id)
    {
        $data = student::find($id);
        // dd($data->name);
        return view('show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student, $id)
    {
        $data = student::find($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * 
     */

    public function update(UpdatestudentRequest $request, Student $student, $id)
    {

        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            // 'email' => 'required|email|unique:students,email,',
            'phone' => [
                'required',
                'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'
            ],
            'roll' => 'required',
            'course' => 'required',
            'photosNew' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $filename = null;

        if ($request->hasFile('photosNew')) {
            $file = $request->file('photosNew');

            $newFilename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('photos'), $newFilename);

            $filename = 'photos/' . $newFilename;
        } else {
            $filename = $student->photos;
        }

        // dd($filename);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'roll' => $request->roll,
            'course_id' => $request->course,
            'photos' => $filename,
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student, $id)
    {
        $student = student::findOrFail($id);

        if ($student->photos && File::exists(public_path($student->photos))) {
            File::delete(public_path($student->photos));
        }

        $student->delete();
        return redirect()->back();
    }
}
