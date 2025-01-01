<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = SchoolClass::all();
        return view('students.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'id_number' => 'required|unique:students,id_number',
            'date_of_birth' => 'required',
            'gender' => 'required|in:female,male',
            'class_id' => 'required|exists:school_classes,id',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        Student::create([
            'user_id' => $user->id,
            'class_id' => $validated['class_id'],
            'id_number' => $validated['id_number'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
        ]);

        return redirect()->back()->with(['message' => 'Student created successfully.']);


    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $classes = SchoolClass::all();
        return view('students.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($student->user->id)],
            'id_number' => ['required', Rule::unique('students', 'id_number')->ignore($id)],
            'date_of_birth' => 'required',
            'gender' => 'required|in:female,male',
            'class_id' => 'required|exists:school_classes,id',
        ]);

        $student->user()->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $student->update([
            'class_id' => $validated['class_id'],
            'id_number' => $validated['id_number'],
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
        ]);

        return redirect()->back()->with(['message' => 'Student updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back()->with(['message' => 'Student deleted successfully.']);
    }
}
