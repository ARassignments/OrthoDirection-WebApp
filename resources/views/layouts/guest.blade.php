<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-bs-theme="light"
    data-color-theme="Blue_Theme">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="{{ asset('assets/dash/assets/css/styles.css') }}">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="../assets/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        {{ $slot }}
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->
</body>

<script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/app.init.js') }}"></script>
<script src="{{ asset('assets/dash/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/theme.js') }}"></script>

</html>
