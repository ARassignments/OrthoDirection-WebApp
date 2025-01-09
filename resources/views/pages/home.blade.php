@extends('../index')
@section('content')
<!-- banner-style-two -->
<section class="banner-style-two">
    <div class="banner-carousel owl-theme owl-carousel owl-nav-none owl-dots-none">
        <div class="slide-item">
            <div class="bg-layer" style="background-image:url(assets/images/banner/banner-1.jpg)"></div>
            <figure class="image-layer"><img src="assets/images/banner/banner-img-2.png" alt=""></figure>
            <div class="auto-container">
                <div class="content-box">
                    <span class="upper-text">Care For Lifetime</span>
                    <h2>Let Us <span>Brighten</span> Your Smile</h2>
                    <p>We are a team of dentists, hygienists and receptionists who work together to ensure that you receive the best treatment that you require at a very time that suits you.</p>
                    <div class="btn-box">
                        <a href="/services" class="theme-btn btn-one"><span>Explore Our Service</span></a>
                    </div>
                </div> 
            </div>
        </div>
        <div class="slide-item">
            <div class="bg-layer" style="background-image:url(assets/images/banner/banner-2.jpg)"></div>
            <figure class="image-layer"><img src="assets/images/banner/banner-img-4.png" width="550px" alt=""></figure>
            <div class="auto-container">
                <div class="content-box">
                    <span class="upper-text">Care For Your Smile</span>
                    <h2>Committed To <span>Excellence</span> Service</h2>
                    <p>We are a team of dentists, hygienists and receptionists who work together to ensure that you receive the best treatment that you require at a very time that suits you.</p>
                    <div class="btn-box">
                        <a href="/services" class="theme-btn btn-one"><span>Explore Our Service</span></a>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<!-- banner-style-two end -->

<!-- feature-style-two -->
<section class="feature-style-two centred">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-9"></i></div>
                            <h3><a href="index.html">Full Protection</a></h3>
                            <p>Competently parallel task researched data and process improvements.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-10"></i></div>
                            <h3><a href="index.html">Complete Service</a></h3>
                            <p>Collaboratively expedite quality products via client focused results.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-11"></i></div>
                            <h3><a href="index.html">Prosthesis</a></h3>
                            <p>Holistically foster superior methodologies without market-driven best practices.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-12"></i></div>
                            <h3><a href="index.html">Alignments</a></h3>
                            <p>Dynamically innovate resource leveling service for state of the art customer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feature-style-two end -->


<!-- about-section -->
<section class="about-section pt_120 pb_120 bg-color-1">
    <div class="pattern-layer">
        <div class="pattern-1 rotate-me" style="background-image: url({{asset('assets/images/shape/shape-8.png')}});"></div>
        <div class="pattern-2 rotate-me" style="background-image: url({{asset('assets/images/shape/shape-8.png')}});"></div>
        <div class="pattern-3 rotate-me" style="background-image: url({{asset('assets/images/shape/shape-9.png')}});"></div>
        <div class="pattern-4" style="background-image: url({{asset('assets/images/shape/shape-10.png')}});"></div>
        <div class="pattern-5" style="background-image: url({{asset('assets/images/shape/shape-11.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image_block_one">
                    <div class="image-box">
                        <div class="shape float-bob-x"
                            style="background-image: url({{asset('assets/images/shape/shape-7.png')}});"></div>
                        <figure class="image"><img src="{{asset('assets/images/resource/about-1.jpg')}}" alt=""></figure>
                        <div class="icon-one"><i class="icon-29"></i></div>
                        <div class="icon-two"><i class="icon-32"></i></div>
                        <div class="text-box">
                            <h3>Wade Warren</h3>
                            <span>Senior Orthodontist</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_one">
                    <div class="content-box ml_30">
                        <div class="sec-title mb_15">
                            <span class="sub-title">About Us</span>
                            <h2>Dental services & diagnostics</h2>
                        </div>
                        <div class="text-box mb_40">
                            <h6>Committed To Delivering High Quality Dental & Diagnostics Services!</h6>
                            <p>Distinctively exploit optimal alignments for intuitive bandwidth. Quickly coordinate e-business applications through revolutionary catalysts for change. Seamlessly underwhelm optimal testing processes.</p>
                            <ul class="list-style-one clearfix">
                                <li>Client Satisfaction</li>
                                <li>Dental Success</li>
                                <li>Client Referral</li>
                                <li>Teeth Whitening</li>
                                <li>Dental Implants</li>
                            </ul>
                        </div>
                        <div class="btn-box">
                            <a href="/services" class="theme-btn btn-one"><span>Discover More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-section end -->


<!-- service-section -->
<section class="service-section sec-pad">
    <div class="auto-container">
        <div class="sec-title mb_50 centred">
            <span class="sub-title">Our Services</span>
            <h2>We Offer For You Ortho <br />Dental Saving Smile</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box" data-count="1">
                        <div class="image-box">
                            <figure class="image"><a href="service-details-6.html"><img
                                        src="assets/images/service/service-20.jpg" alt=""></a></figure>
                            <div class="icon-box"><i class="icon-16"></i></div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="service-details-6.html">AI-Powered Cephalometric Analysis</a></h3>
                            <p>
                                Revolutionize diagnostics with cutting-edge AI technology. Upload cephalometric X-rays
                                to get
                                precise measurements and detailed orthodontic reports, saving time and improving
                                diagnostic
                                accuracy.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box" data-count="2">
                        <div class="image-box">
                            <figure class="image"><a href="service-details-2.html"><img
                                        src="assets/images/service/service-17.jpg" alt=""></a></figure>
                            <div class="icon-box"><i class="icon-11"></i></div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="service-details-2.html">AI-Driven Diagnosis & Treatment Planning</a></h3>
                            <p>
                                Simplify and enhance treatment planning with AI insights. Create personalized
                                orthodontic plans
                                for braces, Invisalign, and more, while tracking real-time progress and adjusting
                                milestones for
                                optimal outcomes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box" data-count="3">
                        <div class="image-box">
                            <figure class="image"><a href="service-details-4.html"><img
                                        src="assets/images/service/service-16.jpg" alt=""></a></figure>
                            <div class="icon-box"><i class="icon-17"></i></div>
                        </div>
                        <div class="lower-content">
                            <h3><a href="service-details-4.html">Doctor-Patient Communication Tools</a></h3>
                            <p>
                                Stay connected with secure messaging, virtual consultations, and appointment management.
                                Simplify communication between doctors, patients, and families for a seamless treatment
                                experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service-section end -->


<!-- chooseus-section -->
<section class="chooseus-section">
    <div class="bg-layer" style="background-image: url(assets/images/background/chooseus-bg.jpg);"></div>
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-12.png);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                <div class="content-box">
                    <div class="sec-title light mb_50">
                        <span class="sub-title">Why Choose Us</span>
                        <h2>Choose The Best For Your <br />Smile</h2>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-17"></i></div>
                                    <h3>Professional Doctor</h3>
                                    <p>Experience care with compassion, trust, and professionalism.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-29"></i></div>
                                    <h3>Dental Service</h3>
                                    <p>We provides comprehensive oral care for a healthy & confident smile.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-19"></i></div>
                                    <h3>Online Appointment</h3>
                                    <p>Book an online appointment with our professional doctors at your convenience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-20"></i></div>
                                    <h3>24/7 Services</h3>
                                    <p>Our 24/7 Dental Service is here to care for your oral health around the clock.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- chooseus-section end -->


<!-- funfact-section -->
<section class="funfact-section centred">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="99">0</span><span
                                    class="symble">%</span>
                            </div>
                            <span class="text">Client Satisfaction</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="97">0</span><span class="symble">%</span>
                            </div>
                            <span class="text">Intervention Success</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="100">0</span><span class="symble">%</span>
                            </div>
                            <span class="text">Happy with Staff</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="95">0</span><span class="symble">%</span>
                            </div>
                            <span class="text">Quick Recovery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- funfact-section end -->


