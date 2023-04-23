<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Question;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function teacher(){
        $teachers = Teacher::all();
        
        return view('admin.teacher', compact('teachers'));
    }

    public function vehicle(){
        $vehicles = Vehicle::all();

        return view('admin.vehicle', compact('vehicles'));
    }

    public function student(){
        $students = Student::all();

        return view('admin.student', compact('students'));
    }

    public function question(){
        $questions = Question::all();

        return view('admin.question', compact('questions'));
    }
}