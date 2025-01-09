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
                            <div class="col-xxl-3 col-xl-3">
                                <div class="h-100 pt-xl-6 wow fadeInUp animated" data-wow-delay="600ms"
                                    data-wow-duration="1500ms">
                                    <div class="pricing h-100">
                                        <div
                                            class="pricing-body h-100 p-5 pt-3 p-md-0 pt-md-0 p-xl-5 pt-xl-3 d-md-flex d-xl-block">
                                            <div class="text-center p-md-5 p-xl-0 pt-xl-3 w-md-50 w-xl-100">
                                                <h3 class="mb-3">Standard Plan</h3>
                                                <div class="pricing-price-wrap pricing-toggle-content show-monthly">
                                                    <div class="pricing-price monthly">
                                                        <h3 class="display-6 mb-3 fs-2">$14.99 <span
                                                                class="caption-text text-muted"> /
                                                                month</span></h3>
                                                    </div>
                                                    <div class="pricing-price yearly">
                                                        <h3 class="display-6 mb-3 fs-2">$149.99 <span
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
                                                <div class="px-0"><a href="/payment"
                                                        class="btn btn-outline-primary btn-block rounded-pill">Choose This Plan</a></div>
                                            </div>
                                            <div class="d-none d-md-block d-xl-none border-start h-100"></div>
                                            <div class="pt-4 p-md-5 p-xl-0 pt-xl-4 w-md-50 w-xl-100">
                                                <h5 class="fw-medium pb-1">Everything in Free, Plus</h5>
                                                <ul class="list gy-3">
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Advertisements</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Patient Management</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>AI-Powered Cephalometric Analysis</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Diagnosis and Treatment Planning</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Doctor-Patient Communication</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Augmented Reality Visualization</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Reporting and Analytics</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Image Management</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Wearable Device Integration</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3">
                                <div class="pricing h-100 pricing-featured bg-gradient-primary wow fadeInUp animated"
                                    data-wow-delay="00ms" data-wow-duration="1500ms">
                                    <div
                                        class="pricing-body h-100 p-5 pt-3 p-md-0 pt-md-0 p-xl-5 pt-xl-3 d-md-flex d-xl-block">
                                        <div class="text-center p-md-5 p-xl-0 w-md-50 w-xl-100">
                                            <div
                                                class="badge bg-gradient-primary bg-opacity-20 gradient-angle-90 mb-4 px-3 py-2 rounded-pill small text-primary text-tracking-1">
                                                <div class="p-1">Most Popurlar</div>
                                            </div>
                                            <h3 class="mb-3">Premium Plan</h3>
                                            <div class="pricing-price-wrap pricing-toggle-content show-monthly">
                                                <div class="pricing-price monthly">
                                                    <h3 class="display-6 mb-3 fs-2">$24.99 <span
                                                            class="caption-text text-muted">
                                                            /
                                                            month</span></h3>
                                                </div>
                                                <div class="pricing-price yearly">
                                                    <h3 class="display-6 mb-3 fs-2">$249.99 <span
                                                            class="caption-text text-muted"> /
                                                            yearly</span></h3>
                                                </div>
                                            </div>
                                            <p class="fw-bold text-primary">Orthodontists, dental clinics, and
                                                professionals seeking advanced tools.
                                            </p>
                                            <div class="bg-light px-4 py-2 mb-4 smaller rounded-1">Try out all features to
                                                determine what works best for you</div>
                                            <div class="px-0 pricing-toggle-content">
                                                <div class="pricing-toggle-option"><a href="/payment"
                                                        class="btn btn-primary btn-block rounded-pill">Choose This Plan</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-none d-md-block d-xl-none border-start h-100"></div>
                                        <div class="pt-4 p-md-5 p-xl-0 pt-xl-4 w-md-50 w-xl-100">
                                            <h5 class="fw-medium pb-1">Everything in Pro, Plus</h5>
                                            <ul class="list gy-3">
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>Advertisements</span>
                                                </li>
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>Patient Management</span>
                                                </li>
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>AI-Powered Cephalometric Analysis</span>
                                                </li>
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>Diagnosis and Treatment Planning</span>
                                                </li>
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>Doctor-Patient Communication</span>
                                                </li>
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>Augmented Reality Visualization</span>
                                                </li>
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>Reporting and Analytics</span>
                                                </li>
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>Image Management</span>
                                                </li>
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>Wearable Device Integration</span>
                                                </li>
                                                <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                    <span>Custom Branding</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3 order-xl-first">
                                <div class="h-100 pt-xl-6 wow fadeInUp animated" data-wow-delay="300ms"
                                    data-wow-duration="1500ms">
                                    <div class="pricing h-100">
                                        <div
                                            class="pricing-body h-100 p-5 pt-3 p-md-0 pt-md-0 p-xl-5 pt-xl-3 d-md-flex d-xl-block">
                                            <div class="text-center p-md-5 p-xl-0 pt-xl-3 w-md-50 w-xl-100">
                                                <h3 class="mb-3">Free Plan</h3>
                                                <h3 class="display-6 mb-3 fs-2">$0 <span class="caption-text text-muted">
                                                        /
                                                        month</span></h3>
                                                <p class="fw-bold">Patients and individuals seeking basic orthodontic care
                                                    and resources.</p>
                                                <div class="bg-light px-4 py-2 mb-4 smaller rounded-1">Try out all features
                                                    to
                                                    determine what works best for you</div>
                                                <div class="px-0"><a href="/payment"
                                                        class="btn btn-outline-primary btn-block rounded-pill">Choose This Plan</a></div>
                                            </div>
                                            <div class="d-none d-md-block d-xl-none border-start h-100"></div>
                                            <div class="pt-4 p-md-5 p-xl-0 pt-xl-4 w-md-50 w-xl-100">
                                                <h5 class="fw-medium pb-1">Give a try for free</h5>
                                                <ul class="list gy-3">
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Advertisements</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Patient Management</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>AI-Powered Cephalometric Analysis</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Diagnosis and Treatment Planning</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Doctor-Patient Communication</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Augmented Reality Visualization</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Reporting and Analytics</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Image Management</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Wearable Device Integration</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-3">
                                <div class="h-100 pt-xl-6 wow fadeInUp animated" data-wow-delay="600ms"
                                    data-wow-duration="1500ms">
                                    <div class="pricing h-100">
                                        <div
                                            class="pricing-body h-100 p-5 pt-3 p-md-0 pt-md-0 p-xl-5 pt-xl-3 d-md-flex d-xl-block">
                                            <div class="text-center p-md-5 p-xl-0 pt-xl-3 w-md-50 w-xl-100">
                                                <h3 class="mb-3">Enterprise Plan</h3>
                                                <div class="pricing-price-wrap pricing-toggle-content show-monthly">
                                                    <div class="pricing-price monthly">
                                                        <h3 class="display-6 mb-3 fs-2">$14.99 <span
                                                                class="caption-text text-muted"> /
                                                                month</span></h3>
                                                    </div>
                                                    <div class="pricing-price yearly">
                                                        <h3 class="display-6 mb-3 fs-2">$149.99 <span
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
                                                <div class="px-0"><a href="/payment"
                                                        class="btn btn-outline-primary btn-block rounded-pill">Choose This Plan</a></div>
                                            </div>
                                            <div class="d-none d-md-block d-xl-none border-start h-100"></div>
                                            <div class="pt-4 p-md-5 p-xl-0 pt-xl-4 w-md-50 w-xl-100">
                                                <h5 class="fw-medium pb-1">Everything in Elite, Plus</h5>
                                                <ul class="list gy-3">
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Advertisements</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Patient Management</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>AI-Powered Cephalometric Analysis</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Diagnosis and Treatment Planning</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Doctor-Patient Communication</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Augmented Reality Visualization</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Reporting and Analytics</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Image Management</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Wearable Device Integration</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Custom Branding</span>
                                                    </li>
                                                    <li><em class="icon fs-4 ni ni-check-circle-fill text-primary"></em>
                                                        <span>Case Sharing</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <section class="sidebar-page-container pt-5">
                            <div class="blog-details-content">
                                <div class="news-block-one">
                                    <div class="inner-box">
                                        <div class="lower-content" style="border-radius: 20px !important;">
                                            <h2>Compare Plans for OrthoDirection</h2>
                                            <p>
                                                OrthoDirection offers tailored plans designed to cater to the unique needs of Doctors, Patients, and Family Members. Each plan provides access to essential features such as patient management, advertisements, and AI-powered tools for cephalometric analysis, ensuring a seamless and efficient orthodontic experience. Choose the plan that best suits your role and enjoy a comprehensive, user-friendly platform built for optimal results and convenience.
                                            </p>


                                            <ul class="nav nav-pills nav-justified mb-4 gap-3" role="tablist">
                                                <li class="nav-item" role="presentation"><button
                                                        class="nav-link active d-flex justify-content-center rounded-pill"
                                                        data-bs-toggle="pill" data-bs-target="#pills-free" type="button"
                                                        aria-selected="true" role="tab">Free Plan</button></li>
                                                <li class="nav-item" role="presentation"><button
                                                        class="nav-link d-flex justify-content-center rounded-pill"
                                                        data-bs-toggle="pill" data-bs-target="#pills-standard"
                                                        type="button" aria-selected="false" role="tab"
                                                        tabindex="-1">Standard Plan</button></li>
                                                <li class="nav-item" role="presentation"><button
                                                        class="nav-link d-flex justify-content-center rounded-pill"
                                                        data-bs-toggle="pill" data-bs-target="#pills-premium"
                                                        type="button" aria-selected="false" role="tab"
                                                        tabindex="-1">Premium Plan</button></li>
                                                <li class="nav-item" role="presentation"><button
                                                        class="nav-link d-flex justify-content-center rounded-pill"
                                                        data-bs-toggle="pill" data-bs-target="#pills-enterprise"
                                                        type="button" aria-selected="false" tabindex="-1"
                                                        role="tab">Enterprise Plan</button></li>
                                            </ul>
                                            <div class="tab-content shadow-lg rounded-5 overflow-x-hidden p-4">
                                                <div class="tab-pane fade active show" id="pills-free" role="tabpanel">
                                                    <h3 class="mb-2">Free Plan</h3>
                                                    <p>Patients and individuals seeking basic orthodontic care and
                                                        resources.</p>
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table text-center align-middle table-hover rounded-3">
                                                            <thead class="table-bordered">
                                                                <tr>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Feature</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Doctor</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Patient</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Family Members</h5>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Advertisements</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p><strong>Ads included</strong> across
                                                                            the platform</p>
                                                                    </td>
                                                                    <td>
                                                                        <p><strong>Ads included</strong> while accessing
                                                                            features</p>
                                                                    </td>
                                                                    <td>
                                                                        <p><strong>Ads included</strong> during
                                                                            access</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Patient Management</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Create and view up to 5 patient profiles</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View and edit personal profile</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View limited treatment progress updates</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>AI-Powered Cephalometric
                                                                                Analysis</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Analyze up to 5 X-rays monthly with basic AI
                                                                            tracing tools</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Not available</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Not available</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Diagnosis and Treatment Planning</strong>
                                                                        </p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Create basic treatment plans</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View personalized treatment milestones</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View basic milestones for treatment</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Doctor-Patient Communication</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Secure messaging with up to 5 patients</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Messaging with doctor</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Messaging with doctor</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Augmented Reality Visualization</strong>
                                                                        </p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Limited 3D smile simulation for up to 5 cases</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Limited simulation access</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Not available</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Reporting and Analytics</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Basic reporting for up to 5 patients</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Basic progress report</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View summarized updates</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Image Management</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Upload and manage up to 25 clinical images</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View images related to your treatment</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Not available</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Wearable Device Integration</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>View compliance data for up to 5 patients</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Sync wearable data</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View compliance updates</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-standard" role="tabpanel">
                                                    <h3 class="mb-2">Standard Plan</h3>
                                                    <p>Both patients and professionals who want to connect, learn, and
                                                        network with a global community</p>
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table text-center align-middle table-hover rounded-3">
                                                            <thead class="table-bordered">
                                                                <tr>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Feature</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Doctor</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Patient</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Family Members</h5>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Advertisements</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p><strong>No Ads</strong> – Ad-free platform</p>
                                                                    </td>
                                                                    <td>
                                                                        <p><strong>No Ads</strong> – Fully ad-free interface
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p><strong>No Ads</strong> – Family-friendly,
                                                                            ad-free platform</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Patient Management</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Create and manage up to 20 patient profiles</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full profile access and editing</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View progress and educational materials</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>AI-Powered Cephalometric
                                                                                Analysis</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Analyze up to 20 X-rays monthly with advanced AI
                                                                            tools</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access X-ray reports and basic insights</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View simplified progress updates</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Diagnosis and Treatment Planning</strong>
                                                                        </p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Advanced treatment planning tools for braces and
                                                                            Invisalign</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View detailed treatment timelines</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access full treatment milestone breakdown</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Doctor-Patient Communication</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Secure messaging and virtual consultations</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Messaging and video consultations with the doctor
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Join consultations</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Augmented Reality Visualization</strong>
                                                                        </p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Full 3D smile simulation for treatment planning
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access full simulation features</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View treatment visuals and learn about procedures
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Reporting and Analytics</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Advanced reporting for all patients</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Comprehensive reports on treatment progress</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Detailed progress and compliance tracking</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Image Management</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Manage up to 50 clinical images and annotate them
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access annotated images for treatment</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View progress images shared by the patient</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Wearable Device Integration</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Track compliance data for multiple patients</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full integration with wearable alerts</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View reminders and alerts for compliance</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-premium" role="tabpanel">
                                                    <h3 class="mb-2">Premium Plan</h3>
                                                    <p>Orthodontists, dental clinics, and professionals seeking advanced
                                                        tools.</p>
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table text-center align-middle table-hover rounded-3">
                                                            <thead class="table-bordered">
                                                                <tr>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Feature</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Doctor</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Patient</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Family Members</h5>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Advertisements</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p><strong>No Ads</strong> – Completely ad-free</p>
                                                                    </td>
                                                                    <td>
                                                                        <p><strong>No Ads</strong> – Premium user experience
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p><strong>No Ads</strong> – Ad-free for all users
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Patient Management</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Unlimited patient profiles</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full profile access and editing</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full access to progress tracking and milestones
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>AI-Powered Cephalometric
                                                                                Analysis</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Unlimited X-rays with advanced AI-driven tools,
                                                                            including PA, frontal face, and lateral soft
                                                                            tissue analyses</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access detailed X-ray reports and overlays</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View comprehensive progress updates</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Diagnosis and Treatment Planning</strong>
                                                                        </p>
                                                                    </th>
                                                                    <td>
                                                                        <p>AI-powered treatment suggestions with alternative
                                                                            scenarios</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View and compare multiple treatment plans</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View milestone insights and progress comparisons
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Doctor-Patient Communication</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Unlimited secure messaging and video
                                                                            consultations</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full messaging and consultation features</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Join consultations and receive progress updates
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Augmented Reality Visualization</strong>
                                                                        </p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Unlimited 3D simulations and interactive AR
                                                                            guides for patient education</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full AR access to visualize outcomes</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Interactive visuals for treatment guidance</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Reporting and Analytics</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Advanced case-specific reporting and comparison
                                                                            charts for all patients</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Comprehensive reports on progress and outcomes
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Receive detailed treatment and compliance updates
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Image Management</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Unlimited image management with editing,
                                                                            cropping, and annotation tools</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full access to annotated images and visuals</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View annotated images shared by patients or
                                                                            doctors</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Wearable Device Integration</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Full compliance tracking
                                                                            with wearable integrations</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full alerts and
                                                                            insights for
                                                                            treatment
                                                                            compliance</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Receive wearable
                                                                            alerts and progress
                                                                            updates</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Custom Branding</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Add custom clinic logos
                                                                            and remove watermarks</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View professional
                                                                            clinic-branded
                                                                            reports</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View branded
                                                                            updates and reports
                                                                            shared by clinics</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-enterprise" role="tabpanel">
                                                    <h3 class="mb-2">Enterprise Plan</h3>
                                                    <p>Both patients and professionals who want to connect, learn, and
                                                        network with a global community</p>
                                                    <div class="table-responsive">
                                                        <table
                                                            class="table text-center align-middle table-hover rounded-3">
                                                            <thead class="table-bordered">
                                                                <tr>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Feature</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Doctor</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Patient</h5>
                                                                    </th>
                                                                    <th scope="col" class="col-3">
                                                                        <h5 class="py-3">Family Members</h5>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Advertisements</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p><strong>No Ads</strong> – Full ad-free
                                                                            enterprise experience</p>
                                                                    </td>
                                                                    <td>
                                                                        <p><strong>No Ads</strong> – Premium
                                                                            user-focused
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p><strong>No Ads</strong> – Family-safe ad-free
                                                                            platform
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Patient Management</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Unlimited profiles with
                                                                            advanced collaboration
                                                                            tools</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full access to
                                                                            personalized care
                                                                            plans</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full access to
                                                                            treatment tracking
                                                                            and family
                                                                            dashboards
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>AI-Powered Cephalometric
                                                                                Analysis</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>All premium features
                                                                            plus AI-based growth
                                                                            prediction tools for
                                                                            younger patients</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access predictive
                                                                            analysis for long-term
                                                                            planning</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View long-term
                                                                            progress
                                                                            predictions</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Diagnosis and Treatment Planning</strong>
                                                                        </p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Custom AI-driven
                                                                            treatment simulations
                                                                            for complex cases</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View fully tailored
                                                                            plans for advanced
                                                                            cases</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access milestone
                                                                            comparisons and
                                                                            advanced tracking
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Doctor-Patient Communication</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Integrated real-time
                                                                            collaboration with
                                                                            multi-user messaging</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access to real-time
                                                                            updates and
                                                                            consultations</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Join real-time
                                                                            consultations with
                                                                            progress alerts
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Augmented Reality Visualization</strong>
                                                                        </p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Advanced AR guides for
                                                                            surgical cases and
                                                                            orthodontic education</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full AR access
                                                                            including surgical
                                                                            visualizations</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Interactive AR tools
                                                                            for family
                                                                            engagement</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Reporting and Analytics</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Multi-dimensional
                                                                            analytics for clinic-wide
                                                                            performance tracking</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Comprehensive
                                                                            progress updates with
                                                                            actionable insights
                                                                        </p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full progress,
                                                                            compliance, and
                                                                            family-specific
                                                                            updates
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Image Management</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Unlimited images with
                                                                            advanced editing and
                                                                            collaborative tools</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Full access to image
                                                                            libraries and
                                                                            comparisons</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View progress
                                                                            comparisons and
                                                                            shared annotations</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Wearable Device Integration</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Enhanced wearable
                                                                            tracking with predictive
                                                                            AI for compliance</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Receive real-time
                                                                            alerts for wearable
                                                                            compliance</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access all
                                                                            compliance updates
                                                                            and insights</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Custom Branding</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Fully customizable
                                                                            reports, presentations,
                                                                            and branding</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View professional
                                                                            clinic-branded
                                                                            updates</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access customized
                                                                            reports with
                                                                            family-specific
                                                                            branding</p>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" class="text-start">
                                                                        <p><strong>Case Sharing</strong></p>
                                                                    </th>
                                                                    <td>
                                                                        <p>Share cases securely
                                                                            with external
                                                                            consultants and
                                                                            collaborators</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>View shared cases as
                                                                            needed for
                                                                            transparency</p>
                                                                    </td>
                                                                    <td>
                                                                        <p>Access
                                                                            family-friendly
                                                                            shared progress
                                                                            updates</p>
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
                            </div>
                        </section>
                        <style>
                            .nav-pills .nav-link {
                                background-color: #eeeeee;
                            }
                            .nav-link:after {
                                display: none !important;
                            }
                        </style>

                    </div>
                </div>
            </section>
        </main>
    </body>
    <script src="{{ asset('assets/dashboard/assets/js/bundle6572.js?v1.5.0') }}"></script>
    <script src="{{ asset('assets/dashboard/assets/js/scripts6572.js?v1.5.0') }}"></script>
@endsection
