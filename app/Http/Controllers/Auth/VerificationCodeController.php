<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VerificationCodeController extends Controller
{
    public function showForm()
    {
        return view('auth.login-sms');
    }
    public function sendCode(Request $request)
    {

        $validator = validator::make($request->all(), [
            'phone' => ['required', 'regex:/^9[0-9]{9}$/']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $phone = $request->phone;

        $code = random_int(100000, 999999);

        VerificationCode::create([
            'phone' => $phone,
            'code' => $code,
            'expires_at' => Carbon::now()->addMinutes(5),
            'used' => false,
        ]);
        // فضا برای ارسال کد به مشتری

        return view('Auth/login-sms-code', compact(['phone', 'code']));
    }

    public function verifyCode(Request $request)
    {
        
        $request->validate([
            'phone' => ['required', 'digits:10'],
            'code' => ['required', 'digits:6']
        ]);
        $verification = VerificationCode::where('phone', $request->phone)
            ->where('code', $request->code)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->first();
        
        if (! $verification) {
            return back()->withErrors(['code' => 'کد وارد شده اشتباه یا منقضی شده است']);
        }

        $verification->update([
            'used' => true
        ]);
        
        $user = User::firstOrCreate(
            ['phone' => $request->phone],
            ['userName' => 'کاربر' . substr($request->phone, -4)]
        );

        Auth::login($user);

        return redirect()->route('dashboard');
    }
    public function resendCode() {}
}
