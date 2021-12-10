<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        //$students = Student::where('birth_place', 'Bandung')->orWhere('gender', 'P')->get();

        //$students = Student::where('gender', 'W')->orWhere('birth_place', 'Jakarta')->get();

        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $request->validate([
            'code'          =>  'required',
            'name'          =>  'required',
            'gender'        =>  'required',
            'birth_date'    =>  'required',
            'birth_place'   =>  'required'
        ]);

        $student = new Student([
            'code'          =>  $request->get('code'),
            'name'          =>  $request->get('name'),
            'gender'        =>  $request->get('gender'),
            'birth_date'    =>  $request->get('birth_date'),
            'birth_place'   =>  $request->get('birth_place')
        ]);
        $student->save();
        return redirect('/student')->with('success', 'Student saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'          =>  'required',
            'name'          =>  'required',
            'gender'        =>  'required',
            'birth_date'    =>  'required',
            'birth_place'   =>  'required'
        ]);

        $student                = Student::find($id);
        $student->code          = $request->get('code');
        $student->name          = $request->get('name');
        $student->gender        = $request->get('gender');
        $student->birth_date    = $request->get('birth_date');
        $student->birth_place   = $request->get('birth_place');

        return redirect()->route('student.index')->with('success', 'Student Update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student =  Student::find($id);
        $student->delete();

        return redirect('/student')->with('success', 'Student deleted!');
    }
}
