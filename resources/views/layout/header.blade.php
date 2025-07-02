<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شال و روسری یونیک</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        *{
            font-size: 0.800rem;
        }
        .header-container {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .brand-name {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 700;
            color: #3a4a6d;
            font-size: 1.8rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .brand-name:hover {
            color: #2c3e50;
            transform: scale(1.02);
        }
        .auth-links .btn {
            font-weight: 600;
            margin-left: 10px;
            padding: 8px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .btn-login {
            background-color: #fff;
            color: #3a4a6d;
            border: 2px solid #3a4a6d;
        }
        .btn-login:hover {
            background-color: #3a4a6d;
            color: #fff;
        }
        .btn-signup {
            background-color: #3a4a6d;
            color: #fff;
        }
        .btn-signup:hover {
            background-color: #2c3e50;
            transform: translateY(-2px);
        }
        .btn-profile {
            background-color: #4a6da7;
            color: white;
        }
        .btn-profile:hover {
            background-color: #3a5a8f;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            min-width: 10rem;
        }
        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #3a4a6d;
        }
    </style>
</head>
<body>
<header class="header-container py-2" style="font-size: 0.875rem;">
    <div class="container">
        <div class="row align-items-center">

            <!-- نام فروشگاه در سمت راست -->
            <div class="col-md-4 text-end">
                <a href="{{ route('dashboard') }}" class="brand-name text-decoration-none text-dark">
                    <i class="bi bi-scarf"></i> شال و روسری یونیک
                </a>
            </div>

            <!-- سبد خرید در وسط -->
            @auth
                  <div class="col-md-4 text-center">
                      <a href="{{ route('cart.index') }}" class="text-dark text-decoration-none">
                          <i class="bi bi-cart4 fs-5"></i>
                          <span class="ms-1">سبد خرید</span>
                      </a>
                      <a href=# class="text-dark text-decoration-none">
                          <i class="bi bi-list fs-5"></i>
                          <span class="ms-1">لیست کالا ها</span>
                      </a>
                  </div>
            @endauth
            <!-- اطلاعات کاربر در سمت چپ -->
            <div class="col-md-4 text-start auth-links">
                @auth
                    <div class="d-flex align-items-center justify-content-start gap-2">
                        <!-- آیکن و نام کاربر -->
                        <div class="user-info d-flex align-items-center gap-1">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span>{{ Auth::user()->userName }}</span>
                        </div>

                        <!-- دکمه خروج -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-box-arrow-left"></i> خروج
                            </button>
                        </form>
                    </div>
                @else
                    <!-- اگر لاگین نکرده -->
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary me-2">
                        <i class="bi bi-box-arrow-in-right"></i> ورود
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-sm btn-outline-success">
                        <i class="bi bi-person-plus"></i> ثبت‌نام
                    </a>
                @endauth
            </div>

        </div>
    </div>
</header>


    <!-- محتوای صفحه -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


