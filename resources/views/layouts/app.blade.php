<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <base href="{{ asset('assets/dash/assets/')}}">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

<script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/app.min.js') }}" defer></script>
<script src="{{ asset('assets/dash/assets/js/app.init.js') }}" defer></script>
<script src="{{ asset('assets/dash/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

<script src="{{ asset('assets/dash/assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/theme.js') }}"></script>

<script src="{{ asset('assets/dash/assets/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/dashboards/dashboard.js') }}"></script>

</html>
