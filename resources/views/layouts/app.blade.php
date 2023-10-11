<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @include('partials.styles')
    <!-- Scripts -->
    {{-- <script src="js/script.js"></script> --}}
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div class="wrapper">
        <div id="home-section" class="home-section">
            @include('partials.navbar')
            @yield('content')
        </div>
        {{-- @include('partials.footer') --}}
    </div>

    @include('partials.scripts')
    @yield('scripts')

    <script>
        // disable right click
        // document.addEventListener('contextmenu', event => event.preventDefault());

        document.onkeydown = function(e) {

            // disable F12 key
            if (e.keyCode == 123) {
                return true;
                // return false;
            }

            // disable I key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                return false;
            }

            // disable J key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                return false;
            }

            // disable U key
            if (e.ctrlKey && e.keyCode == 85) {
                return false;
            }
        }
    </script>
</body>

</html>
