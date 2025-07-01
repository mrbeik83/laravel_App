
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
