<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


Route::middleware('auth')->group(function () {
    Route::get('/product', [DashboardController::class, 'product'])->name('product');
    Route::get('/product/create', [DashboardController::class, 'create'])->name('product.create');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
});
