<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Ortho Direction | Expert Dental Care</title>

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
    <link rel="preload" href="{{ asset('assets/css/config.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/css/config.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
</head>

<body>
    <div class="boxed_wrapper ltr">

        <!-- main header -->
        <header class="main-header">
            <!-- header-top -->
            <div class="header-top">
                <div class="auto-container">
                    <div class="top-inner">
                        <ul class="info-list clearfix">
                            <li><i class="icon-1"></i>Mon - Fri 8:00 - 18:00 / Sunday 8:00 - 14:00</li>
                            <li><i class="icon-2"></i>Email: <a href="tel:01989526503">0198-9526503</a></li>
                            <li><img src="{{ asset('assets/images/icons/icon-1.png') }}" alt="Ortho Direction Logo"
                                    loading="lazy">
                                47 Bakery Street, London, UK</li>
                        </ul>
                        <ul class="social-links clearfix">
                            <li><a href="index.html"><i class="icon-4"></i></a></li>
                            <li><a href="index.html"><i class="icon-5"></i></a></li>
                            <li><a href="index.html"><i class="icon-6"></i></a></li>
                            <li><a href="index.html"><i class="icon-7"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-container">
                    <div class="auto-container">
                        <div class="outer-box">
                            <div class="logo-box">
                                <figure class="logo"><a href="/"><img
                                            src="{{ asset('assets/images/logo.png') }}" alt="Ortho Direction Logo"
                                            loading="lazy"></a></figure>
                            </div>
                            <div class="menu-area">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler">
                                    <i class="icon-bar"></i>
                                    <i class="icon-bar"></i>
                                    <i class="icon-bar"></i>
                                </div>
                                <nav class="main-menu navbar-expand-md navbar-light clearfix">
                                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                        <ul class="navigation clearfix">
                                            <li class="current"><a href="/">Home</a></li>
                                            <li><a href="/about">About Us</a></li>
                                            <li><a href="/services">Services</a></li>
                                            <li><a href="/blogs">Blogs</a></li>
                                            <li><a href="/pricing">Pricing</a></li>
                                            <li><a href="/contact">Contact</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                @auth
                                    <!-- Show Logout button when the user is logged in -->
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="theme-btn btn-one"><span>Logout</span></button>
                                    </form>
                                @else
                                    <!-- Show Login and Register buttons when the user is not logged in -->
                                    <div class="btn-box">
                                        <a href="{{ route('login') }}" class="theme-btn btn-one"><span>Login</span></a>
                                    </div>
                                    {{-- <div class="btn-box">
                                        <a href="{{ route('register') }}"
                                            class="theme-btn btn-two"><span>Register</span></a>
                                    </div> --}}
                                @endauth
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="/"><img
                                        src="{{ asset('assets/images/logo.png') }}" alt="Ortho Direction Logo"
                                        loading="lazy"></a></figure>
                        </div>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <div class="btn-box">
                                <a href="/login" class="theme-btn btn-one"><span>Login</span></a>
                            </div>
                            {{-- <div class="btn-box">
                                <a href="/register" class="theme-btn btn-two"><span>Register</span></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="/"><img src="{{ asset('assets/images/logo-2.png') }}"
                            loading="lazy" alt="Ortho Direction Logo" title=""></a></div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        <main class="my-5 pt-3">
            <div id="page-conten">
            </div>
        </main>

        @yield('content')

        <!-- subscribe-section -->
        <section class="subscribe-section bg-color-1">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                            <div class="text-box">
                                <h2><span>Subscribe</span> for the exclusive updates!</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                            <div class="form-inner">
                                <form method="post" action="https://azim.hostlin.com/Medimart/contact.html">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Enter Your Email Address"
                                            required>
                                        <button type="submit" class="theme-btn btn-one"><span>Subscribe
                                                Now</span></button>
                                    </div>
                                    <div class="form-group">
                                        <div class="check-box">
                                            <input class="check" type="checkbox" id="checkbox1">
                                            <label for="checkbox1">I agree to the <a href="index.html">Privacy
                                                    Policy.</a></label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subscribe-section end -->

        <!-- main-footer -->
        <footer class="main-footer">
            <div class="pattern-layer">
                <div class="pattern-1"
                    style="background-image: url({{ asset('assets/images/shape/shape-23.png') }});"></div>
                <div class="pattern-2"
                    style="background-image: url({{ asset('assets/images/shape/shape-24.png') }});"></div>
                <div class="pattern-3"
                    style="background-image: url({{ asset('assets/images/shape/shape-25.png') }});"></div>
                <div class="pattern-4"></div>
            </div>
            <div class="widget-section pt_120 pb_100">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <figure class="footer-logo"><a href="/" class="navigator"
                                        data-page="home"><img src="{{ asset('assets/images/footer-logo.png') }}"
                                            loading="lazy" alt="Ortho Direction Logo"></a></figure>
                                <p>We are a team of dentists, hygienists and receptionists who work together to ensure that you receive the best treatment that you require at a very time that suits you.</p>
                                <ul class="social-links clearfix">
                                    <li><a href="#" target="_blank"><i class="icon-4"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="icon-5"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="icon-6"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="icon-7"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_110">
                                <div class="widget-title">
                                    <h3>Quick Link</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/about">About Us</a></li>
                                        <li><a href="/services">Services</a></li>
                                        <li><a href="/blogs">Blogs</a></li>
                                        <li><a href="/pricing">Pricing Plans</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_55">
                                <div class="widget-title">
                                    <h3>Useful Links</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                        <li><a href="/appointment">Appointment</a></li>
                                        <li><a href="/faqs">Faq</a></li>
                                        <li><a href="/contact">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contact us</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list">
                                        <li><img src="{{ asset('assets/images/icons/icon-1.png') }}" loading="lazy"
                                                alt="">3891 Ranchview Dr. Richardson, California USA</li>
                                        <li><i class="icon-2"></i><a href="tel:01989526503">0198-9526503</a></li>
                                        <li><i class="icon-26"></i><a
                                                href="mailto:example@info.com">example@info.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="bottom-inner">
                        <ul class="footer-nav clearfix">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Conditions</a></li>
                            <li><a href="/faqs">FAQs</a></li>
                        </ul>
                        <div class="copyright">
                            <p>&copy; 2025 All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->

        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>
        <!-- Scroll to top end -->

    </div>

    <!-- jequery plugins -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/parallax-scroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jQuery.style.switcher.min.js') }}"></script>

    <!-- main-js -->
    <script src="{{ asset('assets/js/script.js') }}" defer></script>

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Dentist",
          "name": "Ortho Direction",
          "image": "{{ asset('assets/images/logo.png') }}",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "47 Bakery Street",
            "addressLocality": "London",
            "addressCountry": "UK"
          },
          "telephone": "0198-9526503",
          "url": "https://www.orthodirection.com"
        }
    </script>

</body>
{{-- <script src="{{ asset('assets/dashboard/assets/js/bundle6572.js?v1.5.0') }}"></script>
<script src="{{ asset('assets/dashboard/assets/js/scripts6572.js?v1.5.0') }}"></script> --}}

</html>
