<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>Ortho Direction</title>

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

    <script>
        var userId = "{{ Auth::id() }}";
    </script>
    @vite(['resources/js/app.js'])
    <link rel="preload" href="{{ asset('assets/dash/assets/css/styles.css') }}" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" as="style">
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/css/styles.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/dash/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css"/>
    <base href="{{ asset('assets/dash/assets/') }}">
    <style>
        #myTable_wrapper {
            display: flex;
            flex-wrap: wrap;
            width: calc(100% - 0rem) !important;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        #myTable_wrapper::-webkit-scrollbar-track {
            background-color: transparent;
        }

        #myTable_wrapper::-webkit-scrollbar {
            height: 15px;
        }

        #myTable_wrapper::-webkit-scrollbar-thumb {
            border: 4px solid #fff;
            border-radius: 10px;
            background-color: rgba(108, 117, 125, 0.3);
            transition: all 0.3s ease;
        }

        #myTable_wrapper::-webkit-scrollbar-thumb:hover {
            background-color: rgba(108, 117, 125, 0.5);
            cursor: all-scroll;
        }

        #myTable_wrapper #myTable_length,
        #myTable_wrapper #myTable_filter,
        #myTable_wrapper #myTable_info {
            flex-basis: 50%;

            @media screen and (max-width: 768px) {
                flex-basis: 100%;
            }
        }

        #myTable_wrapper #myTable_length {
            position: sticky;
            left: 0;
        }

        #myTable_wrapper #myTable_filter {
            position: sticky;
            left: 0;

            @media screen and (max-width: 768px) {
                padding-top: 0.5em;
            }
        }

        #myTable_wrapper #myTable_info {
            position: sticky;
            left: 0;
        }

        #myTable_wrapper #myTable_paginate {
            padding-top: 0.85em;
            margin-left: auto;

            @media screen and (max-width: 768px) {
                position: sticky;
                left: 0;
                flex-basis: 100%;
            }
        }

        #myTable_wrapper #myTable_filter input {
            outline: none;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #5a6a85;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: transparent;
            background-clip: padding-box;
            border: var(--bs-border-width) solid #dfe5ef;
            border-radius: 7px;
            box-shadow: var(--bs-box-shadow-inset);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>
</head>

