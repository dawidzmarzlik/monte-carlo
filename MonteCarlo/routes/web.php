<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });