<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function login()
    {
        return view('login.login');
    }
    
    public function store(Request $request)
    {
        $messages = [    
            'email.required' => 'Wpisz adres e-mail.',       
            'email.exists' => 'Podany adres e-mail nie istnieje.',       
            'password.required' => 'Wpisz hasło.',      
        ];

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);

        $credentials = $request->only('email', 'password');
        
        if (auth()->guard('web')->attempt($credentials)) {
            $role = 'student';
            $redirectRoute = 'student.schedule';
        } elseif (auth()->guard('teacher')->attempt($credentials)) {
            $role = 'teacher';
            $redirectRoute = 'teacher.schedule';
        } elseif (auth()->guard('admin')->attempt($credentials)) {
            $role = 'admin';
            $redirectRoute = 'admin.teacher';
        } else {
            return redirect()->back()->withErrors(['student' => 'Błędny adres e-mail lub hasło.']);
        }
        
        $request->session()->put('role', $role);
        return redirect()->route($redirectRoute);
    }
    
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
} 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 