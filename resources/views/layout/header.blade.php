<header class="bg-white shadow-md p-4 flex justify-between items-center">
    {{-- سمت راست: معرفی سایت --}}
    <div class="text-right">
        <h1 class="text-xl font-bold text-gray-800">فروشگاه شال و روسری محمدرضا</h1>
        <p class="text-sm text-gray-600">بهترین مدل‌ها با بهترین قیمت</p>
    </div>

    {{-- سمت چپ: دکمه‌های ورود و ثبت‌نام --}}
    <div class="flex items-center gap-4">
        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-black rounded hover:bg-blue-600">
            ورود
        </a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-green-500 text-black rounded hover:bg-green-600">
            ثبت‌ نام
        </a>
    </div>
</header>
