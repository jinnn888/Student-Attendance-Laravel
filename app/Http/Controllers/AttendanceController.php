<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\SchoolClass;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchedClass = null;

        if ($request->get('class_id')) {
            $searchedClass = Attendance::with(['class', 'student'])
                        ->where('class_id', $request->get('class_id'))
                        ->get();
        }

        $classes = SchoolClass::all();
        return view('attendances.index', compact('classes', 'searchedClass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $searchedClass = null;

        if ($request->get('class_id')) {
            $searchedClass = SchoolClass::with('students')->find($request->get('class_id'));

        } 
        $classes = SchoolClass::all();
        return view('attendances.create', compact('classes', 'searchedClass'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        foreach ($request->student_id as $index => $id) {
            Attendance::create([
                'student_id' => $id,
                'class_id' => $request->class_id,
                'status' => $request->status[$id],
                'date' => $request->date
            ]);

        }
        return redirect()->back()->with('success', 'Attendance recorded successfully.');
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
    public function update(Request $request, Attendance $attendance)
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
