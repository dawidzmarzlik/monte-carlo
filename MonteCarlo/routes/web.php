<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminTeacherController;
use App\Http\Controllers\AdminVehicleController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('home.pricing');

Route::get('/register', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('register', [RegistrationController::class, 'store']);

Route::get('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('login', [SessionsController::class, 'store']);
Route::get('logout', [SessionsController::class, 'destroy'])->name('logout');

Route::get('/recover', [LoginController::class, 'recover'])->name('login.recover');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/teacher', [AdminController::class, 'teacher'])->name('admin.teacher');
Route::get('/admin/teacher/teacherpage', [AdminTeacherController::class, 'teacherpage'])->name('admin.teacher.teacherpage');

//STUDENT
Route::get('/admin/student', [AdminController::class, 'student'])->name('admin.student');
Route::get('admin/student/create', [AdminStudentController::class, 'create'])->name('student.create');
Route::post('admin/student/create', [AdminStudentController::class, 'store'])->name('student.store');
Route::get('admin/student/{student}/show', [AdminStudentController::class, 'show'])->name('student.show');
Route::get('admin/student/{student}/edit', [AdminStudentController::class, 'edit'])->name('student.edit');
Route::patch('admin/student/{student}/update', [AdminStudentController::class, 'update'])->name('student.update');
Route::delete('admin/student/{student}/delete', [AdminStudentController::class, 'destroy'])->name('student.destroy');
//Route::get('/admin/teacher/studentpage', [AdminTeacherController::class, 'studentpage'])->name('admin.teacher.studentpage');


// VEHICLE RELATED
Route::get('/admin/vehicle', [AdminController::class, 'vehicle'])->name('admin.vehicle');
Route::get('admin/vehicle/create', [AdminVehicleController::class, 'create'])->name('vehicle.create');
Route::post('admin/vehicle/create', [AdminVehicleController::class, 'store'])->name('vehicle.store');
Route::get('admin/vehicle/{vehicle}/show', [AdminVehicleController::class, 'show'])->name('vehicle.show');
Route::get('admin/vehicle/{vehicle}/edit', [AdminVehicleController::class, 'edit'])->name('vehicle.edit');
Route::patch('admin/vehicle/{vehicle}/update', [AdminVehicleController::class, 'update'])->name('vehicle.update');
Route::delete('admin/vehicle/{vehicle}/delete', [AdminVehicleController::class, 'destroy'])->name('vehicle.destroy');
// VEHICLE RELATED

Route::post('contact_mail', [ContactController::class, 'contact_mail_send']);
// Route::get('/', function () {
//     return view('welcome');
// });