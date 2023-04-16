<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Mail;

class PasswordRecoverController extends Controller
{
    public function recover_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ], [
            'email.required' => 'Proszę podaj swój adres email.'
        ]);

        $email = $request->input('email');
        $user = Student::where('email', $email)->first();

        if ($user) {
            $tempPassword = Str::random(8);

            $user->password = Hash::make($tempPassword);
            $user->save();

            $emailData = [
                'name' => $user->name,
                'tempPassword' => $tempPassword
            ];

            Mail::send('emails.forgot-password', $emailData, function($message) use ($user) {
                $message->to($user->email, $user->name)
                        ->subject('Forgot Password');
            });

            return redirect('/')->with('status', 'Hasło tymczasowe zostało wysłane na twój email.');
        } 
        return back()->withErrors([
            'email' => 'Podany email nie istnieje w naszej bazie.']);
    }
}