<!-- team-section -->
<section class="team-section sec-pad centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url(assets/images/shape/shape-13.png);"></div>
        <div class="pattern-2" style="background-image: url(assets/images/shape/shape-14.png);"></div>
    </div>
    <div class="shape">
        <div class="shape-1 float-bob-y" style="background-image: url(assets/images/shape/shape-15.png);"></div>
        <div class="shape-2"></div>
        <div class="shape-3 float-bob-x" style="background-image: url(assets/images/shape/shape-16.png);"></div>
    </div>
    <div class="auto-container">
        <div class="sec-title mb_50">
            <span class="sub-title">Our Team</span>
            <h2>Meet our experienced doctors <br />for best treatment</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="assets/images/team/team-1.jpg" alt=""></figure>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="icon-4"></i></a></li>
                                <li><a href="index.html"><i class="icon-5"></i></a></li>
                                <li><a href="index.html"><i class="icon-6"></i></a></li>
                                <li><a href="index.html"><i class="icon-7"></i></a></li>
                            </ul>
                        </div>
                        <div class="lower-content">
                            <h3><a href="/doctor-detail">Carlie Addison</a></h3>
                            <span class="designation">Dental Assistant</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="assets/images/team/team-2.jpg" alt=""></figure>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="icon-4"></i></a></li>
                                <li><a href="index.html"><i class="icon-5"></i></a></li>
                                <li><a href="index.html"><i class="icon-6"></i></a></li>
                                <li><a href="index.html"><i class="icon-7"></i></a></li>
                            </ul>
                        </div>
                        <div class="lower-content">
                            <h3><a href="/doctor-detail">Alex Terrel</a></h3>
                            <span class="designation">Senior Orthodontist</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="assets/images/team/team-3.jpg" alt=""></figure>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="icon-4"></i></a></li>
                                <li><a href="index.html"><i class="icon-5"></i></a></li>
                                <li><a href="index.html"><i class="icon-6"></i></a></li>
                                <li><a href="index.html"><i class="icon-7"></i></a></li>
                            </ul>
                        </div>
                        <div class="lower-content">
                            <h3><a href="/doctor-detail">Arlene Maccy</a></h3>
                            <span class="designation">Dental Assistant</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 team-block">
                <div class="team-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><img src="assets/images/team/team-4.jpg" alt=""></figure>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="icon-4"></i></a></li>
                                <li><a href="index.html"><i class="icon-5"></i></a></li>
                                <li><a href="index.html"><i class="icon-6"></i></a></li>
                                <li><a href="index.html"><i class="icon-7"></i></a></li>
                            </ul>
                        </div>
                        <div class="lower-content">
                            <h3><a href="/doctor-detail">Jenny Wilson</a></h3>
                            <span class="designation">Senior Orthodontist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team-section end -->


<!-- video-section -->
<section class="video-section p_relative">
    <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
        style="background-image: url(assets/images/background/video-bg.jpg);"></div>
    <figure class="image-layer"><img src="assets/images/resource/video-1.png" alt=""></figure>
    <div class="auto-container">
        <div class="inner-box">
            <div class="shape" style="background-image: url(assets/images/shape/shape-17.png);"></div>
            <div class="video-btn">
                <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image"
                    data-caption="">
                    <i class="fas fa-play"></i>
                    <span class="border-animation border-1"></span>
                    <span class="border-animation border-2"></span>
                    <span class="border-animation border-3"></span>
                </a>
            </div>
            <h2>Online Consultations With <br />Qualified Doctors</h2>
            <div class="btn-box">
                <a href="/appointment" class="theme-btn btn-one"><span>Make an Appointment</span></a>
            </div>
        </div>
    </div>
</section>
<!-- video-section end -->


