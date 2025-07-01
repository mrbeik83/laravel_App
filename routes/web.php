<?php

use App\Http\Controllers\Auth\loginUser;
use App\Http\Controllers\Auth\registerUser;
use App\Http\Controllers\dashboardController;
use Faker\Guesser\Name;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('layout.master');
});
Route::middleware('guest')->group(function(){
    //اضافه کردن یوزر
    Route::get('/register',[registerUser::class,'show'])->name('register');
    Route::post('/register',[registerUser::class,'register'])->name('register.submit');
    //ورود
    Route::get('/login',[loginUser::class,'show'])->name('login');
    Route::post('/login',[loginUser::class,'login'])->name('login.submit');
});

Route::get('/dashboard',[dashboardController::class,'show'])->middleware('auth')->name('dashboard');

Route::post('/logout',[loginUser::class,'logout'])->middleware('auth')->name('logout');

Route::get('/cart', [dashboardController::class, 'index'])->name('cart.index');
Route::get('/profile', [dashboardController::class, 'edit'])->name('profile.edit');
Route::get('/orders', [dashboardController::class, 'index'])->name('orders.index');