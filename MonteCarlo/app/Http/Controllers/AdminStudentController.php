<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\StudentPermissions;

class AdminStudentController extends Controller
{
    public function studentpage(){
        return view('admin.studentpage');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.studentcreate', compact('categories'));
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
            'phoneNumber.required' => 'Pole jest wymagane (powinno się składać z 9 cyfr).', 
            'categories.required' => 'Pole jest wymagane. Wybierz kategorie dla instruktora.', 
            'password.required' => 'Pole jest wymagane. Uzupełnij dane.',
            'password.min' => 'Hasło powinno składać się z co najmniej 8 znaków.',    
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required|before:-14 years',
            'pkk' => 'required|min:20|unique:student',
            'email' => 'required',
            'phoneNumber' => 'required|min:9|unique:student',
            'categories' => 'required|array',
            'password' => 'required|min:8',
        ], $messages);

        $student = new Student;
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->birthDate = $request->input('birthDate');
        $student->pkk = $request->input('pkk');
        $student->phoneNumber = $request->input('phoneNumber');
        $student->password = Hash::make($request->input('password'));
        $student->save();

        $categories = Category::whereIn('id', $validatedData['categories'])->get();
        foreach ($categories as $category) {
            $StudentPermission = new StudentPermissions();
            $StudentPermission->idCourseRecords = $category->id;
            $StudentPermission->idStudent = $student->id;
            $StudentPermission->save();
        }

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
            'phoneNumber.required' => 'Pole jest wymagane (powinno się składać z 9 cyfr).',
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
            'phoneNumber' => ['required',
                'min:9',
                Rule::unique('student')->ignore($id),
            ],
            'password' => 'required|min:8'
        ], $messages);

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->email = $request->input('email');
        $student->birthDate = $request->input('birthDate');
        $student->pkk = $request->input('pkk');
        $student->phoneNumber = $request->input('phoneNumber');

        if ($request->has('password') && $request->input('password') != '') {
            // Get the current password from the database
            $currentPassword = $student->password;
            
            // Check if the new password is different from the current password
            if ($request->input('password') != $currentPassword) {
                // Hash the new password
                $student->password = Hash::make($request->input('password'));
            }
        }

        $student->save();

        return redirect()->route('admin.student');
    }

    public function destroy(Student $student)
    {
        $student -> delete();

        return redirect()->route('admin.student');
    }
}