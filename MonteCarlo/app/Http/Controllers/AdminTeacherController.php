<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Teacher;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\TeacherPermissions;

class AdminTeacherController extends Controller
{
    public function teacherpage(){
        return view('admin.teacherpage');
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('admin.teachercreate', compact('categories'));
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
            'categories.required' => 'Pole jest wymagane. Wybierz kategorie dla instruktora.',
            'email.required' => 'Pole jest wymagane. Uzupełnij dane.',  
            'password.required' => 'Pole jest wymagane. Uzupełnij dane.',   
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required',
            'phoneNumber' => 'required|min:9|unique:teacher',
            'categories' => 'required|array',
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

        $categories = Category::whereIn('id', $validatedData['categories'])->get();
        foreach ($categories as $category) {
            $teacherPermission = new TeacherPermissions();
            $teacherPermission->idCourseRecords = $category->id;
            $teacherPermission->idTeacher = $teacher->id;
            $teacherPermission->save();
    }

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
        $categories = Category::all();
        return view('admin.teacheredit', compact('teacher', 'categories'));
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

        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required',
            'phoneNumber' => ['required',
                'min:9',
                Rule::unique('teacher')->ignore($id),
            ],
            'categories' => 'required|array',
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
        $categories = Category::whereIn('id', $validatedData['categories'])->get();
        foreach ($categories as $category) {
            $teacherPermission = new TeacherPermissions();
            $teacherPermission->idCourseRecords = $category->id;
            $teacherPermission->idTeacher = $teacher->id;
            $teacherPermission->save();
        }
        return redirect()->route('admin.teacher');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher -> delete();

        return redirect()->route('admin.teacher');
    }
}