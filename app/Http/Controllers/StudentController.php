<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public  function index()
    {
        $students  = Student::all();
        return view('students.index', compact('students'));

    }
    public  function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
        ]);
        Student::create($request->all());
        return redirect()->route('student.create')->with('message','Студент добавлен!');
    }

    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
        ]);
        $student =  Student::find($id);
       // dd($student->all());
        $student->update($request->all());
        return redirect()->route('student.index')->with('message2','Данные студента изменены!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('message','Студент удален!');
    }
}
