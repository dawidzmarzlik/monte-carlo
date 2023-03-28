<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:student',
            'birthDate' => 'required|date|date_format:Y-m-d',
            'pkk' => 'required|min:20|max:20',
            'password' => 'required'
        ]);
        
        $student = Student::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'birthDate' => $request->birthDate,
            'pkk' => $request->pkk,
            'password' => Hash::make($request->password)
        ]);
        
        auth()->login($student);
        
        return redirect()->to('/');
    }
}