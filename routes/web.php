<?php

use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\loginUser;
use App\Http\Controllers\Auth\registerUser;
use App\Http\Controllers\Auth\VerificationCodeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Carbon\Carbon;
use Faker\Guesser\Name;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



Route::get('/', [dashboardController::class, 'show'])->name('dashboard');

//لاگین و ریجستر داخل میدلور گست

Route::middleware('guest')->group(function () {
    //اضافه کردن یوزر
    Route::get('/register', [registerUser::class, 'show'])->name('register');
    Route::post('/register', [registerUser::class, 'register'])->name('register.submit');
    //ورود
    Route::get('/login', [loginUser::class, 'show'])->name('login');
    Route::post('/login', [loginUser::class, 'login'])->name('login.submit');
    //ورود با گوگل
    Route::get('google/login', [GoogleController::class, 'index'])->name('google.login');
    Route::get('google/callback', [GoogleController::class, 'callback']);
    //ورود با sms 
    Route::get('/loginSms', [VerificationCodeController::class, 'showForm'])->name('login.sms');
    Route::post('sendCode', [VerificationCodeController::class, 'sendCode'])->name('send.code');
    Route::post('verifyCode', [VerificationCodeController::class, 'verifyCode'])->name('verify.code');
    Route::post('resendVerifyCode', [VerificationCodeController::class, 'resendCode'])->name('resend.code');
});

//داشبورد و لاگ اوت داخل گروپ میدلور آث
Route::middleware('auth')->group(function () {

    Route::post('/logout', [loginUser::class, 'logout'])->name('logout');

    //سبد خرید
    Route::get('/cart/add/{products}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
    Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    //سفارش های کاربر
    Route::get('/my-orders', [CartController::class, 'myOrders'])->name('orders.history');
});

Route::get('/logout', [loginUser::class, 'logout'])->name('logout');

Route::get('/profile', [dashboardController::class, 'edit'])->name('profile.edit');
Route::get('/orders', [dashboardController::class, 'index'])->name('orders.index');



//تست هرچیز جدیدی
Route::get('/test', function () {
    dd(User::whereDate('created_at',Carbon::today())->get());
})->name('test');

// نمایش محصولات 

Route::get('/list', [ProductController::class, 'index'])->name('product.list');
// روت های قسمت مخصوص ادمین سایت
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // روت های مخصوص ادمین
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.admin');
        Route::get('customers', [AdminController::class, 'showCustomers'])->name('admin.customers');

        // کرود محصولات
        Route::group(['prefix' => 'product'], function () {
            // Route::resource('/',ProductController::class);
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/create', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        });
        //کرود اسلایدرز
        Route::group(['prefix' => 'slider'],function(){
            Route::post('create',[SliderController::class, 'store'])->name('slider.create');
            Route::get('editSlider/{slider}',[SliderController::class, 'edit'])->name('slider.edit');
            Route::get('deleteSlider/{slider}',[SliderController::class,'destroy'])->name('slider.destroy');

        });
    });
});
