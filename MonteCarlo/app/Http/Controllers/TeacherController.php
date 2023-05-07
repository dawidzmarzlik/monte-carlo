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

    function store_schedule(Request $request){
        $teacher = new Teacher();
        $teacher->Teacher_id = $request->Teacher_id;
        $teacher->Vehicle_id = $request->Vehicle_id;
        $teacher->save();

        return redirect()->route('teacher.schedule');
    }

    function student(){
        //$students = Student::all();

        return view('teacher.student');
    }

    function info($id=1){
        //$vehicle = Vehicle::all();
        //$teacher = Teacher::all();

        //return view('teacher.info');
        $teacher = Teacher::find($id=1);
        $vehicle_id = $teacher->Vehicle_id;
        $vehicle = Vehicle::find($vehicle_id=1);
        return view('teacher.info', compact('teacher'), compact('vehicle'));
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        $vehicle_id = $teacher->Vehicle_id;
        $vehicle = Vehicle::find($vehicle_id);
        return view('teacher.info', compact('teacher'), compact('vehicle'));
    }
}