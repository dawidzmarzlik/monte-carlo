<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function teacherpage(){
        return view('admin.teacherpage');
    }
/*
    public function studentpage(){
        return view('admin.studentpage');
    }
*/
}
