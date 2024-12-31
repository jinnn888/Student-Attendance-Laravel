<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Teacher;
use App\Models\User;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::where('role', 'teacher')->with('teacher')->get();
        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email'
        ]);

        $user = User::create(array_merge($validated, ['role' => 'teacher']));
        Teacher::create([
            'user_id' => $user->id
        ]);

        return redirect()->back()->with('success', 'New teacher saved successfully.');
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
        $teacher = User::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($id)]
        ]);
        $teacher = User::findOrFail($id);

        $user = $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', 'New teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = User::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'New teacher updated successfully.');
        
    }
}
