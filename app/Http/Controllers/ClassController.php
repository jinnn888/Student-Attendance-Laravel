<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\Teacher;
class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = SchoolClass::with('teacher')->get();
        return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('classes.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'grade_level' => 'required|numeric|min:7|max:12',
            'teacher_id' => 'required|exists:teachers,id'
        ]);

        SchoolClass::updateOrCreate([
            'teacher_id' => $validated['teacher_id']
        ],[
            'name' => $validated['name'],
            'grade_level' => $validated['grade_level'],
        ]);

        return redirect()->back()->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {  
        $class = SchoolClass::findOrFail($id);
        $teachers = Teacher::all();
        
        return view('classes.edit', compact('class', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'grade_level' => 'required|numeric|min:7|max:12',
            'teacher_id' => ['required', 'exists:teachers,id']
        ]);
        $class = SchoolClass::find($id);

        $class->update([
            'teacher_id' => $validated['teacher_id'],
            'name' => $validated['name'],
            'grade_level' => $validated['grade_level'],
        ]);

        return redirect()->back()->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = SchoolClass::findOrFail($id);
        $class->delete();

        return redirect()->back()->with('success', 'Class deleted successfully.');
    }
}
