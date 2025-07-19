<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Unique Scarf')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- استایل‌های مشترک --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- استایل اختصاصی هر صفحه --}}
    @stack('styles')
</head>
<body>

    {{-- هدر --}}
    @include('layout.header')

    {{-- محتوای هر صفحه --}}
    <main>
        @yield('content')
    </main>

    {{-- فوتر --}}
    @include('layout.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
