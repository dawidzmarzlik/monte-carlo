<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function contact_mail_send(Request $request)
    {
        $messages = [
            'name.required' => 'Pole jest wymagane. Uzupełnij dane.',
            'email.required' => 'Podany e-mail jest nieprawidłowy.',
            'email.email' => 'Podany e-mail jest nieprawidłowy.',
            'email.valid_email' => 'Podany e-mail posiada nieprawidłowy adres domeny.',
            'message.required' => 'Pole jest wymagane. Uzupełnij dane.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|valid_email',
            'message' => 'required|min:10|max:1000',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validation passed, send the email
        Mail::to('szkolamontecarlo@gmail.com')->send(new ContactMail($request));

        return redirect('')->with('success', 'Email sent successfully!#contact-form');
    }
}

// Place this code outside the class
Validator::extend('valid_email', function ($attribute, $value, $parameters, $validator) {
    list(, $domain) = explode('@', $value);
    return checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A');
});