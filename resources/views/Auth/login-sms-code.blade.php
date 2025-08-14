<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تایید شماره همراه | یونیک اسکارف</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/Admin/login-sms-code.css') }}">
</head>

<body>
    <form action="{{ route('verify.code') }}" method="POST" class="verify-form" id="verifyForm">
        @csrf
        <div>{{ $code }}</div>
        <div class="verify-header">
            <h1>تایید شماره همراه</h1>
            <p>کد تایید به شماره {{ substr($phone, 0, 4) . '***' . substr($phone, -4) }} ارسال شد</p>
        </div>

        <div class="code-input-container">
            <input type="hidden" name="phone" value="{{ $phone }}">
            <input type="text" id="verificationCode" name="code" class="code-input @error('code') is-invalid @enderror"
                placeholder="_ _ _ _ _ _" maxlength="6"
                pattern="[0-9]{6}" inputmode="numeric" required>
            @error('code')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-verify">
            <i class="bi bi-check2" style="margin-left: 8px;"></i>
            تایید و ورود
        </button>

        <div class="countdown" id="countdown">زمان باقیمانده: 2:00</div>
    </form>
    <form action="{{ route('resend.code') }}" method="POST" id="resendForm" style="display: none;">
        @csrf
        <input type="hidden" name="phone" value="{{ $phone }}">
        <button type="submit" class="resend-link">ارسال مجدد کد</button>
    </form>

    <script src="{{ asset('assets/js/Auth/login-sms-code.js') }}"></script>
</body>

</html>