<!-- process-section -->
<section class="process-section sec-pad">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-19.png);"></div>
    <div class="shape">
        <div class="shape-1 float-bob-x" style="background-image: url(assets/images/shape/shape-20.png);"></div>
        <div class="shape-2 float-bob-y" style="background-image: url(assets/images/shape/shape-15.png);"></div>
        <div class="shape-3"></div>
    </div>
    <div class="auto-container">
        <div class="sec-title mb_50 centred">
            <span class="sub-title">Process</span>
            <h2>How it Helps You to <br />Keep Healthy Smile</h2>
        </div>
        <div class="inner-container">
            <div class="arrow-shape" style="background-image: url(assets/images/shape/shape-18.png);"></div>
            <div class="processing-block-one wow fadeInLeft animated" data-wow-delay="00ms"
                data-wow-duration="1500ms">
                <div class="inner-box">
                    <span class="count-text">01</span>
                    <figure class="image-box"><img src="assets/images/resource/process-1.jpg" alt="">
                    </figure>
                    <div class="lower-content">
                        <h3>Get Appointment</h3>
                        <p>Book your appointment today with just a few clicks. </p>
                    </div>
                </div>
            </div>
            <div class="processing-block-one wow fadeInLeft animated" data-wow-delay="300ms"
                data-wow-duration="1500ms">
                <div class="inner-box">
                    <span class="count-text">02</span>
                    <figure class="image-box"><img src="assets/images/resource/process-2.jpg" alt="">
                    </figure>
                    <div class="lower-content">
                        <h3>Start Check-Up</h3>
                        <p>Begin your professional check-up with our expert doctors. </p>
                    </div>
                </div>
            </div>
            <div class="processing-block-one wow fadeInLeft animated" data-wow-delay="600ms"
                data-wow-duration="1500ms">
                <div class="inner-box">
                    <span class="count-text">03</span>
                    <figure class="image-box"><img src="assets/images/resource/process-3.jpg" alt="">
                    </figure>
                    <div class="lower-content">
                        <h3>Enjoy Healthy Smile</h3>
                        <p>You can enjoy a healthy, radiant smile that boosts your confidence. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- process-section end -->


<!-- testimonial-section -->
<section class="testimonial-section sec-pad bg-color-1">
    <div class="bg-layer" style="background-image: url(assets/images/background/testimonial-bg.jpg);"></div>
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-21.png);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-xl-6 col-lg-12 col-md-12 offset-xl-6 content-column">
                <div class="content-box p_relative ml_45">
                    <div class="sec-title mb_50">
                        <span class="sub-title">Testimonials</span>
                        <h2>What Our Client Say About Ortho Direction</h2>
                    </div>
                    <div class="single-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                        <div class="testimonial-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-23"></i></div>
                                <p>Uniquely deploy cross-unit benefits with wireless testing procedures. Build full backward compatible relationships.</p>
                                <div class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/resource/testimonial-1.jpg"
                                            alt=""></figure>
                                    <ul class="rating clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                    </ul>
                                    <h3>Brad Wilson</h3>
                                    <span class="designation">Dental Surgery</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-23"></i></div>
                                <p>Capitalize on low hanging fruit to identify a ballpark value added activity to beta test clickthroughs from users.</p>
                                <div class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/resource/testimonial-2.jpg"
                                            alt=""></figure>
                                    <ul class="rating clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                        <li><i class="far fa-star"></i></li>
                                    </ul>
                                    <h3>Trixie Payton</h3>
                                    <span class="designation">Full Dental Implants</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-23"></i></div>
                                <p>Collaboratively administrate empowered markets via plug-and-play networks after installed base benefits.</p>
                                <div class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/resource/testimonial-3.jpg"
                                            alt=""></figure>
                                    <ul class="rating clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <h3>Kristin Yang</h3>
                                    <span class="designation">Cosmetic Dentistry</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-section end -->


