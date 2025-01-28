<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class Studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return view('student.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $s = new Student();
        $s->student_name = $request->student_name;
        $img = $request->file('student_img');
        if($img)
        {
            $path = 'images/';
            $file = time().'.'.$img->getClientOriginalExtension();
            $img->move($path, $file);
            $s->student_img = $file;
        }

        $s->save();
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit',compact('student')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $s = Student::find($id);
        $s->student_name = $request->student_name;
        $img = $request->file('student_img');
        if($img)
        {
            $path = 'images/';
            $file = time().'.'.$img->getClientOriginalExtension();
            $img->move($path, $file);
            $s->student_img = $file;
        }

        $s->update();
        return redirect()->route('student.index');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
