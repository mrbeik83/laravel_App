<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\registerRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class registerUser extends Controller
{
    public function show()
    {
        return view('Auth.register');
    }
    public function register(registerRequest $request)
    {
        $newUserRegister = User::create([
            ...$request->validated(),
            'password' => Hash::make($request->password)
        ]);
        Auth::guard()->loginUsingId($newUserRegister->id);

        return redirect(route('dashboard'))->with('success', 'ثبت نام با موفقیت انجام شد! حالا می‌توانید وارد شوید.');
    }
}
