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
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            $user = auth()->user();
            if($user->isAdmin){
                return redirect()->intended(route('dashboard.admin'));
            }
            else{
            return redirect()->intended('dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
