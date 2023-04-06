<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function teacher(){
        return view('admin.teacher');
    }

    public function vehicle(){
        return view('admin.vehicle');
    }
}
