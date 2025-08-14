@extends('layout.master')
@section('title','uniquescarf - فروشگاه آنلاین')
@push('styles')
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
@endpush
@section('content')
<main>
      <section class="py-5 bg-white">
        <div class="container">
          <div class="row g-4">
            <!-- اسلایدر  ) -->
            <div class="col-lg-7">
              <div
                id="luxurySlider"
                class="carousel slide rounded-4 overflow-hidden shadow-lg"
                data-bs-ride="carousel"
              >
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      src="../images/bear cute you gorgeous.jpg"
                      class="d-block w-100"
                      alt="slider1"
                      style="height: 500px; object-fit: cover"
                    />
                  </div>
                  <div class="carousel-item">
                    <img
                      src="../images/art _ aesthetics _ design.jpg"
                      class="d-block w-100"
                      alt="slider2"
                      style="height: 500px; object-fit: cover"
                    />
                  </div>
                </div>
                <button
                  class="carousel-control-prev"
                  type="button"
                  data-bs-target="#luxurySlider"
                  data-bs-slide="prev"
                >
                  <span
                    class="carousel-control-prev-icon bg-dark rounded-circle p-3"
                  ></span>
                </button>
                <button
                  class="carousel-control-next"
                  type="button"
                  data-bs-target="#luxurySlider"
                  data-bs-slide="next"
                >
                  <span
                    class="carousel-control-next-icon bg-dark rounded-circle p-3"
                  ></span>
                </button>
              </div>
            </div>

            <!-- دسته‌بندی‌ها ) -->
            <div class="col-lg-5">
              <div class="row g-3 h-100">
                <!-- دسته‌بندی 1 -->
                <div class="col-md-6">
                  <a href="#" class="luxury-category-card">
                    <img src="../images/روسری.webp" alt="روسری" />
                    <div class="luxury-category-overlay">
                      <h3>روسری</h3>
                      <span>مشاهده محصولات</span>
                    </div>
                  </a>
                </div>

                <!-- دسته‌بندی 2 -->
                <div class="col-md-6">
                  <a href="#" class="luxury-category-card">
                    <img src="../images/شال.webp" alt="شال" />
                    <div class="luxury-category-overlay">
                      <h3>شال</h3>
                      <span>مشاهده محصولات</span>
                    </div>
                  </a>
                </div>

                <!-- دسته‌بندی 3 -->
                <div class="col-md-6">
                  <a href="#" class="luxury-category-card">
                    <img src="../images/مجلسی.webp" alt="مجلسی " />
                    <div class="luxury-category-overlay">
                      <h3>مجلسی</h3>
                      <span>مشاهده محصولات</span>
                    </div>
                  </a>
                </div>

                <!-- دسته‌بندی 4 -->
                <div class="col-md-6">
                  <a href="#" class="luxury-category-card">
                    <img src="../images/مینی اسکارف.webp" alt="مینی اسکارف " />
                    <div class="luxury-category-overlay">
                      <h3>مینی اسکارف</h3>
                      <span>مشاهده محصولات</span>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ویژگی‌های فروشگاه -->
      <div class="row text-center mt-5 mb-5 features-row">
        <div class="col-6 col-md-3 mb-3 feature-item">
          <div class="feature-icon">
            <i class="fas fa-truck fa-2x"></i>
          </div>
          <h6>ارسال رایگان</h6>
          <small>برای سفارش‌های بالای 1 میلیون تومان</small>
        </div>
        <div class="col-6 col-md-3 mb-3 feature-item">
          <div class="feature-icon">
            <i class="fas fa-shield-alt fa-2x"></i>
          </div>
          <h6>ضمانت اصالت کالا</h6>
          <small>کاملاً اورجینال</small>
        </div>
        <div class="col-6 col-md-3 mb-3 feature-item">
          <div class="feature-icon">
            <i class="fas fa-credit-card fa-2x"></i>
          </div>
          <h6>پرداخت امن</h6>
          <small>از درگاه مطمئن</small>
        </div>
        <div class="col-6 col-md-3 mb-3 feature-item">
          <div class="feature-icon">
            <i class="fas fa-headset fa-2x"></i>
          </div>
          <h6>پشتیبانی ۲۴ ساعته</h6>
          <small>همیشه کنارتون هستیم</small>
        </div>
      </div>

      <div class="container py-5">
        <div class="special-offer-header">
          <h1>پیشنهاد شگفت انگیز</h1>
        </div>

        <div class="slider-container">
          <div class="card-slider">
            <div class="cards-wrapper" id="cardsWrapper">
              <!-- Slide 1 -->
              <div class="card-slide" data-index="0">
                <div class="slide-content">
                  <div class="luxury-card">
                    <div class="card-badge">جدید</div>
                    <img src="../images/مینی اسکارف.webp" alt="محصول 1" />
                    <div class="card-body">
                      <h5 class="card-title">شال مجلسی</h5>
                      <p class="card-text">شال مجلسی حریر با کیفیت بالا</p>
                      <div class="card-price">700,000 تومان</div>
                      <a href="#" class="text-black text-decoration-none"
                        ><button class="btn btn-luxury">خرید کنید</button></a
                      >
                    </div>
                  </div>
                  <div class="timer-container" id="timer">
                    <div class="timer-header">زمان باقی‌مانده</div>
                    <div class="timer-display">
                      <div class="timer-segment">
                        <div class="timer-value" id="hours">00</div>
                        <div class="timer-label">ساعت</div>
                      </div>
                      <div class="timer-segment">
                        <div class="timer-value" id="minutes">00</div>
                        <div class="timer-label">دقیقه</div>
                      </div>
                      <div class="timer-segment">
                        <div class="timer-value" id="seconds">00</div>
                        <div class="timer-label">ثانیه</div>
                      </div>
                    </div>
                    <div class="progress-container">
                      <div class="progress-bar" id="progressBar"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Slide 2 -->
              <div class="card-slide" data-index="1" style="display: none">
                <div class="slide-content">
                  <div class="luxury-card">
                    <div class="card-badge">ویژه</div>
                    <img src="../images/شال.webp" alt="محصول 2" />
                    <div class="card-body">
                      <h5 class="card-title">روسری ابریشمی</h5>
                      <p class="card-text">روسری ماندگار برای بانوان</p>
                      <div class="card-price">500,000 تومان</div>
                      <a href="#" class="text-black text-decoration-none"
                        ><button class="btn btn-luxury">خرید کنید</button></a
                      >
                    </div>
                  </div>
                  <div class="timer-container" id="timer2">
                    <div class="timer-header">زمان باقی‌مانده</div>
                    <div class="timer-display">
                      <div class="timer-segment">
                        <div class="timer-value" id="hours2">00</div>
                        <div class="timer-label">ساعت</div>
                      </div>
                      <div class="timer-segment">
                        <div class="timer-value" id="minutes2">00</div>
                        <div class="timer-label">دقیقه</div>
                      </div>
                      <div class="timer-segment">
                        <div class="timer-value" id="seconds2">00</div>
                        <div class="timer-label">ثانیه</div>
                      </div>
                    </div>
                    <div class="progress-container">
                      <div class="progress-bar" id="progressBar2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="slider-controls">
            <div class="slider-dot active" data-index="0"></div>
            <div class="slider-dot" data-index="1"></div>
          </div>

          <div class="slider-nav slider-prev" id="prevBtn">
            <i class="fa fa-chevron-right"></i>
          </div>
          <div class="slider-nav slider-next" id="nextBtn">
            <i class="fa fa-chevron-left"></i>
          </div>
        </div>
      </div>

      <!-- بخش جدیدترین محصولات -->
      <section class="new-products py-5">
        <div class="container">
          <div class="section-header text-center mb-5">
            <h2 class="section-title">جدیدترین‌ها</h2>
            <p class="section-subtitle">آخرین محصولات اضافه شده به فروشگاه</p>
          </div>

          <div class="row g-4">
            <!-- محصول 1 -->
            <div class="col-6 col-md-4 col-lg-3">
              <a href="../products/viewproduct.html"
                ><div class="product-card">
                  <div class="product-badge">جدید</div>
                  <div class="product-img">
                    <img
                      src="../images/مینی اسکارف.webp"
                      alt="محصول جدید 1"
                      class="img-fluid"
                    />
                    <div class="product-actions">
                      <a href="#" class="text-white"
                        ><button class="btn-action">
                          <i class="fas fa-shopping-cart"></i></button
                      ></a>
                    </div>
                  </div>
                  <div class="product-body">
                    <h5 class="product-title">مینی اسکارف طرح دار</h5>
                    <div class="product-price">
                      <span class="current-price">450,000 تومان</span>
                      <span class="old-price">520,000 تومان</span>
                    </div>
                  </div>
                </div></a
              >
            </div>

            <!-- محصول 2 -->
            <div class="col-6 col-md-4 col-lg-3">
              <a href="../products/viewproduct.html"
                ><div class="product-card">
                  <div class="product-badge">جدید</div>
                  <div class="product-img">
                    <img
                      src="../images/شال.webp"
                      alt="محصول جدید 2"
                      class="img-fluid"
                    />
                    <div class="product-actions">
                      <a href="#" class="text-white"
                        ><button class="btn-action">
                          <i class="fas fa-shopping-cart"></i></button
                      ></a>
                    </div>
                  </div>
                  <div class="product-body">
                    <h5 class="product-title">شال حریر مجلسی</h5>
                    <div class="product-price">
                      <span class="current-price">680,000 تومان</span>
                    </div>
                  </div>
                </div></a
              >
            </div>

            <!-- محصول 3 -->
            <div class="col-6 col-md-4 col-lg-3">
              <a href="../products/viewproduct.html"
                ><div class="product-card">
                  <div class="product-badge">جدید</div>
                  <div class="product-img">
                    <img
                      src="../images/روسری.webp"
                      alt="محصول جدید 3"
                      class="img-fluid"
                    />
                    <div class="product-actions">
                      <a href="#" class="text-white"
                        ><button class="btn-action">
                          <i class="fas fa-shopping-cart"></i></button
                      ></a>
                    </div>
                  </div>
                  <div class="product-body">
                    <h5 class="product-title">روسری ابریشمی ساده</h5>
                    <div class="product-price">
                      <span class="current-price">390,000 تومان</span>
                      <span class="old-price">450,000 تومان</span>
                    </div>
                  </div>
                </div></a
              >
            </div>

            <!-- محصول 4 -->
            <div class="col-6 col-md-4 col-lg-3">
              <a href="../products/viewproduct.html">
                <div class="product-card">
                  <div class="product-badge">جدید</div>
                  <div class="product-img">
                    <img
                      src="../images/مجلسی.webp"
                      alt="محصول جدید 4"
                      class="img-fluid"
                    />
                    <div class="product-actions">
                      <a href="#" class="text-white"
                        ><button class="btn-action">
                          <i class="fas fa-shopping-cart"></i></button
                      ></a>
                    </div>
                  </div>
                  <div class="product-body">
                    <h5 class="product-title">شال مجلسی طرح طلایی</h5>
                    <div class="product-price">
                      <span class="current-price">750,000 تومان</span>
                      <span class="old-price">890,000 تومان</span>
                    </div>
                  </div>
                </div></a
              >
            </div>
          </div>

          <div class="text-center mt-5">
            <a href="#" class="btn-view-more">مشاهده همه محصولات جدید</a>
          </div>
        </div>
      </section>

      <div class="container my-5">
        <div
          class="d-flex flex-column flex-md-row border rounded overflow-hidden bg-white"
          style="border-color: #d2b48c !important"
        >
          <!-- اسلایدر اصلی -->
          <div class="flex-grow-1 p-3">
            <div
              id="perfumeSlider"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner px-4">
                <!-- اسلاید ۱ -->
                <div class="carousel-item active">
                  <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">روسری شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">روسری شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">روسری شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">روسری شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- اسلاید ۲ -->
                <div class="carousel-item">
                  <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">روسری شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">روسری شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">روسری شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">روسری شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- کنترل‌های اسلایدر -->
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#perfumeSlider"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon bg-dark rounded-circle p-2"
                ></span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#perfumeSlider"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon bg-dark rounded-circle p-2"
                ></span>
              </button>

              <!-- اون زیریای  اسلایدر -->
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#perfumeSlider"
                  data-bs-slide-to="0"
                  class="active bg-brown"
                ></button>
                <button
                  type="button"
                  data-bs-target="#perfumeSlider"
                  data-bs-slide-to="1"
                  class="bg-beige"
                ></button>
              </div>
            </div>
          </div>

          <!-- بخش روسری ها  -->
          <div
            class="warm-section"
            style="
              width: 220px;
              min-width: 220px;
              background-image: url('./images/photo_2025-07-24_12-02-54.jpg');
              background-size: cover;
              position: relative;
            "
          >
            <a
              href="/category/warm-perfumes"
              class="h-100 w-100 d-flex align-items-center justify-content-center text-decoration-none"
            >
              <div
                class="overlay"
                style="
                  position: absolute;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background: rgba(92, 58, 33, 0.5);
                  backdrop-filter: blur(3px);
                "
              ></div>
              <div
                class="text-white position-relative z-index-1 text-center px-3"
              >
                <h3 class="mb-0">روسری ها</h3>
              </div>
            </a>
          </div>
        </div>
      </div>

      <!-- بخش دوم ولی برعکس قبلی -->

      <div class="container my-5">
        <div
          class="d-flex flex-column flex-md-row border rounded overflow-hidden bg-white"
          style="border-color: #d2b48c !important"
        >
          <!-- بخش شال ها  -->
          <div
            class="warm-section"
            style="
              width: 220px;
              min-width: 220px;
              background-image: url('./images/photo_2025-07-24_12-02-54.jpg');
              background-size: cover;
              position: relative;
            "
          >
            <a
              href="/category/warm-perfumes"
              class="h-100 w-100 d-flex align-items-center justify-content-center text-decoration-none"
            >
              <div
                class="overlay"
                style="
                  position: absolute;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background: rgba(92, 58, 33, 0.5);
                  backdrop-filter: blur(3px);
                "
              ></div>
              <div
                class="text-white position-relative z-index-1 text-center px-3"
              >
                <h3 class="mb-0">شال</h3>
              </div>
            </a>
          </div>

          <!-- اسلایدر اصلی -->
          <div class="flex-grow-1 p-3">
            <div
              id="perfumeSlider"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner px-4">
                <!-- اسلاید ۱ -->
                <div class="carousel-item active">
                  <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">شال شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">شال شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">شال شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">شال شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- اسلاید ۲ -->
                <div class="carousel-item">
                  <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">شال شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">شال شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">شال شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">شال شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- کنترل‌های اسلایدر -->
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#perfumeSlider"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon bg-dark rounded-circle p-2"
                ></span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#perfumeSlider"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon bg-dark rounded-circle p-2"
                ></span>
              </button>

              <!-- اون زیریای اسلایدر -->
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#perfumeSlider"
                  data-bs-slide-to="0"
                  class="active bg-brown"
                ></button>
                <button
                  type="button"
                  data-bs-target="#perfumeSlider"
                  data-bs-slide-to="1"
                  class="bg-beige"
                ></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container my-5">
        <div
          class="d-flex flex-column flex-md-row border rounded overflow-hidden bg-white"
          style="border-color: #d2b48c !important"
        >
          <!-- اسلایدر اصلی -->
          <div class="flex-grow-1 p-3">
            <div
              id="perfumeSlider"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner px-4">
                <!-- اسلاید ۱ -->
                <div class="carousel-item active">
                  <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مینی اسکارف شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مینی اسکارف شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مینی اسکارف شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مینی اسکارف شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- اسلاید ۲ -->
                <div class="carousel-item">
                  <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مینی اسکارف شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مینی اسکارف شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مینی اسکارف شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مینی اسکارف شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- کنترل‌های اسلایدر -->
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#perfumeSlider"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon bg-dark rounded-circle p-2"
                ></span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#perfumeSlider"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon bg-dark rounded-circle p-2"
                ></span>
              </button>

              <!-- زیریای اسلایدر -->
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#perfumeSlider"
                  data-bs-slide-to="0"
                  class="active bg-brown"
                ></button>
                <button
                  type="button"
                  data-bs-target="#perfumeSlider"
                  data-bs-slide-to="1"
                  class="bg-beige"
                ></button>
              </div>
            </div>
          </div>

          <!-- بخش مینی اسکارف -->
          <div
            class="warm-section"
            style="
              width: 220px;
              min-width: 220px;
              background-image: url('./images/photo_2025-07-24_12-02-54.jpg');
              background-size: cover;
              position: relative;
            "
          >
            <a
              href="/category/warm-perfumes"
              class="h-100 w-100 d-flex align-items-center justify-content-center text-decoration-none"
            >
              <div
                class="overlay"
                style="
                  position: absolute;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background: rgba(92, 58, 33, 0.5);
                  backdrop-filter: blur(3px);
                "
              ></div>
              <div
                class="text-white position-relative z-index-1 text-center px-3"
              >
                <h3 class="mb-0">مینی اسکارف</h3>
              </div>
            </a>
          </div>
        </div>
      </div>

      <!-- بخش دوم ولی برعکس قبلی -->

      <div class="container my-5">
        <div
          class="d-flex flex-column flex-md-row border rounded overflow-hidden bg-white"
          style="border-color: #d2b48c !important"
        >
          <!-- بخش مجلسی ها -->
          <div
            class="warm-section"
            style="
              width: 220px;
              min-width: 220px;
              background-image: url('./images/photo_2025-07-24_12-02-54.jpg');
              background-size: cover;
              position: relative;
            "
          >
            <a
              href="/category/warm-perfumes"
              class="h-100 w-100 d-flex align-items-center justify-content-center text-decoration-none"
            >
              <div
                class="overlay"
                style="
                  position: absolute;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background: rgba(92, 58, 33, 0.5);
                  backdrop-filter: blur(3px);
                "
              ></div>
              <div
                class="text-white position-relative z-index-1 text-center px-3"
              >
                <h3 class="mb-0">مجلسی</h3>
              </div>
            </a>
          </div>

          <!-- اسلایدر اصلی -->
          <div class="flex-grow-1 p-3">
            <div
              id="perfumeSlider"
              class="carousel slide"
              data-bs-ride="carousel"
            >
              <div class="carousel-inner px-4">
                <!-- اسلاید ۱ -->
                <div class="carousel-item active">
                  <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مجلسی شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مجلسی شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مجلسی شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مجلسی شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>

                <!-- اسلاید ۲ -->
                <div class="carousel-item">
                  <div class="row g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مجلسی شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مجلسی شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مجلسی شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                      <a href="#" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm">
                          <img
                            src="../images/مینی اسکارف.webp"
                            class="card-img-top"
                            alt="محصول ۱"
                          />
                          <div class="card-body">
                            <h6 class="card-title">مجلسی شماره ۱</h6>
                            <p class="card-text text-muted small">
                              قیمت: ۴۵۰ هزار تومان
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- کنترل‌های اسلایدر -->
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#perfumeSlider"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon bg-dark rounded-circle p-2"
                ></span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#perfumeSlider"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon bg-dark rounded-circle p-2"
                ></span>
              </button>

              <!-- زیریای اسلایدر -->
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#perfumeSlider"
                  data-bs-slide-to="0"
                  class="active bg-brown"
                ></button>
                <button
                  type="button"
                  data-bs-target="#perfumeSlider"
                  data-bs-slide-to="1"
                  class="bg-beige"
                ></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section class="reading-section py-5">
        <div class="container">
          <div class="section-header text-center mb-5">
            <h2 class="section-title">خواندنی‌ها</h2>
            <p class="section-subtitle">
              مقالات و راهنمایی‌های تخصصی درباره شال و روسری و استایل
            </p>
          </div>

          <div class="row g-4">
            <!-- مقاله ۱ -->
            <div class="col-md-6 col-lg-4">
              <div class="reading-card">
                <div class="reading-img">
                  <img
                    src="../images/Women 100_ Cashmere Scarf Solid Color Long Soft Fall Winter Warm Tassel Scarves(1).jpg"
                    alt="چگونه شال مناسب انتخاب کنیم"
                    class="img-fluid"
                  />
                </div>
                <div class="reading-body">
                  <span class="reading-category">راهنمای انتخاب</span>
                  <h3 class="reading-title">
                    چگونه شال مناسب استایل خود را انتخاب کنیم؟
                  </h3>
                  <p class="reading-excerpt">
                    راهنمای کامل برای شناخت جنس‌ها و طرح‌های مختلف شال و انتخاب
                    بهترین گزینه متناسب با سلیقه شما
                  </p>
                  <a href="#" class="reading-link">ادامه مطلب</a>
                </div>
              </div>
            </div>

            <!-- مقاله ۲ -->
            <div class="col-md-6 col-lg-4">
              <div class="reading-card">
                <div class="reading-img">
                  <img
                    src="../images/100_ Wool Luxury Brands Classic England Style Women Scarf Fashion Stripe Plaid Scarves Tassel Shawls.jpg"
                    alt="مراقبت از شال"
                    class="img-fluid"
                  />
                </div>
                <div class="reading-body">
                  <span class="reading-category">مراقبت و نگهداری</span>
                  <h3 class="reading-title">
                    روش‌های صحیح نگهداری از شال‌های مختلف
                  </h3>
                  <p class="reading-excerpt">
                    با این روش‌ها کیفیت شال‌های خود را حفظ کنید و از آسیب دیدن
                    آنها جلوگیری نمایید
                  </p>
                  <a href="#" class="reading-link">ادامه مطلب</a>
                </div>
              </div>
            </div>

            <!-- مقاله ۳ -->
            <div class="col-md-6 col-lg-4">
              <div class="reading-card">
                <div class="reading-img">
                  <img
                    src="../images/New Checkered Scarf Women's Winter Scarves Cashmere Scarf Woman Ladies Scarf Warm XWJ10.jpg"
                    alt="تاریخچه شال"
                    class="img-fluid"
                  />
                </div>
                <div class="reading-body">
                  <span class="reading-category">تاریخچه و فرهنگ</span>
                  <h3 class="reading-title">
                    تاریخچه جذاب شال و روسری در فرهنگ‌های مختلف
                  </h3>
                  <p class="reading-excerpt">
                    سفر هیجان‌انگیز از کاربردهای سنتی تا تبدیل شدن به یک اکسسوری
                    مدرن
                  </p>
                  <a href="#" class="reading-link">ادامه مطلب</a>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center mt-4">
            <a href="#" class="btn-view-all">مشاهده همه مقالات</a>
          </div>
        </div>
      </section>
    </main>
@endsection
@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush