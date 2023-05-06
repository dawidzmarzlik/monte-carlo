<?php

namespace App\Http\Controllers;
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

    public function profile()
    {
        $student = Auth::user();
        return view('student.profile', compact('student'));
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
