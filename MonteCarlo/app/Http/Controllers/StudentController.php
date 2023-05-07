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
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        return view('student.layout');
    }

    public function schedule()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        return view('student.schedule');
    }

    public function materials()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        return view('student.materials');
    }

    public function test()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        return view('student.test');
    }

    public function testpage()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        return view('student.testpage');
    }

    public function profile()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        $student = Auth::user();
        return view('student.profile', compact('student'));
    }

    public function change_teacher()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        $teachers = Teacher::all();
        $student = Auth::user();
        return view('student.teacher', compact('teachers'), compact('student'));
    }

    public function set_teacher(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        $teacher = Teacher::find($request->teacher);
        $student_id = Auth::user();
        $id = $student_id->id;
        $student = Student::find($id);
        $student->Teacher_id = $request->input('teacher');
        $student->save();

        return view('student.profile', compact('student'));
    }

    public function opinion()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        return view('student.opinion');
    }

    public function chat()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        return view('student.chat');
    }
}