<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Vehicle;



class TeacherController extends Controller
{
    function schedule(){
        //$schedules = Schedule::all();

        return view('teacher.schedule');
    }

    function student(){
        //$students = Student::all();

        return view('teacher.student');
    }

    function info(){
        //$vehicle = Vehicle::all();
        //$teacher = Teacher::all();

        return view('teacher.info');
    }
}