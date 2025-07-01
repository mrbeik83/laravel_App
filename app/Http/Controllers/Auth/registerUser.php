<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\registerRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class registerUser extends Controller
{
    public function show()
    {
        return view('Auth.register');
    }
    public function register(registerRequest $request)
    {
        User::create([
            ...$request->validated(),
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('login'))->with('success', 'ثبت نام با موفقیت انجام شد! حالا می‌توانید وارد شوید.');
    }
}
