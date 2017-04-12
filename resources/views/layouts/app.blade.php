@include('layouts.head')
<body>
    <div id="app">
        @include('layouts.top-nav')
        <div class="container">
        	@yield('content')
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