<body>

    <div class="preloader">
        <div class="spinner-border text-primary" style="width: 4.5rem; height: 4.5rem" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <img src="{{ asset('assets/images/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>

    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div><!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/" class="text-nowrap logo-img">
                        
                        <img src="{{ asset('assets/images/logo.png') }}" class="dark-logo" alt="Logo-Dark"
                            style="height: 60px;" />
                        <img src="{{ asset('assets/images/logo.png') }}" class="light-logo" alt="Logo-light"
                            style="height: 60px;" />
                    </a>
                    <a href="javascript:void(0)"
                        class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <i class="ti ti-x"></i>
                    </a>
                </div>


                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        @if (Auth::user())
                            <!-- ---------------------------------- -->
                            <!-- Home -->
                            <!-- ---------------------------------- -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">{{ Auth::user() ? Auth::user()->role : '' }}</span>
                            </li>
                            <!-- ---------------------------------- -->
                            <!-- Dashboard -->
                            <!-- ---------------------------------- -->
                            @if (Auth::user()->role == 'admin')
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-home"></i>
                                        </span>
                                        <span class="hide-menu">Dashboard</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                        <span class="d-flex">
                                            <i class="ti ti-chart-donut-3"></i>
                                        </span>
                                        <span class="hide-menu">Blogs</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.blogs') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Blogs</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.add-blog') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Add Blog</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                        aria-expanded="false">
                                        <span class="d-flex">
                                            <i class="ti ti-category"></i>
                                        </span>
                                        <span class="hide-menu">Services</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.services') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Services</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ route('admin.add-service') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Add Service</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                        aria-expanded="false">
                                        <span class="d-flex">
                                            <i class="ti ti-users"></i>
                                        </span>
                                        <span class="hide-menu">Users</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <li class="sidebar-item">
                                            <a href="/admin/family" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Family Members</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="/admin/patients" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Patients</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="/admin/doctors" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Doctors</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/admin/appointments" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <span class="hide-menu">Appointments</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between"
                                        href="{{ route('admin.messages') }}" aria-expanded="false">
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="d-flex">
                                                <i class="ti ti-messages"></i>
                                            </span>
                                            <span class="hide-menu">Messages</span>
                                        </div>
                                        <div class="hide-menu">
                                            <span
                                                class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center rounded-pill fs-2">0</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('admin.newsletter') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-mailbox"></i>
                                        </span>
                                        <span class="hide-menu">Newsletter</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('admin.faqs') }}" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-help"></i>
                                        </span>
                                        <span class="hide-menu">FAQs</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('admin.contact') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-list-details"></i>
                                        </span>
                                        <span class="hide-menu">Contact List</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('admin.plans') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-timeline-event"></i>
                                        </span>
                                        <span class="hide-menu">Pricing Plans</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('admin.profile') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-user-circle"></i>
                                        </span>
                                        <span class="hide-menu">My Profile</span>
                                    </a>
                                </li>
                            @elseif (Auth::user()->role == 'doctor')
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/doctor" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-home"></i>
                                        </span>
                                        <span class="hide-menu">Dashboard</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('doctor.patients') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-users"></i>
                                        </span>
                                        <span class="hide-menu">Patients</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('doctor.appointments') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <span class="hide-menu">Appointments</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between" href="/doctor/messages"
                                        aria-expanded="false">
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="d-flex">
                                                <i class="ti ti-messages"></i>
                                            </span>
                                            <span class="hide-menu">Messages</span>
                                        </div>
                                        <div class="hide-menu">
                                            <span
                                                class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center rounded-pill fs-2">0</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('user.plans') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-timeline-event"></i>
                                        </span>
                                        <span class="hide-menu">Pricing Plans</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('doctor.profile') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-user-circle"></i>
                                        </span>
                                        <span class="hide-menu">My Profile</span>
                                    </a>
                                </li>
                            @elseif (Auth::user()->role == 'patient')
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('patient.dashboard') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-home"></i>
                                        </span>
                                        <span class="hide-menu">Dashboard</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('patient.tracking') }}" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-route"></i>
                                        </span>
                                        <span class="hide-menu">Tracking</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('patient.appointments') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <span class="hide-menu">Appointments</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('patient.doctors') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-stethoscope"></i>
                                        </span>
                                        <span class="hide-menu">Doctors</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between"
                                        href="{{ route('patient.messages') }}" aria-expanded="false">
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="d-flex">
                                                <i class="ti ti-messages"></i>
                                            </span>
                                            <span class="hide-menu">Messages</span>
                                        </div>
                                        <div class="hide-menu">
                                            <span
                                                class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center rounded-pill fs-2">0</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('patient.profile') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-user-circle"></i>
                                        </span>
                                        <span class="hide-menu">My Profile</span>
                                    </a>
                                </li>
                            @elseif (Auth::user()->role == 'family')
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('family.dashboard') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-home"></i>
                                        </span>
                                        <span class="hide-menu">Dashboard</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('family.tracking') }}" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-route"></i>
                                        </span>
                                        <span class="hide-menu">Tracking</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('family.appointments') }}" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-calendar"></i>
                                        </span>
                                        <span class="hide-menu">Appointments</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link justify-content-between"
                                        href="{{ route('family.messages') }}" aria-expanded="false">
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="d-flex">
                                                <i class="ti ti-messages"></i>
                                            </span>
                                            <span class="hide-menu">Messages</span>
                                        </div>
                                        <div class="hide-menu">
                                            <span
                                                class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center rounded-pill fs-2">0</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ route('family.profile') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-user-circle"></i>
                                        </span>
                                        <span class="hide-menu">My Profile</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="{{ route('notifications') }}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="d-flex">
                                        <i class="ti ti-inbox"></i>
                                    </span>
                                    <span class="hide-menu">Notifications</span>
                                </div>
                                <div class="hide-menu">
                                    <span
                                        class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center rounded-pill fs-2 d-none" id="notifyCount">0</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">account settings</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('profile.edit') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-settings"></i>
                                </span>
                                <span class="hide-menu">My Account</span>
                            </a>
                        </li>

                    </ul>
                </nav>

                <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded sidebar-ad mt-3">
                    <form class="hstack gap-3" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="john-img">
                            <img src="{{ $globalProfileImage }}" class="rounded-circle" width="40"
                                height="40" alt="" />
                        </div>
                        <div class="john-title">
                            <h6 class="mb-0 fs-4 fw-semibold text-capitalize">
                                {{ Auth::user() ? Auth::user()->name : '' }}
                            </h6>
                            <span class="fs-2 text-capitalize">{{ Auth::user() ? Auth::user()->role : '' }}</span>
                        </div>
                        {{-- <a href="{{ route('logout') }}" class="border-0 bg-transparent text-primary ms-auto"
                            tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="logout"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="ti ti-power fs-6"></i>
                        </a> --}}
                        <a class="border-0 bg-transparent text-primary ms-auto" tabindex="0" aria-label="logout"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout"
                            onclick="logout()">
                            <i class="ti ti-power fs-6"></i>
                        </a>
                    </form>
                </div>

                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
            </div>
        </aside>
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical"><!-- ---------------------------------- -->
                    <!-- Start Vertical Layout Header -->
                    <!-- ---------------------------------- -->
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                                    href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                        </ul>

                        <ul class="navbar-nav quick-links d-none d-lg-flex">
                            <!-- ------------------------------- -->
                            <!-- start apps Dropdown -->
                            <!-- ------------------------------- -->
                            <li class="nav-item dropdown hover-dd d-none d-lg-block">
                                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">
                                    Apps<span class="mt-1"><i class="ti ti-chevron-down fs-3"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="ps-7 pt-7">
                                                <div class="border-bottom">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="position-relative">
                                                                <a href="../main/app-chat.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="assets/images/svgs/icon-dd-chat.svg"
                                                                            alt="" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Chat Application
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">New
                                                                            messages arrived</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-invoice.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="assets/images/svgs/icon-dd-invoice.svg"
                                                                            alt="" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">Invoice App
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">Get
                                                                            latest invoice</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-contact2.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="assets/images/svgs/icon-dd-mobile.svg"
                                                                            alt="" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Contact Application
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">2
                                                                            Unsaved Contacts</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-email.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="assets/images/svgs/icon-dd-message-box.svg"
                                                                            alt="" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">Email App
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">Get
                                                                            new emails</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="position-relative">
                                                                <a href="../main/page-user-profile.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="assets/images/svgs/icon-dd-cart.svg"
                                                                            alt="" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            User Profile
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">learn
                                                                            more information</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-calendar.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="assets/images/svgs/icon-dd-date.svg"
                                                                            alt="" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Calendar App
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">Get
                                                                            dates</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-contact.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="assets/images/svgs/icon-dd-lifebuoy.svg"
                                                                            alt="" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Contact List Table
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">Add
                                                                            new contact</span>
                                                                    </div>
                                                                </a>
                                                                <a href="../main/app-notes.html"
                                                                    class="d-flex align-items-center pb-9 position-relative">
                                                                    <div
                                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                        <img src="assets/images/svgs/icon-dd-application.svg"
                                                                            alt="" class="img-fluid"
                                                                            width="24" height="24" />
                                                                    </div>
                                                                    <div class="d-inline-block">
                                                                        <h6 class="mb-1 fw-semibold fs-3">
                                                                            Notes Application
                                                                        </h6>
                                                                        <span
                                                                            class="fs-2 d-block text-body-secondary">To-do
                                                                            and Daily tasks</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center py-3">
                                                    <div class="col-8">
                                                        <a class="fw-semibold text-dark d-flex align-items-center lh-1"
                                                            href="#"><i
                                                                class="ti ti-help fs-6 me-2"></i>Frequently Asked
                                                            Questions</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="d-flex justify-content-end pe-4">
                                                            <button class="btn btn-primary">Check</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 ms-n4">
                                            <div class="position-relative p-7 border-start h-100">
                                                <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                                <ul class="">
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/page-pricing.html">Pricing Page</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/authentication-login.html">Authentication
                                                            Design</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/authentication-register.html">Register
                                                            Now</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="authentication-error.html">404 Error Page</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/app-notes.html">Notes App</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/page-user-profile.html">User Application</a>
                                                    </li>
                                                    <li class="mb-3">
                                                        <a class="fw-semibold bg-hover-primary"
                                                            href="../main/page-account-settings.html">Account
                                                            Settings</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- ------------------------------- -->
                            <!-- end apps Dropdown -->
                            <!-- ------------------------------- -->
                            <li class="nav-item dropdown-hover d-none d-lg-block">
                                <a class="nav-link" href="/admin">Chat</a>
                            </li>
                        </ul>

                        <div class="d-block d-lg-none">
                            <img src="{{ asset('assets/images/logo.png') }}" width="100" alt="" />
                        </div>
                        <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)"
                            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                                <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"
                                    class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                    aria-controls="offcanvasWithBothOptions">
                                    <i class="ti ti-align-justified fs-7"></i>
                                </a>
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <!-- ------------------------------- -->
                                    <!-- start language Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{ asset('assets/dash/assets/images/svgs/icon-flag-en.svg') }}"
                                                alt="" width="20px" height="20px"
                                                class="rounded-circle object-fit-cover round-20" />
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="message-body">
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/dash/assets/images/svgs/icon-flag-en.svg') }}"
                                                            alt="" width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20" />
                                                    </div>
                                                    <p class="mb-0 fs-3">English (UK)</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/dash/assets/images/svgs/icon-flag-cn.svg') }}"
                                                            alt="" width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20" />
                                                    </div>
                                                    <p class="mb-0 fs-3">中国人 (Chinese)</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/dash/assets/images/svgs/icon-flag-fr.svg') }}"
                                                            alt="" width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20" />
                                                    </div>
                                                    <p class="mb-0 fs-3">français (French)</p>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('assets/dash/assets/images/svgs/icon-flag-sa.svg') }}"
                                                            alt="" width="20px" height="20px"
                                                            class="rounded-circle object-fit-cover round-20" />
                                                    </div>
                                                    <p class="mb-0 fs-3">عربي (Arabic)</p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end language Dropdown -->
                                    <!-- ------------------------------- -->

                                    <!-- ------------------------------- -->
                                    <!-- start notification Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown" id="dropNotification" data-bs-toggle="tooltip"
                                        data-bs-placement="left"
                                        data-bs-original-title="You have no unread notifications">
                                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-bell-ringing"></i>
                                            <div class="notification bg-primary rounded-circle"
                                                id="notification-badge" style="display:none;"></div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                                <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm"
                                                    id="notification-count" style="display: none;"></span>
                                            </div>
                                            <div class="message-body" id="notification-list" data-simplebar>
                                                @if (auth()->user()->unreadNotifications->count() > 0)
                                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                                        <a href="javascript:void(0)"
                                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                            <span class="me-3">
                                                                <img src="{{ $notification->data['profile_img'] ? asset('profile_images/' . $notification->data['profile_img']) : 'assets/dash/assets/images/profile/user-1.jpg' }} "
                                                                    alt="user" class="rounded-circle"
                                                                    width="48" height="48"
                                                                    data-sam="{{ $notification->data['profile_img'] }}" />
                                                            </span>
                                                            <div class="w-75 d-inline-block v-middle">
                                                                <h6 class="mb-1 fw-semibold lh-base">
                                                                    {{ $notification->data['message'] }}</h6>
                                                                <span
                                                                    class="fs-2 me-1 text-body-secondary">{{ $notification->created_at->diffForHumans() }}</span>
                                                                @if ($notification->data['status'] == 'pending')
                                                                    <span
                                                                        class="fs-1 badge fw-semibold bg-warning-subtle text-warning text-capitalize">{{ $notification->data['status'] }}</span>
                                                                @elseif ($notification->data['status'] == 'approved')
                                                                    <span
                                                                        class="fs-1 badge fw-semibold bg-success-subtle text-success text-capitalize">{{ $notification->data['status'] }}</span>
                                                                @elseif ($notification->data['status'] == 'completed')
                                                                    <span
                                                                        class="fs-1 badge fw-semibold bg-success-subtle text-success text-capitalize">{{ $notification->data['status'] }}</span>
                                                                @elseif ($notification->data['status'] == 'rejected')
                                                                    <span
                                                                        class="fs-1 badge fw-semibold bg-danger-subtle text-danger text-capitalize">{{ $notification->data['status'] }}</span>
                                                                @elseif ($notification->data['status'] == 'cancelled')
                                                                    <span
                                                                        class="fs-1 badge fw-semibold bg-danger-subtle text-danger text-capitalize">{{ $notification->data['status'] }}</span>
                                                                @endif
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center w-100"
                                                        id="noDataErr">
                                                        <div class="row justify-content-center w-100">
                                                            <div class="col-lg-12">
                                                                <div class="text-center">
                                                                    <img src="{{ asset('assets/dash/assets/images/backgrounds/notification_bg.svg') }}"
                                                                        alt="" class="img-fluid col-lg-8">
                                                                    <h3 class="fw-semibold mb-3 text-dark fs-6">
                                                                        Notifications Not Found!!!</h3>
                                                                    <p class="fw-normal mb-7 fs-3 text-body">It seems
                                                                        the
                                                                        notifications you’re looking for is unavailable
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="py-6 px-7 mb-1">
                                                <a href="{{ route('notifications') }}" class="btn btn-outline-primary w-100">See All
                                                    Notifications</a>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end notification Dropdown -->
                                    <!-- ------------------------------- -->

                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="{{ $globalProfileImage }}" class="rounded-circle"
                                                        width="35" height="35" alt="" />
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="{{ $globalProfileImage }}" class="rounded-circle"
                                                        width="80" height="80" alt="" />
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3 text-capitalize">
                                                            {{ Auth::user() ? Auth::user()->name : '' }}
                                                        </h5>
                                                        <span
                                                            class="mb-1 d-block text-capitalize">{{ Auth::user() ? Auth::user()->role : '' }}</span>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i>
                                                            {{ Auth::user() ? Auth::user()->email : '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="message-body">
                                                    <a href="{{ route('profile.edit') }}"
                                                        class="py-8 px-7 mt-8 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                            <img src="{{ asset('assets/dash/assets/images/svgs/icon-account.svg') }}"
                                                                alt="" width="24" height="24" />
                                                        </span>
                                                        <div class="w-75 d-inline-block v-middle ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Account
                                                                Settings</span>
                                                        </div>
                                                    </a>
                                                    <a href="../main/app-email.html"
                                                        class="py-8 px-7 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                            <img src="{{ asset('assets/dash/assets/images/svgs/icon-inbox.svg') }}"
                                                                alt="" width="24" height="24" />
                                                        </span>
                                                        <div class="w-75 d-inline-block v-middle ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Inbox</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Messages &
                                                                Emails</span>
                                                        </div>
                                                    </a>
                                                    <a href="../main/app-notes.html"
                                                        class="py-8 px-7 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                            <img src="{{ asset('assets/dash/assets/images/svgs/icon-tasks.svg') }}"
                                                                alt="" width="24" height="24" />
                                                        </span>
                                                        <div class="w-75 d-inline-block v-middle ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Task</h6>
                                                            <span class="fs-2 d-block text-body-secondary">To-do and
                                                                Daily Tasks</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    <div
                                                        class="upgrade-plan bg-primary-subtle position-relative overflow-hidden rounded-4 p-4 mb-9">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <h5 class="fs-4 mb-3 w-50 fw-semibold">Unlimited
                                                                    Access</h5>
                                                                <button class="btn btn-primary">Upgrade</button>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="m-n4 unlimited-img">
                                                                    <img src="{{ asset('assets/dash/assets/images/backgrounds/unlimited-bg.png') }}"
                                                                        alt="" class="w-100" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method="POST" action="{{ route('logout') }}"
                                                        class="w-100">
                                                        @csrf
                                                        <a class="btn btn-outline-primary w-100"
                                                            onclick="logout()">Log
                                                            Out</a>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- ---------------------------------- -->
                    <!-- End Vertical Layout Header -->
                    <!-- ---------------------------------- -->

                    <!-- ------------------------------- -->
                    <!-- apps Dropdown in Small screen -->
                    <!-- ------------------------------- -->
                    <!--  Mobilenavbar -->
                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
                        aria-labelledby="offcanvasWithBothOptionsLabel">
                        <nav class="sidebar-nav scroll-sidebar">
                            <div class="offcanvas-header justify-content-between">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="" class="img-fluid" />
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body" data-simplebar="" data-simplebar
                                style="height: calc(100vh - 80px)">
                                <ul id="sidebarnav">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                            aria-expanded="false">
                                            <span>
                                                <i class="ti ti-apps"></i>
                                            </span>
                                            <span class="hide-menu">Apps</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse first-level my-3">
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-chat.html" class="d-flex align-items-center">
                                                    <div
                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="assets/images/svgs/icon-dd-chat.svg" alt=""
                                                            class="img-fluid" width="24" height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                                                        <span class="fs-2 d-block fw-normal text-muted">New messages
                                                            arrived</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-invoice.html" class="d-flex align-items-center">
                                                    <div
                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="assets/images/svgs/icon-dd-invoice.svg"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                                                        <span class="fs-2 d-block fw-normal text-muted">Get latest
                                                            invoice</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-cotact.html" class="d-flex align-items-center">
                                                    <div
                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="assets/images/svgs/icon-dd-mobile.svg"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                                                        <span class="fs-2 d-block fw-normal text-muted">2 Unsaved
                                                            Contacts</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-email.html" class="d-flex align-items-center">
                                                    <div
                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="assets/images/svgs/icon-dd-message-box.svg"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">Email App</h6>
                                                        <span class="fs-2 d-block fw-normal text-muted">Get new
                                                            emails</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/page-user-profile.html"
                                                    class="d-flex align-items-center">
                                                    <div
                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="assets/images/svgs/icon-dd-cart.svg" alt=""
                                                            class="img-fluid" width="24" height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                                                        <span class="fs-2 d-block fw-normal text-muted">learn more
                                                            information</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-calendar.html" class="d-flex align-items-center">
                                                    <div
                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="assets/images/svgs/icon-dd-date.svg" alt=""
                                                            class="img-fluid" width="24" height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                                                        <span class="fs-2 d-block fw-normal text-muted">Get
                                                            dates</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-contact2.html" class="d-flex align-items-center">
                                                    <div
                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="assets/images/svgs/icon-dd-lifebuoy.svg"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                                                        <span class="fs-2 d-block fw-normal text-muted">Add new
                                                            contact</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="sidebar-item py-2">
                                                <a href="../main/app-notes.html" class="d-flex align-items-center">
                                                    <div
                                                        class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                        <img src="assets/images/svgs/icon-dd-application.svg"
                                                            alt="" class="img-fluid" width="24"
                                                            height="24" />
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                                                        <span class="fs-2 d-block fw-normal text-muted">To-do and
                                                            Daily tasks</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <ul class="px-8 mt-7 mb-4">
                                                <li class="sidebar-item mb-3">
                                                    <h5 class="fs-5 fw-semibold">Quick Links</h5>
                                                </li>
                                                <li class="sidebar-item py-2">
                                                    <a class="fw-semibold text-dark"
                                                        href="../main/page-pricing.html">Pricing Page</a>
                                                </li>
                                                <li class="sidebar-item py-2">
                                                    <a class="fw-semibold text-dark"
                                                        href="../main/authentication-login.html">Authentication
                                                        Design</a>
                                                </li>
                                                <li class="sidebar-item py-2">
                                                    <a class="fw-semibold text-dark"
                                                        href="../main/authentication-register.html">Register Now</a>
                                                </li>
                                                <li class="sidebar-item py-2">
                                                    <a class="fw-semibold text-dark"
                                                        href="../main/authentication-error.html">404 Error Page</a>
                                                </li>
                                                <li class="sidebar-item py-2">
                                                    <a class="fw-semibold text-dark"
                                                        href="../main/app-notes.html">Notes App</a>
                                                </li>
                                                <li class="sidebar-item py-2">
                                                    <a class="fw-semibold text-dark"
                                                        href="../main/page-user-profile.html">User Application</a>
                                                </li>
                                                <li class="sidebar-item py-2">
                                                    <a class="fw-semibold text-dark"
                                                        href="../main/page-account-settings.html">Account Settings</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="/admin" aria-expanded="false">
                                            <span>
                                                <i class="ti ti-message-dots"></i>
                                            </span>
                                            <span class="hide-menu">Chat</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                </div>
            </header>
            <!--  Header End -->

            <div class="body-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <script>
                function handleColorTheme(e) {
                    $("html").attr("data-color-theme", e);
                    $(e).prop("checked", !0);
                }
            </script>
        </div>

    </div>
    <div class="dark-transparent sidebartoggler"></div>

</body>


<script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/js/app.min.js') }}" defer></script>
<script src="{{ asset('assets/dash/assets/js/app.init.js') }}" defer></script>
<script src="{{ asset('assets/dash/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dash/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

<script src="{{ asset('assets/dash/assets/js/sidebarmenu.js') }}" defer></script>
<script src="{{ asset('assets/dash/assets/js/theme.js') }}" defer></script>
<script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}" defer></script>
<script src="{{ asset('assets/dash/assets/libs/owl.carousel/dist/owl.carousel.min.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
{{-- <script src="{{ asset('assets/dash/assets/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script> --}}

<script src="{{ asset('assets/dash/assets/js/dashboards/dashboard.js') }}" defer></script>
<script>
    (function() {
        if (window.history && window.history.pushState) {
            window.history.pushState(null, null, window.location.href);
            window.onpopstate = function() {
                window.history.pushState(null, null, window.location.href);
            };
        }
    })();

    function logout() {
        Swal.fire({
            title: "Are you sure?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#1376F8",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Logout!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('logout') }}";
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "Logout Successfully"
                });
            }
        });
    }

    function fetchNotifications() {
        $.ajax({
            url: "{{ route('notifications.fetch.notify') }}",
            type: "GET",
            success: function(response) {
                let notifications = response.notifications;
                let unreadCount = response.unread_count;
                let notificationList = $("#notification-list");
                notificationList.empty();

                if (notifications.length > 0) {
                    notifications.forEach(notification => {
                        let statusBadge = getStatusBadge(notification.data.status);

                        notificationList.append(`
                            <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item notification-item" data-id="${notification.id}">
                                <span class="me-3">
                                    <img src="${notification.data.profile_img ? '/profile_images/' + notification.data.profile_img : 'assets/dash/assets/images/profile/user-1.jpg'}" 
                                        alt="user" class="rounded-circle" width="48" height="48" />
                                </span>
                                <div class="w-75 d-inline-block v-middle">
                                    <h6 class="mb-1 fw-semibold lh-base">${notification.data.message}</h6>
                                    <span class="fs-2 me-1 text-body-secondary">${moment(notification.created_at).fromNow()}</span>
                                    ${statusBadge}
                                </div>
                            </a>
                        `);
                    });

                    $("#notification-badge").show();
                    $("#notification-count").text(`${unreadCount} new`).show();
                    $("#notifyCount").removeClass('d-none');
                    $("#notifyCount").text(`${unreadCount}`);
                    document.querySelector("#dropNotification").setAttribute("data-bs-original-title",
                        "");
                } else {
                    $("#notification-list").html(`
                            <div class="d-flex align-items-center justify-content-center w-100">
                                <div class="row justify-content-center w-100">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/dash/assets/images/backgrounds/notification_bg.svg') }}"
                                                alt="" class="img-fluid col-lg-8">
                                            <h3 class="fw-semibold mb-3 text-dark fs-6">
                                                Notifications Not Found!!!</h3>
                                            <p class="fw-normal mb-7 fs-3 text-body">It seems
                                                the
                                                notifications you’re looking for is unavailable
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    $("#notification-badge").hide();
                    $("#notification-count").hide();
                    $("#notifyCount").addClass('d-none');
                    document.querySelector("#dropNotification").setAttribute("data-bs-original-title",
                        "You have no unread notifications");
                }

                let simpleBarInstance = document.querySelector('#notification-list');
                if (simpleBarInstance) {
                    new SimpleBar(simpleBarInstance).recalculate();
                }
            }
        });
    }

    function getStatusBadge(status) {
        let badgeClass = "";
        if (status === "pending") badgeClass = "bg-warning-subtle text-warning";
        else if (status === "approved" || status === "completed") badgeClass =
            "bg-success-subtle text-success";
        else if (status === "rejected" || status === "cancelled") badgeClass =
            "bg-danger-subtle text-danger";
        return `<span class="fs-1 badge fw-semibold ${badgeClass} text-capitalize">${status}</span>`;
    }

    // $("#mark-as-read").click(function() {
    //     $.ajax({
    //         url: "",
    //         type: "POST",
    //         data: {
    //             _token: "{{ csrf_token() }}"
    //         },
    //         success: function() {
    //             fetchNotifications();
    //         }
    //     });
    // });

    if(document.querySelector("#dropNotification")){
        $("#dropNotification").on("click", function() {
            fetchNotifications();
            reinitSimpleBar();
            $('[data-bs-toggle="tooltip"]').tooltip({
                trigger: "hover",
                container: "body"
            });
        });
    }

    function reinitSimpleBar() {
        let simpleBarInstance = document.querySelector('#notification-list');
        if (simpleBarInstance) {
            let simpleBar = SimpleBar.instances.get(simpleBarInstance);
            if (simpleBar) {
                simpleBar.unMount();
            }
            new SimpleBar(simpleBarInstance);
        }
    }

    fetchNotifications();
    reinitSimpleBar();

    function globalNotificationsTriggered() {
        fetchNotifications();
        reinitSimpleBar();
    }

    $(document).on("click", ".dropdown-item.notification-item", function() {
        let notificationId = $(this).data("id");
        $.ajax({
            url: "{{ route('notifications.read') }}",
            type: "POST",
            data: {
                id: notificationId,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    globalNotificationsTriggered();
                }
            },
            error: function(error) {
                console.error("Error marking notification as read:", error);
            }
        });
    });



    // window.Echo.private('notifications.' + {{ Auth::id() }})
    //     .listen('.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', (event) => {
    //         let data = event.notification;

    //         let notificationHtml = `
    //             <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item">
    //                 <span class="me-3">
    //                     <img src="${data.profile_img ? '/profile_images/' + data.profile_img : 'assets/dash/assets/images/profile/user-1.jpg'}"
    //                         alt="user" class="rounded-circle" width="48" height="48" />
    //                 </span>
    //                 <div class="w-75 d-inline-block v-middle">
    //                     <h6 class="mb-1 fw-semibold lh-base">${data.message}</h6>
    //                     <span class="fs-2 d-block text-body-secondary">Just now</span>
    //                     <span class="fs-1 badge fw-semibold bg-${data.status == 'approved' || data.status == 'completed' ? 'success' : 'warning'}-subtle text-${data.status == 'approved' || data.status == 'completed' ? 'success' : 'warning'} text-capitalize">${data.status}</span>
    //                 </div>
    //             </a>
    //         `;

    //         document.querySelector('.message-body').insertAdjacentHTML('afterbegin', notificationHtml);

    //         // Update notification count
    //         let notificationCount = document.getElementById('notificationCount');
    //         let currentCount = parseInt(notificationCount.textContent) || 0;
    //         notificationCount.textContent = currentCount + 1;
    //     });
</script>

</html>
