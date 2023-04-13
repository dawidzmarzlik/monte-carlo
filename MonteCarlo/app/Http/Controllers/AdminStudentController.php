<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminStudentController extends Controller
{
    public function studentpage(){
        return view('admin.studentpage');
    }

    public function create()
    {
        return view('admin.studentcreate');
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->birthDate = $request->input('birthDate');
        $student->pkk = $request->input('pkk');
        $student->password = $request->input('password');
        $student->save();

        return redirect()->route('admin.student');
    }
}
