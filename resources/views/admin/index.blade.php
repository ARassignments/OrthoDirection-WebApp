<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/dashboard_ui/assets/css/style2888.css?v1.0.0') }}">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body class="nk-body">
    <div class="nk-app-root" data-sidebar-collapse="lg">
        <div class="nk-main">
            <div class="nk-sidebar nk-sidebar-fixed" id="sidebar">
                <div class="nk-compact-toggle"><button
                        class="btn btn-xs btn-outline-light btn-icon compact-toggle text-light bg-white rounded-3"><em
                            class="icon off ni ni-chevron-left"></em><em
                            class="icon on ni ni-chevron-right"></em></button></div>
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand"><a href="/" class="logo-link">
                            <div class="logo-wrap"><img class="logo-img logo-dark"
                                    src="{{ asset('assets/images/logo.png') }}" alt=""><img
                                    class="logo-img logo-icon" src="{{ asset('assets/images/logo.png') }}"
                                    alt=""></div>
                        </a></div>
                </div>
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content h-100 simplebar-scrollable-y" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                        aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            <div class="nk-sidebar-menu">
                                                <ul class="nk-menu">
                                                    <li class="nk-menu-item active current-page"><a href="index-2.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon"><em
                                                                    class="icon ni ni-dashboard-fill"></em></span><span
                                                                class="nk-menu-text">Dashboard</span></a></li>
                                                    <li class="nk-menu-item has-sub"><a href="#"
                                                            class="nk-menu-link nk-menu-toggle"><span
                                                                class="nk-menu-icon"><em
                                                                    class="icon ni ni-folder-list"></em></span><span
                                                                class="nk-menu-text">Documents</span></a>
                                                        <ul class="nk-menu-sub">
                                                            <li class="nk-menu-item"><a href="document-saved.html"
                                                                    class="nk-menu-link"><span
                                                                        class="nk-menu-text">Saved</span></a></li>
                                                            <li class="nk-menu-item"><a href="document-drafts.html"
                                                                    class="nk-menu-link"><span
                                                                        class="nk-menu-text">Drafts</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="nk-menu-item has-sub"><a href="#"
                                                            class="nk-menu-link nk-menu-toggle"><span
                                                                class="nk-menu-icon"><em
                                                                    class="icon ni ni-edit"></em></span><span
                                                                class="nk-menu-text">Editor</span></a>
                                                        <ul class="nk-menu-sub">
                                                            <li class="nk-menu-item"><a href="document-editor.html"
                                                                    class="nk-menu-link"><span
                                                                        class="nk-menu-text">New</span></a></li>
                                                            <li class="nk-menu-item"><a
                                                                    href="document-editor-generate.html"
                                                                    class="nk-menu-link"><span
                                                                        class="nk-menu-text">Generate</span></a></li>
                                                            <li class="nk-menu-item"><a href="document-editor-edit.html"
                                                                    class="nk-menu-link"><span
                                                                        class="nk-menu-text">Edit</span></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="nk-menu-item"><a href="templates.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon"><em
                                                                    class="icon ni ni-layers"></em></span><span
                                                                class="nk-menu-text">Templates</span></a></li>
                                                    <li class="nk-menu-item"><a href="history.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon"><em
                                                                    class="icon ni ni-clock"></em></span><span
                                                                class="nk-menu-text">History</span></a></li>
                                                    <li class="nk-menu-item"><a href="pricing-plans.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon"><em
                                                                    class="icon ni ni-sign-usdc"></em></span><span
                                                                class="nk-menu-text">Pricing Plans</span></a></li>
                                                    <li class="nk-menu-item"><a href="profile.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon"><em
                                                                    class="icon ni ni-user"></em></span><span
                                                                class="nk-menu-text">Profile</span></a></li>
                                                    <li class="nk-menu-item"><a href="payment.html" target="_blank"
                                                            class="nk-menu-link"><span class="nk-menu-icon"><em
                                                                    class="icon ni ni-wallet"></em></span><span
                                                                class="nk-menu-text">Payments</span></a></li>
                                                    <li class="nk-menu-item has-sub"><a href="#"
                                                            class="nk-menu-link nk-menu-toggle"><span
                                                                class="nk-menu-icon"><em
                                                                    class="icon ni ni-signin"></em></span><span
                                                                class="nk-menu-text">Auth Pages</span></a>
                                                        <ul class="nk-menu-sub">
                                                            <li class="nk-menu-item"><a href="login.html"
                                                                    target="_blank" class="nk-menu-link"><span
                                                                        class="nk-menu-text">Login</span></a></li>
                                                            <li class="nk-menu-item"><a href="create-account.html"
                                                                    target="_blank" class="nk-menu-link"><span
                                                                        class="nk-menu-text">Register</span></a></li>
                                                            <li class="nk-menu-item"><a href="forgot-password.html"
                                                                    target="_blank" class="nk-menu-link"><span
                                                                        class="nk-menu-text">Forgot Password</span></a>
                                                            </li>
                                                            <li class="nk-menu-item"><a href="check-email.html"
                                                                    target="_blank" class="nk-menu-link"><span
                                                                        class="nk-menu-text">Check Email</span></a>
                                                            </li>
                                                            <li class="nk-menu-item"><a href="verify-email.html"
                                                                    target="_blank" class="nk-menu-link"><span
                                                                        class="nk-menu-text">Verify Email</span></a>
                                                            </li>
                                                            <li class="nk-menu-item"><a href="email-verified.html"
                                                                    target="_blank" class="nk-menu-link"><span
                                                                        class="nk-menu-text">Email Verified</span></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="nk-menu-heading">
                                                        <h6 class="overline-title">Components</h6>
                                                    </li>
                                                    <li class="nk-menu-item"><a href="component-buttons.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-view-grid-wd"></em></span><span
                                                                class="nk-menu-text">Buttons</span></a></li>
                                                    <li class="nk-menu-item"><a href="component-badges.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-ticket"></em></span><span
                                                                class="nk-menu-text">Badges</span></a></li>
                                                    <li class="nk-menu-item"><a href="component-alert.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-alert"></em></span><span
                                                                class="nk-menu-text">Alert</span></a></li>
                                                    <li class="nk-menu-item"><a href="component-dropdown.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-notify"></em></span><span
                                                                class="nk-menu-text">Dropdown</span></a></li>
                                                    <li class="nk-menu-item has-sub"><a href="#"
                                                            class="nk-menu-link nk-menu-toggle"><span
                                                                class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-todo"></em></span><span
                                                                class="nk-menu-text">Forms</span></a>
                                                        <ul class="nk-menu-sub">
                                                            <li class="nk-menu-item"><a
                                                                    href="component-form-basic.html"
                                                                    class="nk-menu-link"><span
                                                                        class="nk-menu-text">Form Basic</span></a></li>
                                                            <li class="nk-menu-item"><a
                                                                    href="component-form-advanced.html"
                                                                    class="nk-menu-link"><span
                                                                        class="nk-menu-text">Form Advanced</span></a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="nk-menu-item"><a href="component-tabs.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-browser"></em></span><span
                                                                class="nk-menu-text">Tabs</span></a></li>
                                                    <li class="nk-menu-item"><a href="component-modals.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-property"></em></span><span
                                                                class="nk-menu-text">Modal</span></a></li>
                                                    <li class="nk-menu-item"><a href="component-popover-tooltip.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-chat"></em></span><span
                                                                class="nk-menu-text">Popover &amp; Tooltips</span></a>
                                                    </li>
                                                    <li class="nk-menu-item"><a href="component-accordion.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-view-x7"></em></span><span
                                                                class="nk-menu-text">Accordion</span></a></li>
                                                    <li class="nk-menu-item"><a href="component-card.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-card-view"></em></span><span
                                                                class="nk-menu-text">Card</span></a></li>
                                                    <li class="nk-menu-item"><a href="component-offcanvas.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-layout-alt"></em></span><span
                                                                class="nk-menu-text">Offcanvas</span></a></li>
                                                    <li class="nk-menu-item"><a href="component-toasts.html"
                                                            class="nk-menu-link"><span class="nk-menu-icon is-alt"><em
                                                                    class="icon ni ni-block-over"></em></span><span
                                                                class="nk-menu-text">Toasts</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: 260px; height: 1107px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 86px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                        </div>
                    </div>
                </div>
                <div class="nk-sidebar-element nk-sidebar-footer">
                    <div class="nk-sidebar-footer-extended pt-3">
                        <div class="border border-light rounded-3">
                            <div class="px-3 py-2 bg-white border-bottom border-light rounded-top-3">
                                <div class="d-flex flex-wrap align-items-center justify-content-between">
                                    <h6 class="lead-text">Free Plan</h6><a class="link link-primary"
                                        href="pricing-plans.html"><em
                                            class="ni ni-spark-fill icon text-warning"></em><span>Upgrade</span></a>
                                </div>
                                <div class="progress progress-md">
                                    <div class="progress-bar" data-progress="25%" style="width: 25%;"></div>
                                </div>
                                <h6 class="lead-text mt-2">1,360 <span class="text-light">words left</span></h6>
                            </div><a class="d-flex px-3 py-2 bg-primary bg-opacity-10 rounded-bottom-3"
                                href="profile.html">
                                <div class="media-group">
                                    <div class="media media-sm media-middle media-circle text-bg-primary"><img
                                            src="{{ asset('assets/dashboard_ui/images/avatar/a.png')}}"></div>
                                    <div class="media-text">
                                        <h6 class="fs-6 mb-0">Shawn Mahbub</h6><span
                                            class="text-light fs-7">shawn@websbd.com</span>
                                    </div><em class="icon ni ni-chevron-right ms-auto ps-1"></em>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-wrap">
                <div class="nk-header nk-header-fixed">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-header-logo ms-n1">
                                <div class="nk-sidebar-toggle me-1"><button
                                        class="btn btn-sm btn-zoom btn-icon sidebar-toggle d-sm-none"><em
                                            class="icon ni ni-menu"> </em></button><button
                                        class="btn btn-md btn-zoom btn-icon sidebar-toggle d-none d-sm-inline-flex"><em
                                            class="icon ni ni-menu"> </em></button></div><a href="/"
                                    class="logo-link">
                                    <div class="logo-wrap"><img class="logo-img logo-light" src="images/logo.png"
                                            srcset="https://copygen.themenio.com/dashboard/images/logo2x.png 2x"
                                            alt=""><img class="logo-img logo-dark" src="images/logo-dark.png"
                                            srcset="https://copygen.themenio.com/dashboard/images/logo-dark2x.png 2x"
                                            alt=""><img class="logo-img logo-icon" src="images/logo-icon.png"
                                            srcset="https://copygen.themenio.com/dashboard/images/logo-icon2x.png 2x"
                                            alt=""></div>
                                </a>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav ms-2">
                                    <li class="dropdown d-inline-flex"><a data-bs-toggle="dropdown"
                                            class="d-inline-flex" href="#">
                                            <div class="media media-md media-circle media-middle text-bg-primary"><img
                                                    src="{{ asset('assets/dashboard_ui/images/avatar/a.png')}}"></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md rounded-3">
                                            <div class="dropdown-content py-3">
                                                <div class="border border-light rounded-3">
                                                    <div
                                                        class="px-3 py-2 bg-white border-bottom border-light rounded-top-3">
                                                        <div
                                                            class="d-flex flex-wrap align-items-center justify-content-between">
                                                            <h6 class="lead-text">Free Plan</h6><a
                                                                class="link link-primary" href="#"><em
                                                                    class="ni ni-spark-fill icon text-warning"></em><span>Upgrade</span></a>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar" data-progress="25%"
                                                                style="width: 25%;"></div>
                                                        </div>
                                                        <h6 class="lead-text mt-2">1,360 <span
                                                                class="text-light">words left</span></h6>
                                                    </div><a
                                                        class="d-flex px-3 py-2 bg-primary bg-opacity-10 rounded-bottom-3"
                                                        href="profile.html">
                                                        <div class="media-group">
                                                            <div
                                                                class="media media-sm media-middle media-circle text-bg-primary">
                                                                <img src="{{ asset('assets/dashboard_ui/images/avatar/a.png')}}">
                                                            </div>
                                                            <div class="media-text">
                                                                <h6 class="fs-6 mb-0">Shawn Mahbub</h6><span
                                                                    class="text-light fs-7">shawn@websbd.com</span>
                                                            </div><em
                                                                class="icon ni ni-chevron-right ms-auto ps-1"></em>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-content">
                    <div class="container-xl">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-page-head">
                                    <div class="nk-block-head-between">
                                        <div class="nk-block-head-content">
                                            <h2 class="display-6">Welcome Admin!</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-sm-6 col-xxl-3">
                                            <div class="card card-full bg-purple bg-opacity-10 border-0">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mb-1">
                                                        <div class="fs-6 text-light mb-0">Words Available</div><a
                                                            href="history.html" class="link link-purple">See
                                                            History</a>
                                                    </div>
                                                    <h5 class="fs-1">452 <small class="fs-3">words</small></h5>
                                                    <div class="fs-7 text-light mt-1"><span
                                                            class="text-dark">1548</span>/2000 free words generated
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xxl-3">
                                            <div class="card card-full bg-blue bg-opacity-10 border-0">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mb-1">
                                                        <div class="fs-6 text-light mb-0">Drafts Available</div><a
                                                            href="document-drafts.html" class="link link-blue">See
                                                            All</a>
                                                    </div>
                                                    <h5 class="fs-1">3 <small class="fs-3">Drafts</small></h5>
                                                    <div class="fs-7 text-light mt-1"><span
                                                            class="text-dark">7</span>/10 free drafts created</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xxl-3">
                                            <div class="card card-full bg-indigo bg-opacity-10 border-0">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mb-1">
                                                        <div class="fs-6 text-light mb-0">Documents Available</div><a
                                                            href="document-saved.html" class="link link-indigo">See
                                                            All</a>
                                                    </div>
                                                    <h5 class="fs-1">6 <small class="fs-3">Documents</small></h5>
                                                    <div class="fs-7 text-light mt-1"><span
                                                            class="text-dark">4</span>/10 free documents created</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xxl-3">
                                            <div class="card card-full bg-cyan bg-opacity-10 border-0">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex align-items-center justify-content-between mb-1">
                                                        <div class="fs-6 text-light mb-0">Tools Available</div><a
                                                            href="templates.html" class="link link-cyan">All Tools</a>
                                                    </div>
                                                    <h5 class="fs-1">12 <small class="fs-3">Tools</small></h5>
                                                    <div class="fs-7 text-light mt-1"><span
                                                            class="text-dark">4</span>/16 free tools used to generate
                                                        content</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-between">
                                        <div class="nk-block-head-content">
                                            <h2 class="display-6">Popular Templates</h2>
                                        </div>
                                        <div class="nk-block-head-content"><a href="templates.html"
                                                class="link">Explore All</a></div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-sm-6 col-xxl-3">
                                            <div class="card card-full">
                                                <div class="card-body">
                                                    <div
                                                        class="media media-rg media-middle media-circle text-primary bg-primary bg-opacity-20 mb-3">
                                                        <em class="icon ni ni-bulb-fill"></em>
                                                    </div>
                                                    <h5 class="fs-4 fw-medium">Blog Ideas</h5>
                                                    <p class="small text-light">Produce trendy blog ideas for your
                                                        business that engages.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xxl-3">
                                            <div class="card card-full">
                                                <div class="card-body">
                                                    <div class="position-absolute end-0 top-0 me-4 mt-4">
                                                        <div class="badge text-bg-dark rounded-pill text-uppercase">New
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="media media-rg media-middle media-circle text-blue bg-blue bg-opacity-20 mb-3">
                                                        <em class="icon ni ni-spark-fill"></em>
                                                    </div>
                                                    <h5 class="fs-4 fw-medium">Social Media Posts</h5>
                                                    <p class="small text-light">Creative and engaging social media post
                                                        for your brand.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xxl-3">
                                            <div class="card card-full">
                                                <div class="card-body">
                                                    <div
                                                        class="media media-rg media-middle media-circle text-red bg-red bg-opacity-20 mb-3">
                                                        <em class="icon ni ni-youtube-fill"></em>
                                                    </div>
                                                    <h5 class="fs-4 fw-medium">YouTube Tags Generator</h5>
                                                    <p class="small text-light">Generate SEO optimized tags/keywords
                                                        for your YouTube video.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xxl-3">
                                            <div class="card card-full">
                                                <div class="card-body">
                                                    <div
                                                        class="media media-rg media-middle media-circle text-purple bg-purple bg-opacity-20 mb-3">
                                                        <em class="icon ni ni-laptop"></em>
                                                    </div>
                                                    <h5 class="fs-4 fw-medium">Website Headlines/Copy</h5>
                                                    <p class="small text-light">Generate professional copy for your
                                                        website that converts users.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-between">
                                        <div class="nk-block-head-content">
                                            <h2 class="display-6">Recent Documents</h2>
                                        </div>
                                        <div class="nk-block-head-content"><a href="document-saved.html"
                                                class="link"><span>See All</span> <em
                                                    class="icon ni ni-chevron-right"></em></a></div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="card">
                                        <table class="table table-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th class="tb-col tb-col-check">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" value=""></div>
                                                    </th>
                                                    <th class="tb-col">
                                                        <h6 class="overline-title">Name</h6>
                                                    </th>
                                                    <th class="tb-col tb-col-sm">
                                                        <h6 class="overline-title">Type</h6>
                                                    </th>
                                                    <th class="tb-col tb-col-md">
                                                        <h6 class="overline-title">Last Modified</h6>
                                                    </th>
                                                    <th class="tb-col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="tb-col tb-col-check">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" value=""></div>
                                                    </td>
                                                    <td class="tb-col">
                                                        <div class="caption-text">The Impact of Artificial Intelligence
                                                            on the Future of Work</div>
                                                    </td>
                                                    <td class="tb-col tb-col-sm">
                                                        <div
                                                            class="badge text-bg-dark-soft rounded-pill px-2 py-1 fs-6 lh-sm">
                                                            Document</div>
                                                    </td>
                                                    <td class="tb-col tb-col-md">
                                                        <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2">
                                                            <span>Feb 15,2023 </span> <span>02:31 PM</span>
                                                        </div>
                                                    </td>
                                                    <td class="tb-col tb-col-end">
                                                        <div class="dropdown"><button
                                                                class="btn btn-sm btn-icon btn-zoom me-n1"
                                                                type="button" data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <div class="dropdown-content">
                                                                    <ul
                                                                        class="link-list link-list-hover-bg-primary link-list-md">
                                                                        <li><a href="#l"><em
                                                                                    class="icon ni ni-eye"></em><span>View
                                                                                    Document</span></a></li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-edit"></em><span>Rename</span></a>
                                                                        </li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-trash"></em><span>Move
                                                                                    to Trash</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tb-col tb-col-check">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" value=""></div>
                                                    </td>
                                                    <td class="tb-col">
                                                        <div class="caption-text">How to Boost Your Online Presence
                                                            with Social Media Marketing</div>
                                                    </td>
                                                    <td class="tb-col tb-col-sm">
                                                        <div
                                                            class="badge text-bg-blue-soft rounded-pill px-2 py-1 fs-6 lh-sm">
                                                            Social Media</div>
                                                    </td>
                                                    <td class="tb-col tb-col-md">
                                                        <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2">
                                                            <span>Feb 15,2023 </span> <span>02:31 PM</span>
                                                        </div>
                                                    </td>
                                                    <td class="tb-col tb-col-end">
                                                        <div class="dropdown"><button
                                                                class="btn btn-sm btn-icon btn-zoom me-n1"
                                                                type="button" data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <div class="dropdown-content">
                                                                    <ul
                                                                        class="link-list link-list-hover-bg-primary link-list-md">
                                                                        <li><a href="#l"><em
                                                                                    class="icon ni ni-eye"></em><span>View
                                                                                    Document</span></a></li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-edit"></em><span>Rename</span></a>
                                                                        </li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-trash"></em><span>Move
                                                                                    to Trash</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tb-col tb-col-check">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" value=""></div>
                                                    </td>
                                                    <td class="tb-col">
                                                        <div class="caption-text">Top 10 Tips for Effective Time
                                                            Management in the Workplace</div>
                                                    </td>
                                                    <td class="tb-col tb-col-sm">
                                                        <div
                                                            class="badge text-bg-primary-soft rounded-pill px-2 py-1 fs-6 lh-sm">
                                                            Blog Content</div>
                                                    </td>
                                                    <td class="tb-col tb-col-md">
                                                        <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2">
                                                            <span>Feb 15,2023 </span> <span>02:31 PM</span>
                                                        </div>
                                                    </td>
                                                    <td class="tb-col tb-col-end">
                                                        <div class="dropdown"><button
                                                                class="btn btn-sm btn-icon btn-zoom me-n1"
                                                                type="button" data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <div class="dropdown-content">
                                                                    <ul
                                                                        class="link-list link-list-hover-bg-primary link-list-md">
                                                                        <li><a href="#l"><em
                                                                                    class="icon ni ni-eye"></em><span>View
                                                                                    Document</span></a></li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-edit"></em><span>Rename</span></a>
                                                                        </li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-trash"></em><span>Move
                                                                                    to Trash</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tb-col tb-col-check">
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" value=""></div>
                                                    </td>
                                                    <td class="tb-col">
                                                        <div class="caption-text">Transforming Healthcare with Big
                                                            Data: Exploring the Opportunities</div>
                                                    </td>
                                                    <td class="tb-col tb-col-sm">
                                                        <div
                                                            class="badge text-bg-purple-soft rounded-pill px-2 py-1 fs-6 lh-sm">
                                                            Website Copy &amp; SEO</div>
                                                    </td>
                                                    <td class="tb-col tb-col-md">
                                                        <div class="fs-6 text-light d-inline-flex flex-wrap gap gx-2">
                                                            <span>Feb 15,2023 </span> <span>02:31 PM</span>
                                                        </div>
                                                    </td>
                                                    <td class="tb-col tb-col-end">
                                                        <div class="dropdown"><button
                                                                class="btn btn-sm btn-icon btn-zoom me-n1"
                                                                type="button" data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <div class="dropdown-content">
                                                                    <ul
                                                                        class="link-list link-list-hover-bg-primary link-list-md">
                                                                        <li><a href="#l"><em
                                                                                    class="icon ni ni-eye"></em><span>View
                                                                                    Document</span></a></li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-edit"></em><span>Rename</span></a>
                                                                        </li>
                                                                        <li><a href="#"><em
                                                                                    class="icon ni ni-trash"></em><span>Move
                                                                                    to Trash</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-footer">
                    <div class="container-xl">
                        <div class="d-flex align-items-center flex-wrap justify-content-between mx-n3">
                            <div class="nk-footer-links px-3">
                                <ul class="nav nav-sm">
                                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                                    <li class="nav-item"><a class="nav-link" href="../index-2.html#">Privacy
                                            Policy</a></li>
                                    <li class="nav-item"><a class="nav-link" href="../index-2.html#">FAQ</a></li>
                                    <li class="nav-item"><a class="nav-link" href="../index-2.html#">Contact</a></li>
                                </ul>
                            </div>
                            <div class="nk-footer-copyright fs-6 px-3"> © 2023 All Rights Reserved to <a
                                    href="#">Copygen</a>. </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('assets/dashboard_ui/assets/js/bundle2888.js?v1.0.0') }}"></script>
<script src="{{ asset('assets/dashboard_ui/assets/js/scripts2888.js?v1.0.0') }}"></script>

</html>