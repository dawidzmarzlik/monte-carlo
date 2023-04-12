<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function teacher(){
        return view('admin.teacher');
    }

    public function student(){
        return view('admin.student');
    }

    public function vehicle(){
        $vehicles = Vehicle::all();

        return view('admin.vehicle', compact('vehicles'));
    }
}
