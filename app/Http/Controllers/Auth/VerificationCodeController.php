<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VerificationCodeController extends Controller
{
    public function showForm(){
        return view('auth.login-sms');
    }
    public function sendCode(Request $request){
        $validator = validator::make($request->all(),[
            'phone' => ['required' , 'regex:/^09[0-9]{9}$/']
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $phone = $request->phone;

        $code = random_int(100000,999999);

        VerificationCode::create([
            'phone' => $phone,
            'code' => $code,
            'expires_at' => Carbon::now()->addMinutes(5),
            'used' => false,
        ]);
        // فضا برای ارسال کد به مشتری

        return redirect()->back()->with('success',"کد تایید برای $phone ارسال شد :$code");
    }
}
