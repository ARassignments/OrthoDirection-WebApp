@extends('../index')
@section('content')
<!-- page-title -->
<section class="page-title p_relative centred">
    <div class="bg-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Pricing Plans</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Pricing Plans</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->

<link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/style6572.css?v1.5.0') }}">

<body class="nk-body" data-menu-collapse="lg">
    <main class="nk-pages">
        <section class="section">
            <div class="container">
                <div class="section-content">
                    <div class="pricing-toggle-wrap mb-5 pb-2 pricing-monthly">
                        <div class="h5 mb-0 pricing-toggle-text monthly">Monthly</div>
                        <div class="mx-3"><button class="pricing-toggle" data-parent="pricing-toggle-wrap"
                                data-target="pricing-toggle-content"><span class="pricing-toggle-ball"></span></button>
                        </div>
                        <div class="h5 mb-0 pricing-toggle-text yearly position-relative"> Yearly <span
                                class="badge text-bg-success-soft-outline fw-normal text-uppercase smaller rounded-pill position-absolute ms-n5 mb-2 mb-sm-0 ms-sm-3 translate-middle-sm-y start-100 bottom-100 bottom-sm-auto top-sm-50">Save
                                12%</span></div>
                    </div>
                    <div class="row g-gs">
                        <div class="col-xxl-4 col-xl-4">
                            <div class="pricing h-100 pricing-featured bg-gradient-primary wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div
                                    class="pricing-body h-100 p-5 pt-3 p-md-0 pt-md-0 p-xl-5 pt-xl-3 d-md-flex d-xl-block">
                                    <div class="text-center p-md-5 p-xl-0 w-md-50 w-xl-100">
                                        <div
                                            class="badge bg-gradient-primary bg-opacity-20 gradient-angle-90 mb-4 px-3 py-2 rounded-pill small text-primary text-tracking-1">
                                            <div class="p-1">Most Popurlar</div>
                                        </div>
                                        <h3 class="mb-3">Professional Plan</h3>
                                        <div class="pricing-price-wrap pricing-toggle-content show-monthly">
                                            <div class="pricing-price monthly">
                                                <h3 class="display-6 mb-3">$24.99 <span class="caption-text text-muted">
                                                        /
                                                        month</span></h3>
                                            </div>
                                            <div class="pricing-price yearly">
                                                <h3 class="display-6 mb-3">$249.99 <span
                                                        class="caption-text text-muted"> /
                                                        yearly</span></h3>
                                            </div>
                                        </div>
                                        <p class="fw-bold text-primary">Orthodontists, dental clinics, and
                                            professionals seeking advanced tools.
                                        </p>
                                        <div class="bg-light px-4 py-2 mb-4 smaller rounded-1">Try out all features to
                                            determine what works best for you</div>
                                        <div class="px-4 pricing-toggle-content">
                                            <div class="pricing-toggle-option"><a href="/payment"
                                                    class="btn btn-primary btn-block rounded-pill">Get Committed</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none d-md-block d-xl-none border-start h-100"></div>
                                    <div class="pt-4 p-md-5 p-xl-0 pt-xl-4 w-md-50 w-xl-100">
                                        <h5 class="fw-medium pb-1">Everything in Free, plus</h5>
                                        <ul class="list gy-3">
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Advanced Treatment Planning: </strong> Access to in-depth
                                                    tools for creating personalized
                                                    treatment plans.</span>
                                            </li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Full Access to Cephalometric:</strong> Unlimited access to
                                                    advanced Cephalometric tools and
                                                    case management.
                                                </span></li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Patient Management: </strong> Integrate and track patient
                                                    records, schedule appointments, and
                                                    follow-up care.</span></li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Priority Support:</strong> Direct access to support
                                                    teams.</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-6 order-xl-first">
                            <div class="h-100 pt-xl-6 wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="pricing h-100">
                                    <div class="pricing-body h-100 p-5">
                                        <div class="text-center">
                                            <h3 class="mb-3">Free Plan</h3>
                                            <h3 class="display-6 mb-3">$0 <span class="caption-text text-muted"> /
                                                    month</span></h3>
                                            <p class="fw-bold">Patients and individuals seeking basic orthodontic care
                                                and resources.</p>
                                            <div class="bg-light px-4 py-2 mb-4 smaller rounded-1">Try out all features
                                                to
                                                determine what works best for you</div>
                                            <div class="px-4"><a href="/payment"
                                                    class="btn btn-outline-primary btn-block rounded-pill">Start Writing
                                                    for
                                                    Free</a></div>
                                        </div>
                                        <h5 class="fw-medium pt-4 pb-1">Give a try for free</h5>
                                        <ul class="list gy-3">
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Basic Patient Tools:</strong> Basic treatment
                                                    recommendations, introductory educational
                                                    content, and limited access to Cephalometric</span>
                                            </li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Patient Dashboard:</strong> Track progress and manage
                                                    basic information.</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-md-6">
                            <div class="h-100 pt-xl-6 wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <div class="pricing h-100">
                                    <div class="pricing-body h-100 p-5">
                                        <div class="text-center">
                                            <h3 class="mb-3">Community Plan</h3>
                                            <div class="pricing-price-wrap pricing-toggle-content show-monthly">
                                                <div class="pricing-price monthly">
                                                    <h3 class="display-6 mb-3">$14.99 <span
                                                            class="caption-text text-muted"> /
                                                            month</span></h3>
                                                </div>
                                                <div class="pricing-price yearly">
                                                    <h3 class="display-6 mb-3">$149.99 <span
                                                            class="caption-text text-muted"> /
                                                            yearly</span></h3>
                                                </div>
                                            </div>
                                            <p class="fw-bold">Both patients and professionals who want to connect,
                                                learn, and network with
                                                a global community
                                            </p>
                                            <div class="bg-light px-4 py-2 mb-4 smaller rounded-1">Take your business
                                                to
                                                the another level with custom package and support.</div>
                                            <div class="px-4"><a href="/payment"
                                                    class="btn btn-outline-primary btn-block rounded-pill">Request for
                                                    Demo</a></div>
                                        </div>
                                        <h5 class="fw-medium pt-4 pb-1">Everything in Pro, plus</h5>
                                        <ul class="list gy-3">
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Community Networking:</strong> Connect with professionals
                                                    and patients for learning and
                                                    support.
                                                </span>
                                            </li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Exclusive Webinars and Events:</strong> Access to live
                                                    sessions with orthodontic experts.
                                                </span></li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Mentorship Program:</strong> Join mentorship groups and
                                                    get expert advice.
                                                </span></li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Exclusive Webinars and Events: </strong> Access to live
                                                    sessions with orthodontic experts.
                                                </span></li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Mentorship Program:</strong> Join mentorship groups and
                                                    get expert advice.
                                                </span></li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Resource Sharing:</strong> Access and contribute to shared
                                                    knowledge, case studies, and more.
                                                </span></li>
                                            <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                <span><strong>Discounts on Products and Courses:</strong> Special rates
                                                    for members on orthodontic
                                                    products and training.
                                                </span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
