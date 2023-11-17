<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Login and Register view
Route::get('/', [LoginRegisterController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [LoginRegisterController::class, 'register'])->middleware('guest');
// Login and Register Control, Logout Control
Route::post('/', [LoginRegisterController::class, 'loginControl'])->middleware('guest');
Route::post('/register', [LoginRegisterController::class, 'registerControl'])->middleware('guest');
Route::get('/logout', [LoginRegisterController::class, 'logout'])->middleware('auth');


// Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboardC'])->middleware('auth');

Route::get('dashboard/attendance', function(){
    return view('dashboard.attendance.attendanceView', ['title' => 'IoTAbs | Attendance']);
})->middleware('auth');

// Profile Dashboard
Route::get('dashboard/profile', [ProfileController::class, 'showProfile'])->middleware('auth');
Route::post('dashboard/profile', [ProfileController::class, 'editProfile'])->middleware('auth');
