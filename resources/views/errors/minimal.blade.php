<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ortho Direction | @yield('title')</title>

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
    <link rel="preload" href="{{ asset('assets/dashboard/assets/css/style6572.css?v1.5.0') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/style6572.css?v1.5.0') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <base href="{{ asset('assets/dashboard/assets/') }}">

</head>

<body class="nk-body " data-menu-collapse="lg">
    <div class="nk-app-root ">
        <main class="nk-pages">
            <section class="section has-mask min-vh-100 d-flex flex-column">
                <a href="/" class="px-4 top-0 mt-4"  style="position: absolute; z-index:12;">
                    <img src="{{ asset('assets/images/logo.png') }}" width="100px" alt="Logo-Dark" />
                </a>
                <div class="nk-mask bg-pattern-dot bg-blend-around"></div>
                <div class="container my-auto">
                    <div class="section-content">
                        <div class="row g-gs justify-content-center">
                            <div class="col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                                <div class="block-gfx mt-n5"><img class="w-100 rounded-4" src="assets/images/gfx/error/404.svg"
                                        alt=""></div>
                                <div class="block-text text-center mt-4">
                                    <h3 class="title">Oops! Why you’re here? @yield('code') Error</h3>
                                    <p>@yield('message')</p>
                                    <ul class="btn-list btn-list-inline g-0">
                                        <li><a class="btn btn-primary" href="/"><span>Back to Home</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

</body>

</html>
