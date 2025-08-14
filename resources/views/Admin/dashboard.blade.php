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
                <li><a href="#" data-target="slider"><i class="fas fa-images"></i> مدیریت اسلایدر</a></li>
                <li><a href="#" data-target="discount"><i class="fas fa-percentage"></i> تخفیف‌ها</a></li>
                <li><a href="#" data-target="account"><i class="fas fa-user-cog"></i> حساب کاربری</a></li>
            </ul>

            <div class="admin-user">
                <div class="admin-user-info">
                    <div class="admin-user-avatar">ر</div>
                    <div>
                        <h4 class="admin-user-name">روشا رحمانی</h4>
                        <p class="admin-user-role">ادمین فروشگاه</p>
                    </div>
                </div>
                <button class="logout-btn" id="logoutBtn">
                    <i class="fas fa-sign-out-alt"></i> خروج از حساب
                </button>
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
                    <div class="stat-value">۴۲</div>
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
                    <div class="stat-value">۱۲۴</div>
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
                                    <div class="d-flex gap-2">
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
            <form action="">
                <div class="admin-card" id="productForm" name="productForm" style="display: none;">
                    <div class="card-header">
                        <h3 class="card-title" name="card-title" id="card-title"><i class="fas fa-plus-circle"></i>
                            افزودن محصول جدید</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">تصویر محصول</label>
                                <div class="image-upload" id="uploadContainer" name="uploadContainer">
                                    <div class="upload-icon">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </div>
                                    <p style="font-size: 0.8rem;">برای آپلود تصویر کلیک کنید یا فایل را اینجا رها کنید
                                    </p>
                                    <input type="file" id="productImage" name="productImage" style="display: none;"
                                        accept="image/*">
                                    <img id="imagePreview" class="image-preview">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">نام محصول</label>
                                <input type="text" class="form-control" id="productName" name="productName"
                                    placeholder="مثال: شال حریر طرح دار">
                            </div>

                            <div class="form-group ">
                                <label class="form-label">دسته‌بندی</label>
                                <select class="form-control" id="productCategory">
                                    <option value="">انتخاب کنید</option>
                                    <option value="مقنعه">مقنعه</option>
                                    <option value="شال">شال</option>
                                    <option value="روسری">روسری</option>
                                    <option value="مینی اسکارف">مینی اسکارف</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">کد محصول</label>
                                <input type="text" class="form-control" id="productCode" name="productCode"
                                    placeholder="مثال: SH-2024">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">قیمت (تومان)</label>
                                <input type="number" class="form-control" id="productPrice" name="productPrice"
                                    placeholder="مثال: 290000">
                            </div>

                            <div class="form-group">
                                <label class="form-label">تعداد موجودی</label>
                                <input type="number" class="form-control" id="productStock" name="productStock"
                                    placeholder="مثال: 15">
                            </div>

                            <div class="form-group">
                                <label class="form-label">سایز</label>
                                <input type="text" class="form-control" id="productSize" name="productSize"
                                    placeholder="مثال: 60*60 سانتی‌متر">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">رنگ‌های موجود</label>
                                <div class="color-options-container d-flex flex-wrap gap-2 mb-2">
                                    <!-- رنگ‌های اضافه شده اینجا نمایش داده می‌شوند -->
                                </div>
                                <div class="input-group">
                                    <input type="color" class="form-control form-control-color" id="colorPicker"
                                        name="colorPicker" value="#000000">
                                    <button type="button" class="btn btn-gold " id="addColorBtn" name="addColorBtn"
                                        style="background-color: #a67b5b;">افزودن رنگ</button>
                                </div>
                                <input type="hidden" name="available_colors" id="availableColorsInput"
                                    name="availableColorsInput">
                            </div>

                            <div class="form-group">
                                <label class="form-label">وضعیت</label>
                                <select class="form-control" id="productStatus" name="productStatus">
                                    <option value="موجود">موجود</option>
                                    <option value="ناموجود">ناموجود</option>
                                    <option value="به زودی">به زودی</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">توضیحات محصول</label>
                                <textarea class="form-control" id="productDescription" name="productDescription"
                                    rows="3" placeholder="توضیحات کامل درباره محصول..."></textarea>
                            </div>

                            <div class="d-flex justify-content-end gap-3">
                                <button type="button" class="outline-btn" id="cancelFormBtn" name="cancelFormBtn">
                                    <i class="fas fa-times"></i> انصراف
                                </button>
                                <button type="submit" class="gold-btn" id="gold-btn" name="gold-btn">
                                    <i class="fas fa-save"></i> ذخیره محصول
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <div class="stat-value">{{ $customerCount }}</div>
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
                                <th>id</th>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>شهر</th>
                                <th>تعداد سفارشات</th>
                                <th>وضعیت</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer )
                            <tr>
                                <td>{{ $customer['id'] }}</td>
                                <td>{{ $customer['userName'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>{{ $customer['city'] }}</td>
                                <td>۵</td>
                                <td><span class="badge badge-success">فعال</span></td>

                            </tr>
                            @endforeach


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

        <!-- بخش مدیریت اسلایدر -->
        <div class="slider-section" id="slider" style="display:none;">
            <div class="admin-header">
                <h1 class="admin-title"><i class="fas fa-images"></i> مدیریت اسلایدر صفحه اصلی</h1>
                <button class="gold-btn" id="addSlideBtn">
                    <i class="fas fa-plus"></i> افزودن اسلاید جدید
                </button>
            </div>

            <div class="admin-card">
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>لینک</th>
                                <th>ترتیب نمایش</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider )
                            <tr>
                                <td><img src={{ asset('storage/' . $slider['image']) }} width="80" class="rounded" alt={{ $slider['image'] }}></td>
                                <td>{{ $slider['title'] }}</td>
                                <td>{{ $slider['link'] }}</td>
                                <td>{{ $slider['order'] }}</td>
                                <td><span class="badge badge-success">{{ $slider['status'] }}</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="gold-btn btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- فرم افزودن/ویرایش اسلاید -->
            <div class="admin-card" id="slideForm" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus-circle"></i> افزودن اسلاید جدید</h3>
                </div>
                <form action="{{ route('create.slider') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">تصویر اسلاید (1920x800)</label>
                                <div class="image-upload">
                                    <div class="upload-icon">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </div>
                                    <p>برای آپلود تصویر کلیک کنید</p>
                                    <input name="image" type="file" accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">عنوان اسلاید</label>
                                <input type="text" name="title" class="form-control" placeholder="مثال: تخفیف ویژه بهاری">
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">لینک هدف</label>
                                <input type="text" name="link" class="form-control" placeholder="مثال: /discount">
                                @error('link')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">ترتیب نمایش</label>
                                <input type="number" name="order" class="form-control" value="1">
                                @error('order')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">وضعیت</label>
                                <select name="status" class="form-control">
                                    <option value="active">فعال</option>
                                    <option value="inactive">غیرفعال</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-end gap-3">
                                <button type="button" class="outline-btn" id="cancelSlideBtn">
                                    <i class="fas fa-times"></i> انصراف
                                </button>
                                <button type="submit" class="gold-btn">
                                    <i class="fas fa-save"></i> ذخیره اسلاید
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- بخش محصولات تخفیف دار -->
        <div class="discount-section" id="discount" style="display:none;">
            <div class="admin-header">
                <h1 class="admin-title"><i class="fas fa-percentage"></i> محصولات تخفیف دار</h1>
                <button class="gold-btn" id="addDiscountBtn">
                    <i class="fas fa-plus"></i> افزودن تخفیف جدید
                </button>
            </div>

            <div class="admin-card">
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>نام محصول</th>
                                <th>قیمت اصلی</th>
                                <th>قیمت با تخفیف</th>
                                <th>زمان باقیمانده</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="images/product1.jpg" width="50" class="rounded"></td>
                                <td>شال حریر طرح دار</td>
                                <td>350,000 تومان</td>
                                <td>290,000 تومان</td>
                                <td>
                                    <div class="discount-timer" data-end="2024-06-30T23:59:59">
                                        2 روز و 4 ساعت
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="gold-btn btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- فرم افزودن/ویرایش تخفیف -->
            <div class="admin-card" id="discountForm" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-percentage"></i> افزودن تخفیف جدید</h3>
                </div>
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">انتخاب محصول</label>
                                <input type="text" class="form-control" placeholder="نام محصول">
                            </div>

                            <div class="form-group">
                                <label class="form-label">قیمت جدید با تخفیف</label>
                                <input type="number" class="form-control" placeholder="مثال: 290000">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">تاریخ پایان تخفیف</label>
                                <input type="datetime-local" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">نمایش تایمر</label>
                                <select class="form-control">
                                    <option value="yes">بله</option>
                                    <option value="no">خیر</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-end gap-3">
                                <button type="button" class="outline-btn" id="cancelDiscountBtn">
                                    <i class="fas fa-times"></i> انصراف
                                </button>
                                <button type="submit" class="gold-btn">
                                    <i class="fas fa-save"></i> ذخیره تخفیف
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- بخش مدیریت اسلایدر -->
        <div class="slider-section" id="slider" style="display:none;">
            <div class="admin-header">
                <h1 class="admin-title"><i class="fas fa-images"></i> مدیریت اسلایدر صفحه اصلی</h1>
                <button class="gold-btn" id="addSlideBtn">
                    <i class="fas fa-plus"></i> افزودن اسلاید جدید
                </button>
            </div>

            <div class="admin-card">
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>عنوان</th>
                                <th>لینک</th>
                                <th>ترتیب نمایش</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="images/slide1.jpg" width="80" class="rounded"></td>
                                <td>تخفیف ویژه بهاری</td>
                                <td>/discount</td>
                                <td>1</td>
                                <td><span class="badge badge-success">فعال</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="gold-btn btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- فرم افزودن/ویرایش اسلاید -->
            <div class="admin-card" id="slideForm" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-plus-circle"></i> افزودن اسلاید جدید</h3>
                </div>
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">تصویر اسلاید (1920x800)</label>
                                <div class="image-upload">
                                    <div class="upload-icon">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                    </div>
                                    <p>برای آپلود تصویر کلیک کنید</p>
                                    <input type="file" style="display: none;" accept="image/*">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">عنوان اسلاید</label>
                                <input type="text" class="form-control" placeholder="مثال: تخفیف ویژه بهاری">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">لینک هدف</label>
                                <input type="text" class="form-control" placeholder="مثال: /discount">
                            </div>

                            <div class="form-group">
                                <label class="form-label">ترتیب نمایش</label>
                                <input type="number" class="form-control" value="1">
                            </div>

                            <div class="form-group">
                                <label class="form-label">وضعیت</label>
                                <select class="form-control">
                                    <option value="active">فعال</option>
                                    <option value="inactive">غیرفعال</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-end gap-3">
                                <button type="button" class="outline-btn" id="cancelSlideBtn">
                                    <i class="fas fa-times"></i> انصراف
                                </button>
                                <button type="submit" class="gold-btn">
                                    <i class="fas fa-save"></i> ذخیره اسلاید
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- بخش محصولات تخفیف دار -->
        <div class="discount-section" id="discount" style="display:none;">
            <div class="admin-header">
                <h1 class="admin-title"><i class="fas fa-percentage"></i> محصولات تخفیف دار</h1>
                <button class="gold-btn" id="addDiscountBtn">
                    <i class="fas fa-plus"></i> افزودن تخفیف جدید
                </button>
            </div>

            <div class="admin-card">
                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>تصویر</th>
                                <th>نام محصول</th>
                                <th>قیمت اصلی</th>
                                <th>قیمت با تخفیف</th>
                                <th>زمان باقیمانده</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="images/product1.jpg" width="50" class="rounded"></td>
                                <td>شال حریر طرح دار</td>
                                <td>350,000 تومان</td>
                                <td>290,000 تومان</td>
                                <td>
                                    <div class="discount-timer" data-end="2024-06-30T23:59:59">
                                        2 روز و 4 ساعت
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <button class="gold-btn btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- فرم افزودن/ویرایش تخفیف -->
            <div class="admin-card" id="discountForm" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-percentage"></i> افزودن تخفیف جدید</h3>
                </div>
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">انتخاب محصول</label>
                                <input type="text" class="form-control" placeholder="نام محصول">
                            </div>

                            <div class="form-group">
                                <label class="form-label">قیمت جدید با تخفیف</label>
                                <input type="number" class="form-control" placeholder="مثال: 290000">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">تاریخ پایان تخفیف</label>
                                <input type="datetime-local" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-label">نمایش تایمر</label>
                                <select class="form-control">
                                    <option value="yes">بله</option>
                                    <option value="no">خیر</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-end gap-3">
                                <button type="button" class="outline-btn" id="cancelDiscountBtn">
                                    <i class="fas fa-times"></i> انصراف
                                </button>
                                <button type="submit" class="gold-btn">
                                    <i class="fas fa-save"></i> ذخیره تخفیف
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
                            <div class="image-upload"
                                style="width: 150px; height: 150px; margin: 0 auto 20px; border-radius: 50%; padding: 20px;">
                                <img src="images/avatar.jpg" id="userAvatar" class="rounded-circle" width="110"
                                    style="display: block;">
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
                                        <input type="password" class="form-control"
                                            placeholder="در صورت تمایل به تغییر رمز عبور">
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
    <script src="{{ asset('assets/js/Admin/dashboard.js') }}"></script>
</body>

</html>