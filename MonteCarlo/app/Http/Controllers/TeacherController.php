<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Vehicle;
use App\Models\Drive;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    function schedule(){
        $teacher_id = Auth::guard('teacher')->user()->id;
        $schedules = Drive::where('idTeacher', $teacher_id)->get();

        return view('teacher.schedule', compact('schedules'));
    }

    function schedule_create(){
        return view('teacher.schedulecreate');
    }

    function store_schedule(Request $request){
        
        // WALIDACJA
        $messages = [
            'dateTime.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'dateTime.date_format' => 'Niepoprawny format daty.',     
            'dateTime.after_or_equal' => 'Nie można wybrać przeszłej daty.',
        ];

        $validatedData = $request->validate([
            'dateTime' => 'required|date_format:Y-m-d\TH:i|after_or_equal:now',
        ], $messages);

        $teacher_id = Auth::guard('teacher')->user()->id;

        $drive = new Drive();
        $drive->dateTime = $validatedData['dateTime'];
        $drive->idTeacher = $teacher_id;
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
        $teacher_id = Auth::guard('teacher')->user()->id;
        $students = Student::where('Teacher_id', $teacher_id)->get();

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
            'phoneNumber.required' => 'Pole jest wymagane (powinno się składać z 9 cyfr).',    
            'pkk.required' => 'Pole jest wymagane (powinno się składać z 20 cyfr).',
            'pkk.min' => 'Pole powinno się składać z dokładnie 20 cyfr.',     
            'pkk.unique' => 'Numer PKK jest już wykorzystany.',
        ];

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required',
            'phoneNumber' => ['required',
                'min:9',
                Rule::unique('student')->ignore($id),
            ],
            'pkk' => ['required',
                'min:20',
                Rule::unique('student')->ignore($id),
            ],
        ], $messages);

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->birthDate = $request->input('birthDate');
        $student->phoneNumber = $request->input('phoneNumber');
        $student->pkk = $request->input('pkk');

        $student->save();

        return redirect()->route('teacher.student');
    }

    function info(){
        $teacher_id = Auth::guard('teacher')->user()->id;
        $teacher = Teacher::find($teacher_id);
        $vehicle = Vehicle::where('Teacher_id', $teacher_id)->first();
        return view('teacher.info', compact('teacher'), compact('vehicle'));
    }
}