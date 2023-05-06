<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller
{
    public function teacherpage(){
        return view('admin.teacherpage');
    }
    
    public function create()
    {
        return view('admin.teachercreate');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'surname.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'birthDate.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'phoneNumber.required' => 'Pole jest wymagane (powinno się składać z 9 cyfr).',
            'phoneNumber.min' => 'Pole powinno się składać z dokładnie 9 cyfr.',     
            'phoneNumber.unique' => 'Numer telefonu jest już wykorzystany.',     
            'email.required' => 'Pole jest wymagane. Uzupełnij dane.',  
            'password.required' => 'Pole jest wymagane. Uzupełnij dane.',   
        ];

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required',
            'phoneNumber' => 'required|min:9|unique:teacher',
            'email' => 'required',
            'password' => 'required',
        ], $messages);

        $teacher = new Teacher;
        $teacher->name = $request->input('name');
        $teacher->surname = $request->input('surname');
        $teacher->email = $request->input('email');
        $teacher->birthDate = $request->input('birthDate');
        $teacher->phoneNumber = $request->input('phoneNumber');
        $teacher->password = Hash::make($request->input('password'));
        $teacher->save();

        return redirect()->route('admin.teacher');
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        $vehicle_id = $teacher->Vehicle_id;
        $vehicle = Vehicle::find($vehicle_id);
        return view('admin.teacherpage', compact('teacher'), compact('vehicle'));
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('admin.teacheredit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'surname.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'birthDate.required' => 'Pole jest wymagane. Uzupełnij dane.',     
            'phoneNumber.required' => 'Pole jest wymagane (powinno się składać z 9 cyfr).',
            'phoneNumber.min' => 'Pole powinno się składać z dokładnie 9 cyfr.',     
            'phoneNumber.unique' => 'Numer telefonu jest już wykorzystany.',     
            'email.required' => 'Pole jest wymagane. Uzupełnij dane.',  
            'password.required' => 'Pole jest wymagane. Uzupełnij dane.',   
        ];

        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required',
            'phoneNumber' => ['required',
                'min:9',
                Rule::unique('teacher')->ignore($id),
            ],
            'email' => 'required',
            'password' => 'required',
        ], $messages);

        $teacher = Teacher::find($id);
        $teacher->name = $request->input('name');
        $teacher->surname = $request->input('surname');
        $teacher->email = $request->input('email');
        $teacher->birthDate = $request->input('birthDate');
        $teacher->phoneNumber = $request->input('phoneNumber');
        if ($request->has('password') && $request->input('password') != '') {
            // Get the current password from the database
            $currentPassword = $teacher->password;
            
            // Check if the new password is different from the current password
            if ($request->input('password') != $currentPassword) {
                // Hash the new password
                $teacher->password = Hash::make($request->input('password'));
            }
        }
        $teacher->save();

        return redirect()->route('admin.teacher');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher -> delete();

        return redirect()->route('admin.teacher');
    }
}