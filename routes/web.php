<?php

use App\Http\Controllers\Auth\loginUser;
use App\Http\Controllers\Auth\registerUser;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Faker\Guesser\Name;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('layout.master');
});
//لاگین و ریجستر داخل میدلور گست

Route::middleware('guest')->group(function(){
    //اضافه کردن یوزر
    Route::get('/register',[registerUser::class,'show'])->name('register');
    Route::post('/register',[registerUser::class,'register'])->name('register.submit');
    //ورود
    Route::get('/login',[loginUser::class,'show'])->name('login');
    Route::post('/login',[loginUser::class,'login'])->name('login.submit');
});

//داشبورد و لاگ اوت داخل گروپ میدلور آث
Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[dashboardController::class,'show'])->name('dashboard');
    Route::post('/logout',[loginUser::class,'logout'])->name('logout');
});

Route::post('/logout',[loginUser::class,'logout'])->name('logout');

Route::get('/cart', [dashboardController::class, 'index'])->name('cart.index');
Route::get('/profile', [dashboardController::class, 'edit'])->name('profile.edit');
Route::get('/orders', [dashboardController::class, 'index'])->name('orders.index');

Route::group(['prefix' => 'product'], function () {

        Route::get('/create',[ProductController::class,'create'])->name('create');
        Route::post('/create',[ProductController::class,'store'])->name('create.product');

        Route::get('/list',[ProductController::class,'index'])->name('product.list');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('update/{id}',[ProductController::class,'update'])->name('product.update');
        Route::get('/delete/{id}',[ProductController::class,'destroy'])->name('product.destroy');


});