</body>
<script src="{{ asset('assets/dashboard/assets/js/bundle6572.js?v1.5.0') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/scripts6572.js?v1.5.0') }}"></script>

<!-- pricing-section -->
<section class="pricing-section sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="pricing-table">
                        <div class="shape" style="background-image: url(assets/images/shape/shape-22.png);"></div>
                        <div class="table-header">
                            <h5>Free Plan</h5>
                            <h2>Free</h2>
                            <span>Monthly</span>
                        </div>
                        <div class="table-content">
                            <ul class="feature-list clearfix">
                                <li>Basic Patient Tools:
                                    <p>Basic treatment recommendations, introductory educational
                                        content, and limited access to Cephalometric.</p>
                                </li>
                                <li>Patient Dashboard:
                                    <p>Track progress and manage basic information.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="table-footer">
                            <a href="index.html" class="theme-btn btn-three"><span>Choose Plan <i class="icon-25"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                <div class="pricing-block-one active-block wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="pricing-table">
                        <div class="shape" style="background-image: url(assets/images/shape/shape-22.png);"></div>
                        <div class="table-header">
                            <h5>Professional Plan</h5>
                            <h2>$24.99</h2>
                            <span>Monthly</span>
                        </div>
                        <div class="table-content">
                            <ul class="feature-list clearfix">
                                <li>Advanced Treatment Planning:
                                    <p>Access to in-depth tools for creating personalized
                                        treatment plans.</p>
                                </li>
                                <li>Full Access to Cephalometric:
                                    <p>Unlimited access to advanced Cephalometric tools and
                                        case management.</p>
                                </li>
                                <li>Patient Management:
                                    <p>Integrate and track patient records, schedule appointments, and
                                        follow-up care.</p>
                                </li>
                                <li>Priority Support:
                                    <p>Direct access to support teams.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="table-footer">
                            <a href="index.html" class="theme-btn btn-three"><span>Choose Plan <i class="icon-25"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="pricing-table">
                        <div class="shape" style="background-image: url(assets/images/shape/shape-22.png);"></div>
                        <div class="table-header">
                            <h5>Community Plan</h5>
                            <h2>$99.99</h2>
                            <span>Monthly</span>
                        </div>
                        <div class="table-content">
                            <ul class="feature-list clearfix">
                                <li>Community Networking:
                                    <p>Connect with professionals and patients for learning and support.</p>
                                </li>
                                <li>Exclusive Webinars and Events:
                                    <p>Access to live sessions with orthodontic experts.</p>
                                </li>
                                <li>Mentorship Program:
                                    <p>Join mentorship groups and get expert advice.</p>
                                </li>
                                <li>Exclusive Webinars and Events:
                                    <p>Access to live sessions with orthodontic experts.</p>
                                </li>
                                <li>Mentorship Program: 
                                    <p>Join mentorship groups and get expert advice.</p>
                                </li>
                                <li>Resource Sharing:
                                    <p>Access and contribute to shared knowledge, case studies, and more.</p>
                                </li>
                                <li>Discounts on Products and Courses:
                                    <p>Special rates for members on orthodontic products and training.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="table-footer">
                            <a href="index.html" class="theme-btn btn-three"><span>Choose Plan <i class="icon-25"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table>

        </table>
    </div>
</section>
<!-- pricing-section end -->
@endsection