<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rule;

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
        $messages = [
            'name.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'surname.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'birthDate.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'pkk.required' => 'Pole jest wymagane (powinno się składać z 20 cyfr).',
            'pkk.min' => 'Pole powinno się składać z dokładnie 20 cyfr.',     
            'pkk.unique' => 'Numer PKK jest już wykorzystany.',     
            'email.required' => 'Pole jest wymagane. Uzupełnij dane.',  
            'password.required' => 'Pole jest wymagane. Uzupełnij dane.',
            'password.min' => 'Hasło powinno składać się z co najmniej 8 znaków.',    
        ];

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required',
            'pkk' => 'required|min:20|unique:student',
            'email' => 'required',
            'password' => 'required|min:8',
        ], $messages);

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

    public function show($id)
    {
        $student = Student::find($id);
        return view('admin.studentpage', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('admin.studentedit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'surname.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'birthDate.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'pkk.required' => 'Pole jest wymagane (powinno się składać z 20 cyfr).',
            'pkk.min' => 'Pole powinno się składać z dokładnie 20 cyfr.',     
            'pkk.unique' => 'Numer PKK jest już wykorzystany.',     
            'email.required' => 'Pole jest wymagane. Uzupełnij dane.',  
            'password.required' => 'Pole jest wymagane. Uzupełnij dane.', 
            'password.min' => 'Hasło powinno składać się z co najmniej 8 znaków.',  
        ];

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required',
            'pkk' => ['required',
                'min:20',
                Rule::unique('student')->ignore($id),
            ],
            'email' => 'required',
            'password' => 'required|min:8'
        ], $messages);

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->birthDate = $request->input('birthDate');
        $student->pkk = $request->input('pkk');
        $student->password = $request->input('password');
        $student->save();

        return redirect()->route('admin.student');
    }

    public function destroy(Student $student)
    {
        $student -> delete();

        return redirect()->route('admin.student');
    }
}
