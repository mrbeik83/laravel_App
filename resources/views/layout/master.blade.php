<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>فروشگاه</title>

    {{-- اضافه کردن Bootstrap از CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
</head>
<body>

    {{-- هدر --}}
    @include('layout.header')

    {{-- محتوای صفحه --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- فوتر --}}
    @include('layout.footer')

    {{-- اسکریپت بوت‌استرپ --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
