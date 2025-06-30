<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\loginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginUser extends Controller
{
    public function show()
    {
        return view('Auth.login');
    }
    public function login(loginRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard');
        }
        
        // if (Auth::attempt($request)) {
        //     $request->session()->regenerate();
 
        //     return redirect()->intended('dashboard');
        // }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
