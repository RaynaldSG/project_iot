<?php

use App\Http\Controllers\LoginRegisterController;
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
Route::get('/dashboard', function(){
    return view('dashboard.dashboardView', ['title' => 'IoTAbs | Dashboard']);
})->middleware('auth');

Route::get('dashboard/profile', function(){
    return view('dashboard.profile.profile', ['title' => 'IoTAbs | Profile']);
})->middleware('auth');
