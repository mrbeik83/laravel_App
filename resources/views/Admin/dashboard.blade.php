<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت | یونیک اسکارف</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/adminForm.css') }}">

</head>

<body>
    <header>
        <!-- دکمه منوی موبایل -->
        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>

        <!-- پنل سمت راست -->
        <div class="admin-sidebar" id="adminSidebar">
            <div class="admin-brand">
                <h2><i class="fas fa-scarf"></i> یونیک اسکارف</h2>
            </div>

            <ul class="admin-menu">
                <li class="active"><a href="#" data-target="dashboard"><i class="fas fa-chart-pie"></i> داشبورد</a></li>
                <li><a href="#" data-target="customers"><i class="fas fa-users"></i> مشتریان</a></li>
                <li><a href="#" data-target="account"><i class="fas fa-user-cog"></i> حساب کاربری</a></li>
            </ul>

            <div class="admin-user">
                <div class="admin-user-info">
                    <div class="admin-user-avatar">ر</div>
                    <div>
                        <h4 class="admin-user-name">{{ Auth::user()->userName }}</h4>
                        <p class="admin-user-role">ادمین فروشگاه</p>
                    </div>
                </div>
                <a class="text-decoration-none" href="{{ route('logout') }}">
                    <button class="logout-btn" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i> خروج از حساب
                    </button>
                </a>
            </div>
        </div>

    </header>
    <!-- محتوای اصلی -->
    <div class="admin-main">
        <!-- بخش داشبورد -->
        <div class="dashboard-section" id="dashboard">
            <div class="admin-header">
                <h1 class="admin-title"><i class="fas fa-chart-pie"></i> داشبورد مدیریت</h1>

                <div class="d-flex gap-2">
                    <button class="gold-btn" id="showFormBtn">
                        <i class="fas fa-plus"></i> محصول جدید
                    </button>
                </div>
            </div>

            <!-- آمار کلی -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-scarf"></i>
                    </div>
                    <div class="stat-value">{{ $productCount }}</div>
                    <div class="stat-label">تعداد محصولات</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-value">۱۸</div>
                    <div class="stat-label">سفارشات امروز</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-value">{{ $customerCount }}</div>
                    <div class="stat-label">مشتریان </div>
                </div>

            </div>

            <!-- تب‌های دسته‌بندی -->
            <ul class="nav nav-tabs" id="categoryTabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">همه محصولات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">مقنعه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">شال</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">روسری</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">مینی اسکارف</a>
                </li>
            </ul>

            <!-- کارت محصولات -->
            <div class="admin-card">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-list"></i> لیست محصولات</h3>

                </div>

                <div class="table-responsive">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>نام محصول</th>
                                <th>دسته‌بندی</th>
                                <th>کد محصول</th>
                                <th>قیمت</th>
                                <th>موجودی</th>
                                <th>رنگ‌ها</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->isEmpty())
                            <div class="alert alert-info">هنوز هیچ محصولی ثبت نشده است.</div>
                            @else
                            @foreach ($products as $product )
                            <tr>
                                <td><img src={{ asset('storage/' . $product['picture']) }} width="50" class="rounded"></td>
                                <td>{{ $product['name'] }}</td>
                                <td><span class="badge bg-warning text-dark">{{ $product['type'] }}</span></td>
                                <td>{{ $product['product_code'] }} </td>
                                <td>{{ $product['price'] }} تومان</td>
                                <td>{{ $product['number'] }}</td>
                                <td>
                                    <div class="product_colors">
                                        @foreach ($product->colors as $color)
                                        <div class="product-color" style="background-color: {{ $color }}" title="{{ $color }}"></div>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('product.edit', $product['id']) }}">
                                            <button class="gold-btn" style="padding: 4px 8px; font-size: 0.8rem;">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('product.destroy',$product['id']) }}">
                                            <button class="btn btn-sm" style="background: rgba(220, 53, 69, 0.1); color: #DC3545; padding: 4px 8px; font-size: 0.8rem;">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- صفحه‌بندی -->
                <section aria-label="Page navigation" class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبلی</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">۱</a></li>
                        <li class="page-item"><a class="page-link" href="#">۲</a></li>
                        <li class="page-item"><a class="page-link" href="#">۳</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">بعدی</a>
                        </li>
                    </ul>
                </section>
            </div>

            <!-- فرم افزودن محصول -->
            <form action="{{ route('product.create') }}" class="admin-card" id="productForm" name="productForm" style="display: none;" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title" name="card-title" id="card-title"><i class="fas fa-plus-circle"></i> افزودن محصول جدید</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">تصویر محصول</label>
                            <div class="image-upload" id="uploadContainer" name="uploadContainer">
                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <p style="font-size: 0.8rem;">برای آپلود تصویر کلیک کنید یا فایل را اینجا رها کنید</p>
                                <input type="file" id="productImage" name="picture" style="display: none;" accept="image/*">
                                <img id="imagePreview" class="image-preview">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">نام محصول</label>
                            <input type="text" class="form-control" id="productName" name="name" placeholder="مثال: شال حریر طرح دار">
                        </div>

                        <div class="form-group ">
                            <label class="form-label">دسته‌بندی</label>
                            <select class="form-control" id="productCategory" name="type">
                                <option value="">انتخاب کنید</option>
                                <option value="مقنعه">مقنعه</option>
                                <option value="شال">شال</option>
                                <option value="روسری">روسری</option>
                                <option value="مینی اسکارف">مینی اسکارف</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">کد محصول</label>
                            <input type="text" class="form-control" id="productCode" name="product_code" placeholder="مثال: SH-2024">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">قیمت (تومان)</label>
                            <input type="number" class="form-control" id="productPrice" name="price" placeholder="مثال: 290000">
                        </div>

                        <div class="form-group">
                            <label class="form-label">تعداد موجودی</label>
                            <input type="number" class="form-control" id="productStock" name="number" placeholder="مثال: 15">
                        </div>

                        <div class="form-group">
                            <label class="form-label">سایز</label>
                            <input type="text" class="form-control" id="productSize" name="size" placeholder="مثال: 60*60 سانتی‌متر">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">رنگ‌های موجود</label>
                            <div class="color-options-container d-flex flex-wrap gap-2 mb-2">
                                <!-- رنگ‌های اضافه شده اینجا نمایش داده می‌شوند -->
                            </div>
                            <div class="input-group">
                                <input type="color" class="form-control form-control-color" id="colorPicker" name="colorPicker" value="#000000">
                                <button type="button" class="btn btn-gold" id="addColorBtn" name="addColorBtn">افزودن رنگ</button>
                            </div>
                            <input type="hidden" name="colors" id="availableColorsInput">
                        </div>

                        <div class="form-group">
                            <label class="form-label">وضعیت</label>
                            <select class="form-control" id="productStatus" name="status">
                                <option value="موجود">موجود</option>
                                <option value="ناموجود">ناموجود</option>
                                <option value="به زودی">به زودی</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">توضیحات محصول</label>
                            <textarea class="form-control" id="productDescription" name="description" rows="3" placeholder="توضیحات کامل درباره محصول..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <button type="button" class="outline-btn" id="cancelFormBtn" name="cancelFormBtn">
                        <i class="fas fa-times"></i> انصراف
                    </button>
                    <button type="submit" class="gold-btn" id="gold-btn" name="gold-btn">
                        <i class="fas fa-save"></i> ذخیره محصول
                    </button>
                </div>
            </form>

            <!-- بخش مشتریان -->
            <div class="customer-card" id="customers" style="display:none;">
                <div class="admin-header">
                    <h1 class="admin-title"><i class="fas fa-users"></i> مدیریت مشتریان</h1>


                </div>

                <!-- آمار مشتریان -->
                <div class="stats-container">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-value">۱,۲۴۵</div>
                        <div class="stat-label">تعداد مشتریان</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="stat-value">۴۲</div>
                        <div class="stat-label">مشتریان جدید امروز</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-value">۷۸%</div>
                        <div class="stat-label">مشتریان خریدار</div>
                    </div>
                </div>



                <!-- لیست مشتریان -->
                <div class="admin-card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> لیست مشتریان</h3>
                        <div class="form-group" style="margin-bottom: 0; min-width: 200px;">
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام مشتری</th>
                                    <th>ایمیل</th>
                                    <th>شهر</th>
                                    <th>تعداد سفارشات</th>
                                    <th>وضعیت</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>زهرا محمدی</td>
                                    <td>z.mohammadi@gmail.com</td>
                                    <td>مشهد</td>
                                    <td>۵</td>
                                    <td><span class="badge badge-success">فعال</span></td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>نازنین رضایی</td>
                                    <td>n.rezaei@gmail.com</td>
                                    <td>تهران</td>
                                    <td>۲</td>
                                    <td><span class="badge badge-success">فعال</span></td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>فاطمه حسینی</td>
                                    <td>f.hosseini@gmail.com</td>
                                    <td>اصفهان</td>
                                    <td>۰</td>
                                    <td><span class="badge badge-warning">جدید</span></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- صفحه‌بندی -->
                    <section aria-label="Page navigation" class="mt-3">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">قبلی</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">۱</a></li>
                            <li class="page-item"><a class="page-link" href="#">۲</a></li>
                            <li class="page-item"><a class="page-link" href="#">۳</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">بعدی</a>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>

            <!-- بخش حساب کاربری -->
            <div class="account-section" id="account" style="display:none;">
                <div class="admin-header">
                    <h1 class="admin-title"><i class="fas fa-user-cog"></i> تنظیمات حساب کاربری</h1>
                </div>

                <div class="admin-card">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <div class="image-upload" style="width: 150px; height: 150px; margin: 0 auto 20px; border-radius: 50%; padding: 20px;">
                                    <img src="images/avatar.jpg" id="userAvatar" class="rounded-circle" width="110" style="display: block;">
                                    <input type="file" id="avatarUpload" style="display: none;" accept="image/*">
                                </div>
                                <a href="#"><button class="gold-btn mb-4">
                                        <i class="fas fa-camera"></i> تغییر تصویر
                                    </button></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">نام کاربری</label>
                                            <input type="text" class="form-control" value="روشا رحمانی">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">ایمیل</label>
                                            <input type="email" class="form-control" value="r.rahmani@example.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">شماره تماس</label>
                                            <input type="tel" class="form-control" value="09123456789">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">نقش</label>
                                            <input type="text" class="form-control" value="ادمین فروشگاه" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">رمز عبور جدید</label>
                                            <input type="password" class="form-control" placeholder="در صورت تمایل به تغییر رمز عبور">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <a href="#"><button type="submit" class="gold-btn">
                                                <i class="fas fa-save"></i> ذخیره تغییرات
                                            </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // ==================== مدیریت رنگ‌های محصول ====================
                const colorPicker = document.getElementById('colorPicker');
                const addColorBtn = document.getElementById('addColorBtn');
                const colorOptionsContainer = document.querySelector('.color-options-container');
                const availableColorsInput = document.getElementById('availableColorsInput');
                let selectedColors = [];

                // افزودن رنگ جدید
                addColorBtn.addEventListener('click', function() {
                    const color = colorPicker.value;

                    if (!selectedColors.includes(color)) {
                        selectedColors.push(color);
                        updateColorOptions();
                    } else {
                        alert('این رنگ قبلا اضافه شده است!');
                    }
                });

                // حذف رنگ
                colorOptionsContainer.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-color')) {
                        const colorToRemove = e.target.dataset.color;
                        selectedColors = selectedColors.filter(c => c !== colorToRemove);
                        updateColorOptions();
                    }
                });

                // به‌روزرسانی نمایش رنگ‌ها و فیلد مخفی
                function updateColorOptions() {
                    colorOptionsContainer.innerHTML = '';
                    selectedColors.forEach(color => {
                        const colorElement = document.createElement('div');
                        colorElement.className = 'color-option-admin d-flex align-items-center';
                        colorElement.innerHTML = `
                <div class="color-preview me-2" style="background-color: ${color}; width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                <span class="color-value small me-2">${color}</span>
                <button type="button" class="btn btn-sm btn-danger remove-color" data-color="${color}">
                    <i class="fas fa-times"></i>
                </button>
            `;
                        colorOptionsContainer.appendChild(colorElement);
                    });

                    // ذخیره رنگ‌ها در فیلد مخفی به صورت JSON
                    availableColorsInput.value = JSON.stringify(selectedColors);
                }

                // بارگذاری رنگ‌های موجود در صورت ویرایش محصول
                if (availableColorsInput.value) {
                    try {
                        selectedColors = JSON.parse(availableColorsInput.value);
                        updateColorOptions();
                    } catch (e) {
                        console.error('Error parsing colors:', e);
                    }
                }

                // ==================== منوی مدیریت ====================
                const mobileMenuBtn = document.getElementById('mobileMenuBtn');
                const adminSidebar = document.getElementById('adminSidebar');

                mobileMenuBtn.addEventListener('click', function() {
                    adminSidebar.classList.toggle('active');
                    document.body.classList.toggle('menu-open');
                });

                // تغییر بین بخش‌های مختلف
                const menuItems = document.querySelectorAll('.admin-menu li a');
                const sections = document.querySelectorAll('.admin-main > div');

                menuItems.forEach(item => {
                    item.addEventListener('click', function(e) {
                        e.preventDefault();

                        // حذف کلاس active از همه آیتم‌های منو
                        menuItems.forEach(menuItem => {
                            menuItem.parentElement.classList.remove('active');
                        });

                        // اضافه کردن کلاس active به آیتم انتخاب شده
                        this.parentElement.classList.add('active');

                        // پنهان کردن همه بخش‌ها
                        sections.forEach(section => {
                            section.style.display = 'none';
                        });

                        // نمایش بخش مربوطه
                        const target = this.getAttribute('data-target');
                        document.getElementById(target).style.display = 'block';
                    });
                });

                // ==================== مدیریت فرم محصول ====================
                const showFormBtn = document.getElementById('showFormBtn');
                const cancelFormBtn = document.getElementById('cancelFormBtn');
                const productForm = document.getElementById('productForm');

                if (showFormBtn && productForm) {
                    showFormBtn.addEventListener('click', function() {
                        productForm.style.display = 'block';
                        productForm.scrollIntoView({
                            behavior: 'smooth'
                        });
                    });

                    cancelFormBtn.addEventListener('click', function() {
                        productForm.style.display = 'none';
                        resetForm();
                    });
                }

                // آپلود تصویر محصول
                const uploadContainer = document.getElementById('uploadContainer');
                const fileInput = document.getElementById('productImage');
                const imagePreview = document.getElementById('imagePreview');

                if (uploadContainer && fileInput && imagePreview) {
                    uploadContainer.addEventListener('click', () => fileInput.click());

                    fileInput.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            if (!file.type.match('image.*')) {
                                alert('لطفاً یک فایل تصویری انتخاب کنید');
                                return;
                            }

                            const reader = new FileReader();
                            reader.onload = function(e) {
                                imagePreview.src = e.target.result;
                                imagePreview.style.display = 'block';
                                uploadContainer.style.padding = '10px';
                                uploadContainer.querySelector('p').style.display = 'none';
                                uploadContainer.querySelector('.upload-icon').style.display = 'none';
                            }
                            reader.readAsDataURL(file);
                        }
                    });

                    // Drag and Drop برای آپلود
                    uploadContainer.addEventListener('dragover', (e) => {
                        e.preventDefault();
                        uploadContainer.style.borderColor = 'var(--gold-color)';
                        uploadContainer.style.background = 'rgba(210, 180, 140, 0.1)';
                    });

                    uploadContainer.addEventListener('dragleave', () => {
                        uploadContainer.style.borderColor = 'rgba(92, 58, 33, 0.3)';
                        uploadContainer.style.background = 'transparent';
                    });

                    uploadContainer.addEventListener('drop', (e) => {
                        e.preventDefault();
                        uploadContainer.style.borderColor = 'rgba(92, 58, 33, 0.3)';
                        uploadContainer.style.background = 'transparent';

                        const file = e.dataTransfer.files[0];
                        if (file && file.type.match('image.*')) {
                            fileInput.files = e.dataTransfer.files;
                            const event = new Event('change');
                            fileInput.dispatchEvent(event);
                        } else {
                            alert('لطفاً یک فایل تصویری انتخاب کنید');
                        }
                    });
                }

                // دکمه خروج
                const logoutBtn = document.getElementById('logoutBtn');
                if (logoutBtn) {
                    logoutBtn.addEventListener('click', function() {
                        if (confirm('آیا از خروج از حساب کاربری مطمئن هستید؟')) {
                            alert('شما با موفقیت از حساب کاربری خارج شدید.');
                            // window.location.href = 'login.html';
                        }
                    });
                }

                // ریست کردن فرم
                function resetForm() {
                    if (document.getElementById('productName')) {
                        document.getElementById('productName').value = '';
                        document.getElementById('productCategory').value = '';
                        document.getElementById('productCode').value = '';
                        document.getElementById('productPrice').value = '';
                        document.getElementById('productStock').value = '';
                        document.getElementById('productSize').value = '';
                        document.getElementById('productStatus').value = 'موجود';
                        document.getElementById('productDescription').value = '';

                        // ریست کردن رنگ‌ها
                        selectedColors = [];
                        updateColorOptions();

                        if (imagePreview) {
                            imagePreview.src = '';
                            imagePreview.style.display = 'none';
                        }

                        if (uploadContainer) {
                            uploadContainer.style.padding = '20px';
                            uploadContainer.querySelector('p').style.display = 'block';
                            uploadContainer.querySelector('.upload-icon').style.display = 'block';
                        }

                        if (fileInput) {
                            fileInput.value = '';
                        }

                        // بازگرداندن دکمه به حالت اولیه
                        const submitBtn = document.querySelector('#productForm button[type="submit"]');
                        if (submitBtn) {
                            submitBtn.innerHTML = '<i class="fas fa-save"></i> ذخیره محصول';
                            submitBtn.onclick = function(e) {
                                e.preventDefault();
                                addNewProduct();
                            };
                        }
                    }
                }

                // // ذخیره محصول جدید
                // const saveProductBtn = document.querySelector('#productForm button[type="submit"]');
                // if (saveProductBtn) {
                //     saveProductBtn.addEventListener('click', function (e) {
                //         e.preventDefault();
                //         addNewProduct();
                //     });
                // }

                // اضافه کردن محصول جدید به جدول
                function addNewProduct() {
                    const name = document.getElementById('productName').value;
                    const category = document.getElementById('productCategory').value;
                    const code = document.getElementById('productCode').value;
                    const price = document.getElementById('productPrice').value;
                    const stock = document.getElementById('productStock').value;
                    const status = document.getElementById('productStatus').value;
                    const imageSrc = imagePreview ? imagePreview.src : './images/default-product.webp';
                    const colors = JSON.parse(availableColorsInput.value || '[]');

                    if (!name || !category || !code || !price || !stock) {
                        alert('لطفا تمام فیلدهای ضروری را پر کنید');
                        return;
                    }

                    const tbody = document.querySelector('.admin-table tbody');
                    const newRow = document.createElement('tr');

                    // تعیین رنگ badge بر اساس دسته‌بندی
                    let badgeClass = getBadgeClass(category);

                    // ایجاد HTML برای نمایش رنگ‌ها
                    let colorsHTML = '<div class="product-colors">';
                    if (colors.length > 0) {
                        colors.forEach(color => {
                            colorsHTML += `<div class="product-color" style="background-color: ${color}" title="${color}"></div>`;
                        });
                    } else {
                        colorsHTML += '<span class="text-muted small">بدون رنگ</span>';
                    }
                    colorsHTML += '</div>';

                    newRow.innerHTML = `
            <td><img src="${imageSrc}" width="40" class="rounded"></td>
            <td>${name}</td>
            <td><span class="badge ${badgeClass}">${category}</span></td>
            <td>${code}</td>
            <td>${Number(price).toLocaleString('fa-IR')} تومان</td>
            <td>${stock} عدد</td>
            <td>${colorsHTML}</td>
            <td>
                <div class="d-flex gap-2">
                    <button class="gold-btn edit-btn" style="padding: 4px 8px; font-size: 0.8rem;">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-sm delete-btn" style="background: rgba(220, 53, 69, 0.1); color: #DC3545;">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        `;

                    tbody.insertBefore(newRow, tbody.firstChild);

                    // اضافه کردن event listener برای دکمه‌های جدید
                    newRow.querySelector('.edit-btn').addEventListener('click', function() {
                        editProduct(newRow);
                    });

                    newRow.querySelector('.delete-btn').addEventListener('click', function() {
                        deleteProduct(newRow);
                    });

                    // پنهان کردن فرم و ریست کردن آن
                    if (productForm) {
                        productForm.style.display = 'none';
                    }
                    resetForm();

                    // نمایش پیام موفقیت
                    alert('محصول با موفقیت اضافه شد.');

                    // فیلتر کردن خودکار بر اساس دسته‌بندی محصول جدید
                    filterProducts(category);
                }

                // ویرایش محصول
                function editProduct(row) {
                    const cells = row.cells;
                    document.getElementById('productName').value = cells[1].textContent;
                    document.getElementById('productCategory').value = cells[2].textContent.trim();
                    document.getElementById('productCode').value = cells[3].textContent;
                    document.getElementById('productPrice').value = cells[4].textContent.replace(/[^0-9]/g, '');
                    document.getElementById('productStock').value = cells[5].textContent.replace(/[^0-9]/g, '');

                    // بارگذاری رنگ‌های موجود
                    const colorElements = row.cells[6].querySelectorAll('.product-color');
                    selectedColors = Array.from(colorElements).map(el => el.style.backgroundColor);
                    updateColorOptions();

                    // نمایش فرم
                    document.getElementById('productForm').style.display = 'block';
                    document.querySelector('#productForm .card-title').innerHTML = '<i class="fas fa-edit"></i> ویرایش محصول';

                    // تغییر رفتار دکمه ذخیره به ویرایش
                    const submitBtn = document.querySelector('#productForm button[type="submit"]');
                    submitBtn.innerHTML = '<i class="fas fa-save"></i> ذخیره تغییرات';
                    submitBtn.onclick = function(e) {
                        e.preventDefault();
                        saveEditedProduct(row);
                    };

                    // اسکرول به فرم
                    productForm.scrollIntoView({
                        behavior: 'smooth'
                    });
                }

                // ذخیره تغییرات محصول ویرایش شده
                function saveEditedProduct(row) {
                    const cells = row.cells;
                    const oldCategory = cells[2].textContent.trim();
                    const newCategory = document.getElementById('productCategory').value;

                    cells[1].textContent = document.getElementById('productName').value;
                    cells[2].innerHTML = `<span class="badge ${getBadgeClass(newCategory)}">${newCategory}</span>`;
                    cells[3].textContent = document.getElementById('productCode').value;
                    cells[4].textContent = `${Number(document.getElementById('productPrice').value).toLocaleString('fa-IR')} تومان`;
                    cells[5].textContent = `${document.getElementById('productStock').value} عدد`;

                    // به‌روزرسانی رنگ‌ها
                    let colorsHTML = '<div class="product-colors">';
                    if (selectedColors.length > 0) {
                        selectedColors.forEach(color => {
                            colorsHTML += `<div class="product-color" style="background-color: ${color}" title="${color}"></div>`;
                        });
                    } else {
                        colorsHTML += '<span class="text-muted small">بدون رنگ</span>';
                    }
                    colorsHTML += '</div>';
                    cells[6].innerHTML = colorsHTML;

                    if (imagePreview && imagePreview.style.display !== 'none') {
                        cells[0].innerHTML = `<img src="${imagePreview.src}" width="40" class="rounded">`;
                    }

                    // پنهان کردن فرم و ریست کردن آن
                    document.getElementById('productForm').style.display = 'none';
                    resetForm();

                    // اگر دسته‌بندی تغییر کرده باشد، فیلتر را اعمال کن
                    if (oldCategory !== newCategory) {
                        const activeTab = document.querySelector('.nav-tabs .nav-link.active').textContent.trim();
                        if (activeTab !== 'همه محصولات') {
                            filterProducts(activeTab);
                        }
                    }
                }

                // حذف محصول
                function deleteProduct(row) {
                    if (confirm('آیا از حذف این محصول مطمئن هستید؟')) {
                        row.remove();
                    }
                }

                // تعیین کلاس badge بر اساس نوع محصول
                function getBadgeClass(type) {
                    if (type === 'مقنعه') return 'badge-primary';
                    if (type === 'شال') return 'badge-warning';
                    if (type === 'روسری') return 'badge-success';
                    if (type === 'مینی اسکارف') return 'badge-info';
                    return 'badge-secondary';
                }

                // تغییر تب‌های دسته‌بندی و فیلتر محصولات
                const navLinks = document.querySelectorAll('.nav-tabs .nav-link');
                navLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        navLinks.forEach(l => l.classList.remove('active'));
                        this.classList.add('active');

                        const category = this.textContent.trim();
                        filterProducts(category);
                    });
                });

                // فیلتر کردن محصولات بر اساس دسته‌بندی
                function filterProducts(category) {
                    const rows = document.querySelectorAll('.admin-table tbody tr');

                    rows.forEach(row => {
                        const rowCategory = row.querySelector('td:nth-child(3)').textContent.trim();

                        if (category === 'همه محصولات' || rowCategory === category) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }

                // آپلود تصویر پروفایل
                const avatarUpload = document.getElementById('avatarUpload');
                const userAvatar = document.getElementById('userAvatar');

                if (avatarUpload && userAvatar) {
                    document.querySelector('.account-section .image-upload').addEventListener('click', () => avatarUpload.click());

                    avatarUpload.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            if (!file.type.match('image.*')) {
                                alert('لطفاً یک فایل تصویری انتخاب کنید');
                                return;
                            }

                            const reader = new FileReader();
                            reader.onload = function(e) {
                                userAvatar.src = e.target.result;
                            }
                            reader.readAsDataURL(file);
                        }
                    });
                }

                // ==================== بخش مشتریان ====================
                function setupCustomerSection() {
                    // مخفی کردن دکمه اضافه کردن مشتری
                    const addCustomerBtn = document.querySelector('#customers .gold-btn');
                    if (addCustomerBtn) addCustomerBtn.style.display = 'none';

                    // مخفی کردن دکمه‌های عملیات
                    document.querySelectorAll('#customers .customer-actions button').forEach(btn => {
                        btn.style.display = 'none';
                    });

                    // فیلتر و جستجوی مشتریان
                    const customerSearch = document.querySelector('#customers input[type="text"]');
                    const cityFilter = document.querySelector('#customers select:nth-of-type(1)');
                    const statusFilter = document.querySelector('#customers select:nth-of-type(2)');
                    const filterBtn = document.querySelector('#customers .gold-btn');

                    if (customerSearch && cityFilter && statusFilter) {
                        // اضافه کردن event listeners
                        customerSearch.addEventListener('input', filterCustomers);
                        cityFilter.addEventListener('change', filterCustomers);
                        statusFilter.addEventListener('change', filterCustomers);
                        if (filterBtn) filterBtn.addEventListener('click', filterCustomers);

                        function filterCustomers() {
                            const searchValue = customerSearch.value.toLowerCase();
                            const cityValue = cityFilter.value;
                            const statusValue = statusFilter.value;

                            document.querySelectorAll('#customers .admin-table tbody tr').forEach(row => {
                                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                                const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                                const city = row.querySelector('td:nth-child(4)').textContent;
                                const status = row.querySelector('td:nth-child(6)').textContent;

                                const matchesSearch = name.includes(searchValue) || email.includes(searchValue);
                                const matchesCity = cityValue === '' || city === cityValue;
                                const matchesStatus = statusValue === '' || status === statusValue;

                                row.style.display = (matchesSearch && matchesCity && matchesStatus) ? '' : 'none';
                            });
                        }
                    }
                }

                // اجرای فیلتر اولیه برای نمایش همه محصولات
                filterProducts('همه محصولات');
                setupCustomerSection();
            });
        </script>
</body>

</html>