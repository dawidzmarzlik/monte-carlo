<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

class ContactController extends Controller
{
    public function contact_mail_send(Request $request)
    {
        Mail::to('szkolamontecarlo@gmail.com')->send(new ContactMail($request));
        return redirect('');
    }
}