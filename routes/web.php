<?php

use App\Http\Controllers\Auth\loginUser;
use App\Http\Controllers\Auth\registerUser;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('layout.master');
});

    //اضافه کردن یوزر
Route::get('/register',[registerUser::class,'show'])->name('register');
Route::post('/register',[registerUser::class,'register'])->name('register.submit');
    //ورود
Route::get('/login',[loginUser::class,'show'])->name('login');
Route::post('/login',[loginUser::class,'login'])->name('login.submit');

Route::get('/dashboard',function(){
    dd('seccesfully');
});

