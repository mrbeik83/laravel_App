@extends('layout.master')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- نمایش پیام موفقیت -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <!-- بقیه کدهای فرم لاگین -->
                <div class="container py-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-white border-0">
                                        <h3 class="text-center mb-0" style="color: #3a4a6d;">ورود به حساب کاربری</h3>
                                    </div>

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="userName" class="form-label">یوزر نیم</label>
                                                <input id="userName" type="userName" class="form-control @error('userName') is-invalid @enderror" 
                                                    name="userName" value="{{ old('userName') }}" required autocomplete="userName" autofocus>
                                                @error('userName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            

                                            <div class="mb-3">
                                                <label for="email" class="form-label">آدرس ایمیل</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">رمز عبور</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                                    name="password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    مرا به خاطر بسپار
                                                </label>
                                            </div>

                                            <div class="a-grid gap-2">
                                                <button type="submit" class="btn btn-login" style="border-color: #3a4a6d; color: #3a4a6d;">
                                                    <i class="bi bi-box-arrow-in-right"></i> ورود
                                                </button>
                                                <a href="{{ route('google.login') }}" class="btn btn-google" style="border-color: #3a4a6d; color: red;">
                                                    <i class="bi bi-box-arrow-in-right"></i> ورود با گوگل
                                                </a>

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link mt-2" href="{{ route('password.request') }}" style="color: #3a4a6d;">
                                                        رمز عبور خود را فراموش کرده‌اید؟
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="text-center mt-3">
                                                <p>صفحه ی ثبت نام <a href="{{ route('register') }}" style="color: #3a4a6d; font-weight: 600;">وارد شوید</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ...
            </div>
        </div>
    </div>
</div>
                    
@endsection