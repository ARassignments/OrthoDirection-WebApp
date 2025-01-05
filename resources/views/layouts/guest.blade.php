<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-bs-theme="light"
    data-color-theme="Blue_Theme">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description"
        content="Ortho Direction - Comprehensive dental services with expert care. Learn more about our services, pricing, and team.">
    <meta name="keywords" content="dentist, dental care, dental services, ortho direction">
    <meta name="author" content="Ortho Direction">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Ortho Direction | Expert Dental Care">
    <meta property="og:description" content="Comprehensive dental services with expert care.">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:url" content="https://www.orthodirection.com">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Ortho Direction | Expert Dental Care">
    <meta name="twitter:description" content="Comprehensive dental services with expert care.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">


    @vite(['resources/js/app.js'])
    <link rel="preload" href="{{ asset('assets/dash/assets/css/styles.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/favicon.png')}}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        {{ $slot }}
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->
</body>

<script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/app.min.js') }}" defer></script>
<script src="{{ asset('assets/dash/assets/js/app.init.js') }}" defer></script>
<script src="{{ asset('assets/dash/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/theme.js') }}"></script>

</html>
