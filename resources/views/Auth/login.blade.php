<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ورود | یونیک اسکارف</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/Auth/login.css') }}">
  <style>
   
  </style>
</head>
<body>
  <!--  بارگذاری -->
  <div id="preloader">
    <div class="loader"></div>
    <div class="loading-text">در حال بارگذاری...</div>
  </div>

  <!-- محتوای اصلی -->
  <div class="login-container">
    <form class="login-form" id="loginForm">
      <div class="login-header">
        <h1>خوش آمدید</h1>
        <p>لطفا اطلاعات حساب خود را وارد کنید</p>
      </div>
      
      <div class="form-group">
        <label for="email" class="form-label">ایمیل</label>
        <input type="email" id="email" class="form-control" placeholder="example@gmail.com" required>
      </div>
      
      <div class="form-group">
        <label for="password" class="form-label">رمز عبور</label>
        <div style="position: relative;">
          <input type="password" id="password" class="form-control" placeholder="••••••••" required>
          <i class="bi bi-eye password-toggle" id="togglePassword" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: var(--gold-dark);"></i>
        </div>
      </div>
      
      <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
        <div style="display: flex; align-items: center;">
          <input type="checkbox" id="remember" style="margin-left: 8px;">
          <label for="remember" style="font-size: 0.9rem; color: var(--text-light); cursor: pointer;">مرا به خاطر بسپار</label>
        </div>
        <a href="../forget/forget.html" class="text-decoration-none" style="font-size: 0.9rem;">رمز عبور خود را فراموش کرده اید؟</a>
      </div>
      
      <button type="submit" class="btn-submit">
        <i class="bi bi-box-arrow-in-right" style="margin-left: 8px;"></i>
        ورود به حساب
      </button>
      
      <div class="divider">یا</div>
      
      <button type="button" class="btn-google">
        <span>ورود با Google</span>
      </button>
      
      <div class="login-links">
        <span style="color: var(--text-dark);">حساب کاربری ندارید؟</span>
        <a href="../sign up/sign up.html" style="color:#3D2B1F;">ثبت نام کنید</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/Auth/login.js') }}"></script>
    
</body>
</html>