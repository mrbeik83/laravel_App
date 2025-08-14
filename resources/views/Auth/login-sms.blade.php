<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ورود با شماره همراه | یونیک اسکارف</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/Admin/login-sms.css') }}">
</head>

<body>

  <form action="{{ route('send.code') }}" method="POST" class="login-form" id="loginForm">
    @csrf
    <div class="login-header">
      <h1>ورود با شماره همراه</h1>
      <p>کد تایید به شماره شما ارسال خواهد شد</p>
    </div>

    <div class="form-group">
      <label for="phone" class="form-label">شماره همراه</label>
      <div class="phone-input-container">
        <span class="phone-prefix">+98</span>
        <input type="tel" id="phone" name="phone"
          class="form-control phone-input @error('phone') is-invalid @enderror"
          placeholder="912 345 6789"
          required pattern="[0-9]{10}" maxlength="10"
          value="{{ old('phone') }}">
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <button type="submit" class="btn-submit">
      <i class="bi bi-send" style="margin-left: 8px;"></i>
      ارسال کد تایید
    </button>
  </form>

  <script src="{{ asset('assets/js/Auth/login-sms.js') }}"></script>
</body>

</html>