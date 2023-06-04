<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Drive;
use App\Models\Opinion;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherOpinions;
use App\Models\Score;

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

        $student_id = Auth::user()->id;
        $schedules = Drive::where('idStudent', $student_id)->get();

        return view('student.schedule', compact('schedules'));
    }

    public function pickdrive()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        $teacher_id = Auth::user()->Teacher_id;
        $schedules = Drive::where('idTeacher', '=', $teacher_id)->whereNull('idStudent')->get();
        return view('student.pickdrive', compact('schedules'));
    }

    public function setdrive(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }

        $messages = [
            'drive.required' => 'Pole jest wymagane. Uzupełnij dane.',     
        ];

        $request->validate([
            'drive' => 'required',
        ], $messages);

        $id = $request->drive;
        
        $drive = Drive::find($id);
        $drive->idStudent = Auth::user()->id;
        $drive->save();

        return redirect()->route('student.schedule');
    }

    public function deldrive(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }

        $id = $request->id;
        
        $drive = Drive::find($id);
        $drive->idStudent = NULL;
        $drive->save();

        return redirect()->route('student.schedule');
    }

    public function materials()
    {
        return view('student.materials');
    }

    public function show_material($pdf)
    {
        $pdfPath = '/pdf/' . $pdf;

        return view('student.material')->with('pdfPath', $pdfPath);
    }

    public function test()
    {
        $studentId = auth()->id(); // Assuming you have a logged-in user with an ID
        $scores = Score::where('idStudent', $studentId)->get();
    
        return view('student.test', compact('scores'));
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

    public function review_teacher($Teacher_id){
        
        $teacher = Teacher::findOrFail($Teacher_id);
        $student = Auth::user();
        return view('student.teacheropinion', compact('teacher', 'student'));
    }

    public function review_teacher_store(Request $request){
            
        $messages = [
            'opinion.required' => 'Pole jest wymagane.',
            'score.required' => 'Pole jest wymagane.',
        ];

        $request->validate([
            'opinion' => 'required|string',
            'score' => 'required|integer|min:1|max:5',
            'student_id' => 'required|exists:student,id',
            'teacher_id' => 'required|exists:teacher,id',
        ], $messages);


        $opinionText = $request->input('opinion');
        $score = $request->input('score');
        $studentId = $request->input('student_id');
        $teacherId = $request->input('teacher_id');

        $opinion = new TeacherOpinions();

        $opinion->opinionText = $opinionText;
        $opinion->score = $score;
        $opinion->idStudent = $studentId;
        $opinion->idTeacher = $teacherId;

        $opinion->save();

        // Optionally, you can redirect the user to a success page or perform any other necessary actions
        return redirect()->route('student.profile');
    }

    public function opinion()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        return view('student.opinion');
    }

    public function store(Request $request)
    {
        $messages = [
            'opinion.required' => 'Pole jest wymagane.',
            'score.required' => 'Pole jest wymagane.',
        ];

        $request->validate([
            'opinion' => 'required',
            'score' => 'required',
        ], $messages);

        $opinion = new Opinion;
        $opinion->score = $request->input('score');
        $opinion->opinionText = $request->input('opinion');
        $opinion->idStudent = Auth::user()->id;
        $opinion->save();

        return redirect()->route('student.schedule');
    }

    public function chat()
    {
        if (!auth()->check()) {
            return redirect()->route('login.login');
        }
        return view('student.chat');
    }
}