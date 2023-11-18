<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IotController;
use App\Http\Controllers\LogControllerR;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\UserControllerR;
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

// Profile Dashboard
Route::get('/dashboard/profile', [ProfileController::class, 'showProfile'])->middleware('auth');
Route::post('/dashboard/profile', [ProfileController::class, 'editProfile'])->middleware('auth');

// Attendance Log
Route::get('/dashboard/attendance', [LogControllerR::class, 'index'])->middleware('auth');

//ADMIN
//shift
Route::resource('/dashboard/shift', ShiftController::class)->except('show')->middleware('admin');

//User
Route::resource('/dashboard/user', UserControllerR::class)->except('create|show|store')->middleware('admin');

//Log
Route::get('/dashboard/log', [LogControllerR::class, 'index'])->middleware('admin');



//IOT REQUEST ROUTE
Route::get('/iot/device', [IotController::class, 'iotInit']);
