<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/style6572.css?v1.5.0') }}">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body class="nk-body " data-menu-collapse="lg">
    <div class="nk-app-root ">
        <main class="nk-pages">
            <div class="min-vh-100 d-flex flex-column has-mask">
                <div class="nk-mask bg-pattern-dot bg-blend-around">
                </div>
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
<script src="{{ asset('assets/dashboard/assets/js/bundle6572.js?v1.5.0') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/scripts6572.js?v1.5.0') }}"></script>

</html>
