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
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordRecoverController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;

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
Route::get('/opinion', [HomeController::class, 'opinion'])->name('home.opinion');

Route::get('/register', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('register', [RegistrationController::class, 'store']);

Route::get('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('login', [SessionsController::class, 'store']);
Route::get('logout', [SessionsController::class, 'destroy'])->name('logout');

Route::get('/recover', [LoginController::class, 'recover'])->name('login.recover');
Route::post('recover', [PasswordRecoverController::class, 'recover_password']);

//TEACHER PAGE
Route::middleware(['role:teacher'])->group(function () {
    Route::get('/teacher/schedule', [TeacherController::class, 'schedule'])->name('teacher.schedule');
    Route::get('teacher/schedule/create', [TeacherController::class, 'schedule_create'])->name('teacher.schedulecreate');
    Route::post('teacher/schedule/create', [TeacherController::class, 'store_schedule'])->name('teacher.store_schedule');
    Route::get('teacher/schedule/edit/{id}', [TeacherController::class, 'schedule_edit'])->name('teacher.schedule_edit');
    Route::patch('teacher/schedule/edit/{id}', [TeacherController::class, 'schedule_update'])->name('teacher.schedule_update');
    Route::get('/teacher/students', [TeacherController::class, 'student'])->name('teacher.student');
    Route::get('/teacher/info', [TeacherController::class, 'info'])->name('teacher.info');
    Route::get('/teacher/student/{student}/show', [TeacherController::class, 'student_show'])->name('teacher.student_show');
    Route::get('/teacher/student/{student}/edit', [TeacherController::class, 'student_edit'])->name('teacher.student_edit');
    Route::patch('/teacher/student/{student}/update', [TeacherController::class, 'student_update'])->name('teacher.student_update');
});


//ADMIN
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/teacher', [AdminController::class, 'teacher'])->name('admin.teacher');
    Route::get('/admin/teacher/teacherpage', [AdminTeacherController::class, 'teacherpage'])->name('admin.teacher.teacherpage');
    Route::get('/admin/student', [AdminController::class, 'student'])->name('admin.student');
    Route::get('admin/student/create', [AdminStudentController::class, 'create'])->name('student.create');
    Route::post('admin/student/create', [AdminStudentController::class, 'store'])->name('student.store');
    Route::get('admin/student/{student}/show', [AdminStudentController::class, 'show'])->name('student.show');
    Route::get('admin/student/{student}/edit', [AdminStudentController::class, 'edit'])->name('student.edit');
    Route::patch('admin/student/{student}/update', [AdminStudentController::class, 'update'])->name('student.update');
    Route::delete('admin/student/{student}/delete', [AdminStudentController::class, 'destroy'])->name('student.destroy');
    Route::get('/admin/teacher', [AdminController::class, 'teacher'])->name('admin.teacher');
    Route::get('admin/teacher/create', [AdminTeacherController::class, 'create'])->name('teacher.create');
    Route::post('admin/teacher/create', [AdminTeacherController::class, 'store'])->name('teacher.store');
    Route::get('admin/teacher/{teacher}/show', [AdminTeacherController::class, 'show'])->name('teacher.show');
    Route::get('admin/teacher/{teacher}/edit', [AdminTeacherController::class, 'edit'])->name('teacher.edit');
    Route::patch('admin/teacher/{teacher}/update', [AdminTeacherController::class, 'update'])->name('teacher.update');
    Route::delete('admin/teacher/{teacher}/delete', [AdminTeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::get('/admin/vehicle', [AdminController::class, 'vehicle'])->name('admin.vehicle');
    Route::get('admin/vehicle/create', [AdminVehicleController::class, 'create'])->name('vehicle.create');
    Route::post('admin/vehicle/create', [AdminVehicleController::class, 'store'])->name('vehicle.store');
    Route::get('admin/vehicle/{vehicle}/show', [AdminVehicleController::class, 'show'])->name('vehicle.show');
    Route::get('admin/vehicle/{vehicle}/edit', [AdminVehicleController::class, 'edit'])->name('vehicle.edit');
    Route::patch('admin/vehicle/{vehicle}/update', [AdminVehicleController::class, 'update'])->name('vehicle.update');
    Route::delete('admin/vehicle/{vehicle}/delete', [AdminVehicleController::class, 'destroy'])->name('vehicle.destroy');
    Route::get('admin/vehicle/{vehicle}/teacher', [AdminVehicleController::class, 'change_teacher'])->name('vehicle.teacher');
    Route::patch('admin/vehicle/{vehicle}/teacher', [AdminVehicleController::class, 'set_teacher'])->name('vehicle.setTeacher');
    Route::get('/admin/question', [AdminController::class, 'question'])->name('admin.question');
    Route::get('admin/question/create', [AdminQuestionController::class, 'create'])->name('question.create');
    Route::post('admin/question/create', [AdminQuestionController::class, 'store'])->name('question.store');
    Route::get('admin/question/{question}/edit', [AdminQuestionController::class, 'edit'])->name('question.edit');
    Route::patch('admin/question/{question}/update', [AdminQuestionController::class, 'update'])->name('question.update');
    Route::delete('admin/question/{question}/delete', [AdminQuestionController::class, 'destroy'])->name('question.destroy');
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');  
});

//CONTACT MAIL
Route::post('contact_mail', [ContactController::class, 'contact_mail_send']);
// Route::get('/', function () {
//     return view('welcome');
// });

//STUDENT
Route::middleware(['role:student'])->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/schedule', [StudentController::class, 'schedule'])->name('student.schedule');
    Route::get('/student/schedule/pickdrive', [StudentController::class, 'pickdrive'])->name('student.pickdrive');
    Route::patch('/student/schedule/pickdrive', [StudentController::class, 'setdrive'])->name('student.setdrive');
    Route::patch('/student/schedule/deldrive', [StudentController::class, 'deldrive'])->name('student.deldrive');
    Route::get('/student/materials', [StudentController::class, 'materials'])->name('student.materials');
    Route::get('/student/materials/{pdf}', [StudentController::class, 'show_material'])->name('student.show_material');
    // Route::get('/student/test', [StudentController::class, 'test'])->name('student.test');
    // Route::get('/student/testpage', [StudentController::class, 'testpage'])->name('student.testpage');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');
    Route::get('/student/teacher', [StudentController::class, 'change_teacher'])->name('student.teacher');
    Route::get('/student/teacher/{teacher}/opinion', [StudentController::class, 'review_teacher'])->name('student.review_teacher');
    Route::post('/student/teacher/opinion/store', [StudentController::class, 'review_teacher_store'])->name('student.review_teacher_store');
    Route::patch('/student/teacher', [StudentController::class, 'set_teacher'])->name('student.setTeacher');
    Route::get('/student/opinion', [StudentController::class, 'opinion'])->name('student.opinion');
    Route::post('/student/opinion', [StudentController::class, 'store'])->name('student.opinion');
    Route::get('/student/chat', [StudentController::class, 'chat'])->name('student.chat');

    Route::get('/student/test', [StudentController::class, 'test'])->name('student.test');
    Route::get('/student/test/start', [TestController::class, 'start'])->name('test.start');
    Route::post('/student/test/next', [TestController::class, 'nextQuestion'])->name('test.next');
    Route::get('/student/test/end', [TestController::class, 'end'])->name('test.end');
});