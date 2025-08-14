<header>
    <!-- نوار بالایی -->
    <div class="top-bar">
        ارسال سفارشات بالای 1 میلیون تومان رایگان است 🎁
    </div>  
    <!-- نوبار بعد از ورود کاربر -->
    @auth
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
        <div class="container">
            <!-- لوگو (سمت راست) -->
            <a class="navbar-brand ms-auto" href="#">UNIQUE SCARF</a>

            <!-- دکمه موبایل -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- منو -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">خانه</a></li>
                    <!-- منوی کشویی دسته‌بندی‌ها -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="categoriesDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            دسته‌بندی‌ها
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <li><a class="dropdown-item" href="#">روسری</a></li>
                            <li><a class="dropdown-item" href="#">شال</a></li>
                            <li><a class="dropdown-item" href="#">مجلسی</a></li>
                            <li><a class="dropdown-item" href="#">مینی اسکارف</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">همه دسته‌بندی‌ها</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">برندها</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">تماس با ما</a>
                    </li>
                </ul>

                <!-- آیکون‌ها (سمت چپ) -->
                <div class="d-flex icon-btn align-items-center me-0">
                    <div class="search-container position-relative">
                        <!-- آیکون جستجو -->
                        <a href="#" class="search-icon" id="searchTrigger">
                            <i class="fas fa-search"></i>
                        </a>

                        <!-- باکس جستجو -->
                        <div class="search-box" id="searchBox">
                            <form class="search-form">
                                <input
                                    type="text"
                                    placeholder="جستجو..."
                                    class="search-input" />
                                <button type="submit" class="search-submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!--منوی کشویی حساب کاربری  -->
                    <div class="dropdown user-dropdown ms-3">
                        <a
                            href="#"
                            class="dropdown-toggle d-flex align-items-center text-decoration-none"
                            id="userDropdown">
                            <span class="user-name me-2 small">{{ auth()->user()->userName }}</span>
                            <i class="fas fa-user-circle fs-5"></i>
                        </a>
                        <ul
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>پروفایل کاربری</a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="#"><i class="fas fa-box me-2"></i>سفارشات من</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>خروج</a>
                            </li>
                        </ul>
                    </div>

                    <a
                        href="#"
                        title="سبد خرید"
                        class="cart-icon position-relative ms-3">
                        <i class="fas fa-shopping-cart"></i>
                        <span
                            class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            2
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @else
    <!-- نوبار قبل از ورود کاربر-->
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
        <div class="container">
            <!-- لوگو برند -->
            <a class="navbar-brand ms-auto" href="#">UNIQUE SCARF</a>

            <!-- دکمه موبایل -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- منو -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">خانه</a></li>

                    <!-- منوی کشویی دسته‌بندی‌ها -->
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="categoriesDropdown"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            دسته‌بندی‌ها
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <li><a class="dropdown-item" href="#">روسری</a></li>
                            <li><a class="dropdown-item" href="#">شال</a></li>
                            <li><a class="dropdown-item" href="#">مجلسی</a></li>
                            <li><a class="dropdown-item" href="#">مینی اسکارف</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">همه دسته‌بندی‌ها</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">درباره ما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">تماس با ما</a>
                    </li>
                </ul>

                <!-- آیکون‌ها (سمت چپ) -->
                <div class="d-flex icon-btn align-items-center me-0">
                    <div class="search-container position-relative">
                        <!-- آیکون جستجو -->
                        <a href="#" class="search-icon" id="searchTrigger">
                            <i class="fas fa-search"></i>
                        </a>

                        <!-- باکس جستجو -->
                        <div class="search-box" id="searchBox">
                            <form class="search-form">
                                <input
                                    type="text"
                                    placeholder="جستجو..."
                                    class="search-input" />
                                <button type="submit" class="search-submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- منوی کشویی حساب کاربری -->
                    <div class="dropdown user-dropdown">
                        <a
                            href="#"
                            class="dropdown-toggle"
                            title="حساب کاربری"
                            id="userDropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="#">ورود به حساب کاربری</a>
                            </li>
                            <li><a class="dropdown-item" href="#">ثبت نام</a></li>
                        </ul>
                    </div>

                    <a href="#" title="سبد خرید" class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @endauth


</header>