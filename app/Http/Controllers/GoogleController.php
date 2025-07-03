<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Expectation;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function index(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        try{

            $googleSendUser = Socialite::driver('google')->user();
            $user = User::where('email',$googleSendUser->email)->first();
            if($user){
                Auth::guard()->loginUsingId($user->id);
                return redirect(route('product.list'));
            }else{
                User::create([
                    'name' => $googleSendUser->name,
                    'email' => $googleSendUser->email,
                    'password' => encrypt(Str::random(20))
                ]);
                Auth::guard()->loginUsingId($googleSendUser->id);
            }

        }catch(Exception $exception){
            dd($exception);
        }
        // $user = Socialite::driver('google')->user();
        // dd($user);
    }
}
