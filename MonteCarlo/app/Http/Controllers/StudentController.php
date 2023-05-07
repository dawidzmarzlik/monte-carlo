<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.layout');
    }

    public function schedule()
    {
        return view('student.schedule');
    }

    public function materials()
    {
        return view('student.materials');
    }

    public function test()
    {
        return view('student.test');
    }

    public function testpage()
    {
        return view('student.testpage');
    }

    public function profile()
    {
        $student = Auth::user();
        $teacher_id = $student->Teacher_id;
        $teacher = Teacher::find($teacher_id);
        return view('student.profile', compact('student'), compact('teacher'));
    }

    public function change_teacher()
    {
        $teachers = Teacher::all();
        $student = Auth::user();
        return view('student.teacher', compact('teachers'), compact('student'));
    }

    public function set_teacher(Request $request)
    {
        $teacher = Teacher::find($request->teacher);
        $student_id = Auth::user();
        $id = $student_id->id;
        $student = Student::find($id);
        $student->Teacher_id = $request->input('teacher');
        $student->save();

        return view('student.profile', compact('student'), compact('teacher'));
    }

    public function opinion()
    {
        return view('student.opinion');
    }

    public function chat()
    {
        return view('student.chat');
    }
}