<!-- pricing-section -->
<section class="pricing-section sec-pad d-none">
    <div class="auto-container">
        <div class="sec-title mb_50 centred">
            <span class="sub-title">Our Pricing</span>
            <h2>Affordable care options for <br />all patients</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="00ms"
                    data-wow-duration="1500ms">
                    <div class="pricing-table">
                        <div class="shape" style="background-image: url(assets/images/shape/shape-22.png);"></div>
                        <div class="table-header">
                            <h5>Standard Consultation</h5>
                            <h2>$49.99</h2>
                            <span>Monthly</span>
                        </div>
                        <div class="table-content">
                            <ul class="feature-list clearfix">
                                <li>Virtual visit</li>
                                <li>Up to 30 minutes</li>
                                <li>Securely conducted online</li>
                                <li>Discuss and receive guidance</li>
                                <li>Rate varies on specific needs</li>
                                <li>Healthcare provider Consult</li>
                            </ul>
                        </div>
                        <div class="table-footer">
                            <a href="index.html" class="theme-btn btn-three"><span>Choose Plan <i
                                        class="icon-25"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                <div class="pricing-block-one active-block wow fadeInUp animated" data-wow-delay="300ms"
                    data-wow-duration="1500ms">
                    <div class="pricing-table">
                        <div class="shape" style="background-image: url(assets/images/shape/shape-22.png);"></div>
                        <div class="table-header">
                            <h5>Annual Physical</h5>
                            <h2>$149.99</h2>
                            <span>Monthly</span>
                        </div>
                        <div class="table-content">
                            <ul class="feature-list clearfix">
                                <li>In-person examination</li>
                                <li>Up to 60 minutes</li>
                                <li>Various tests and assessments</li>
                                <li>In-person service</li>
                                <li>Rate varies on specific needs</li>
                                <li>Healthcare provider Consult</li>
                            </ul>
                        </div>
                        <div class="table-footer">
                            <a href="index.html" class="theme-btn btn-three"><span>Choose Plan <i
                                        class="icon-25"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pricing-block">
                <div class="pricing-block-one wow fadeInUp animated" data-wow-delay="600ms"
                    data-wow-duration="1500ms">
                    <div class="pricing-table">
                        <div class="shape" style="background-image: url(assets/images/shape/shape-22.png);"></div>
                        <div class="table-header">
                            <h5>Extended Consultation</h5>
                            <h2>$99.99</h2>
                            <span>Monthly</span>
                        </div>
                        <div class="table-content">
                            <ul class="feature-list clearfix">
                                <li>Virtual visit</li>
                                <li>Up to 60 minutes</li>
                                <li>Discuss more details</li>
                                <li>Receive in-depth guidance</li>
                                <li>Rate varies on specific needs</li>
                                <li>Healthcare provider Consult</li>
                            </ul>
                        </div>
                        <div class="table-footer">
                            <a href="index.html" class="theme-btn btn-three"><span>Choose Plan <i
                                        class="icon-25"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- pricing-section end -->


<!-- news-section -->
<section class="news-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title mb_50 centred">
            <span class="sub-title">Our Blog</span>
            <h2>Take a look at our most <br />recent articles</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="blog-details.html"><img
                                    src="assets/images/news/news-1.jpg" alt=""></a></figure>
                        <div class="lower-content">
                            <ul class="post-info mb_15 clearfix">
                                <li><a href="blog-details.html">Admin</a></li>
                                <li>12 Jan 2022</li>
                                <li>03 Comt</li>
                            </ul>
                            <h3><a href="blog-details.html">How do Inherited Retinal of Diseases Happen?</a></h3>
                            <p>Tincidunt Maur nemi sit Interdum praesento eget morbi lacinia volutpat pellentesque
                                Tincidunt aurna suspit.</p>
                            <div class="link">
                                <a href="blog-details.html"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="blog-details.html"><img
                                    src="assets/images/news/news-2.jpg" alt=""></a></figure>
                        <div class="lower-content">
                            <ul class="post-info mb_15 clearfix">
                                <li><a href="blog-details.html">Admin</a></li>
                                <li>11 Jan 2022</li>
                                <li>0 Comt</li>
                            </ul>
                            <h3><a href="blog-details.html">Prepare to Speak with Your Eye Specialist.</a></h3>
                            <p>Tincidunt Maur nemi sit Interdum praesento eget morbi lacinia volutpat pellentesque
                                Tincidunt aurna suspit.</p>
                            <div class="link">
                                <a href="blog-details.html"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><a href="blog-details.html"><img
                                    src="assets/images/news/news-3.jpg" alt=""></a></figure>
                        <div class="lower-content">
                            <ul class="post-info mb_15 clearfix">
                                <li><a href="blog-details.html">Admin</a></li>
                                <li>11 Jan 2022</li>
                                <li>02 Comt</li>
                            </ul>
                            <h3><a href="blog-details.html">How reliece can help you manage diabetes</a></h3>
                            <p>Tincidunt Maur nemi sit Interdum praesento eget morbi lacinia volutpat pellentesque
                                Tincidunt aurna suspit.</p>
                            <div class="link">
                                <a href="blog-details.html"><span>Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news-section end -->
@endsection