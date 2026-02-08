<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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

// routes/web.php
Route::get('/',[HomeController::class,'index']);
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authLogin']);
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'authRegister'])->name('auth.register');


Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


Route::middleware('auth')->group(function (){
//    Route::get('/dashboard',[DashboardController::class,'dashboard']);
    Route::get('/dashboard',[DashboardController::class,'index']);
});
