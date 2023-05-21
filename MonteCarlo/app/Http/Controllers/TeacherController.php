<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Vehicle;
use App\Models\Drive;
use Illuminate\Validation\Rule;



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
        $messages = [
            'dateTime.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'dateTime.date_format' => 'Niepoprawny format daty.',     
        ];

        $validatedData = $request->validate([
            'dateTime' => 'required|date_format:Y-m-d\TH:i',
        ], $messages);

        $drive = new Drive();
        $drive->dateTime = $validatedData['dateTime'];
        $drive->idTeacher = 1;
        $drive->save();

        return redirect()->route('teacher.schedule');
    }

    function schedule_edit($id){
        $drive = Drive::find($id);
        return view('teacher.scheduleedit', compact('drive'));
    }

    function schedule_update(Request $request, $id){
        $messages = [
            'dateTime.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'dateTime.date_format' => 'Niepoprawny format daty.',     
        ];

        $validatedData = $request->validate([
            'dateTime' => 'required|date_format:Y-m-d\TH:i',
        ], $messages);

        $drive = Drive::find($id);
        $drive->dateTime = $validatedData['dateTime'];
        $drive->save();

        return redirect()->route('teacher.schedule');
    }

    function student(){
        $students = Student::where('Teacher_id', 1)->get();

        return view('teacher.student', compact('students'));
    }

    public function student_show($id)
    {
        $student = Student::find($id);
        return view('teacher.studentpage', compact('student'));
    }

    public function student_edit($id)
    {
        $student = Student::find($id);
        return view('teacher.studentedit', compact('student'));
    }

    public function student_update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'surname.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'birthDate.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'pkk.required' => 'Pole jest wymagane (powinno się składać z 20 cyfr).',
            'pkk.min' => 'Pole powinno się składać z dokładnie 20 cyfr.',     
            'pkk.unique' => 'Numer PKK jest już wykorzystany.',
        ];

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required',
            'pkk' => ['required',
                'min:20',
                Rule::unique('student')->ignore($id),
            ],
        ], $messages);

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->birthDate = $request->input('birthDate');
        $student->pkk = $request->input('pkk');

        $student->save();

        return redirect()->route('teacher.student');
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