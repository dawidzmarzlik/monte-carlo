<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Student;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function teacher(){
        return view('admin.teacher');
    }

    public function vehicle(){
        $vehicles = Vehicle::all();

        return view('admin.vehicle', compact('vehicles'));
    }

    public function student(){
        $students = Student::all();

        return view('admin.student', compact('students'));
    }
}
