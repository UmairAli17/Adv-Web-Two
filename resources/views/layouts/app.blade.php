@include('layouts.head')
<body>
    <div id="app">
        @include('layouts.top-nav')
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
