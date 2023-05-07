<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Vehicle;
use App\Models\Drive;



class TeacherController extends Controller
{
    function schedule(){
        $schedules = Drive::where('idTeacher', 1)->get();

        return view('teacher.schedule', compact('schedules'));
    }

    function schedule_create(){
        return view('teacher.schedulecreate');
    }

    function store_schedule(Request $request){
        
        //WALIDACJA
        $validatedData = $request->validate([
            'dateTime' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $drive = new Drive();
        $drive->dateTime = $validatedData['dateTime'];
        $drive->idTeacher = 1;
        $drive->save();

        return redirect()->route('teacher.schedule');
    }

    function student(){
        $students = Student::where('Teacher_id', 1)->get();

        return view('teacher.student', compact('students'));
    }

    function info($id=1){
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