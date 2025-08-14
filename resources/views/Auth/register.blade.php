<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ثبت نام | یونیک اسکارف</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/Auth/register.css') }}">
</head>

<body>
  <!--  بارگذاری -->
  <div id="preloader">
    <div class="loader"></div>
    <div class="loading-text">در حال بارگذاری...</div>
  </div>

  <!-- محتوای اصلی -->
  <div class="register-container">
    <form action="{{ route('register.submit') }}" method="post" class="register-form" id="registerForm">
      @csrf
      <div class="register-header">
        <h1>ثبت نام جدید</h1>
        <p>لطفا اطلاعات خود را برای ایجاد حساب وارد کنید</p>
      </div>

      <div class="form-group">
        <label for="fullname" class="form-label">نام کاربری</label>
        <input type="text" id="fullname" name="userName" class="form-control" placeholder="نام و نام خانوادگی" required>
      </div>

      <div class="form-group">
        <label for="email" class="form-label"> ایمیل </label>
        <input type="email" id="email" name="email" class="form-control" placeholder=" (اختیاری) example@gmail.com">
      </div>

      <div class="form-group">
        <label for="phone" class="form-label">شماره موبایل</label>
        <input type="tel" id="phone" name="phone" class="form-control" placeholder="09xxxxxxxxx" required>
      </div>

      <div class="form-group">
        <label for="password" class="form-label">رمز عبور</label>
        <div class="password-container">
          <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
          <i class="bi bi-eye password-toggle" id="togglePassword"></i>
        </div>
        <div class="password-strength">
          <div class="password-strength-bar" id="passwordStrength"></div>
        </div>
      </div>

      <div class="form-group">
        <label for="confirmPassword" class="form-label">تکرار رمز عبور</label>
        <input type="password" id="confirmPassword" name="password_confirmation" class="form-control" placeholder="••••••••" required>
      </div>

      <div class="terms-check">
        <input type="checkbox" id="agreeTerms" required>
        <label for="agreeTerms">با <a href="#" class="terms-link">شرایط و قوانین</a> موافقم</label>
      </div>

      <button type="submit" class="btn-submit">
        <i class="bi bi-person-plus register-icon"></i>
        ایجاد حساب کاربری
      </button>

      <div class="divider">
        <span class="divider-line"></span>
        <span class="divider-text">یا</span>
        <span class="divider-line"></span>
      </div>

      <button type="button" class="btn-google">
        <span class="google-text">ثبت نام با Google</span>
      </button>

      <div class="login-link">
        <span class="login-text">قبلاً ثبت‌نام کرده‌اید؟</span>
        <a href="../Login/login.html" class="login-btn">ورود به حساب</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/Auth/register.js') }}"></script>
</body>

</html>