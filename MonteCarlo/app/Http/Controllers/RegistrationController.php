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
        $messages = [
            'name.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'surname.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'birthDate.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'birthDate.before' => 'Musisz mieć conajmniej 18 lat.',     
            'pkk.required' => 'Wpisz numer PKK. Powinien się składać z 20 cyfr.',
            'pkk.min' => 'Numer PKK powinien się składać z 20 cyfr.',      
            'email.required' => 'Wpisz adres e-mail.',     
            'email.unique' => 'Adres e-mail jest już zajęty.',     
            'password.required' => 'Wpisz hasło. Powinno się składać z minimum 8 znaków.',     
            'password.min' => 'Hasło powinno się składać z minimum 8 znaków.',     
        ];
        
        $request->validate([
            'name' => 'required|alpha:ascii',
            'surname' => 'required',
            'email' => 'required|email|unique:student',
            'birthDate' => 'required|date|date_format:Y-m-d|before:-18 years',
            'pkk' => 'required|numeric|min:20|max:20',
            'password' => 'required|min:8'
        ], $messages);
        
        $student = Student::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'birthDate' => $request->birthDate,
            'pkk' => $request->pkk,
            'password' => Hash::make($request->password)
        ]);

        if(!is_null($student)) {
            auth()->login($student);
            return redirect()->to('/');
        }
        else {
            return back()->with("failed", "Błąd. Nie udało się utworzyć konta.")->withInput();
        }
    }
}