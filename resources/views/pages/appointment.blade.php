@extends('../index')
@section('content')
    <!-- page-title -->
    <section class="page-title p_relative centred">
        <div class="bg-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Make Appointments</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>Make Appointments</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- appointment-section -->
    <section class="appointment-section sec-pad-2">
        <div class="outer-container p_relative">
            <div class="bg-layer" style="background-image: url(assets/images/background/appointment-bg.jpg);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                        <div class="form-inner">
                            <form action="appointments.html" method="post" class="default-form">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Select Department</label>
                                        <div class="select-box">
                                            <select class="selectmenu">
                                                <option>pathology</option>
                                                <option>Cardiology</option>
                                                <option>Dental Clinic</option>
                                                <option>Neurosurgery</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Choose Doctor by Name</label>
                                        <div class="select-box">
                                            <select class="selectmenu">
                                                <option>Haddam Banksy</option>
                                                <option>Black Marvin</option>
                                                <option>Eleanor Pena</option>
                                                <option>Arlene Maccy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="fname" placeholder="First Name" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="phone" placeholder="Number" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="date" placeholder="mm/dd/yyyy" id="datepicker">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="time" placeholder="Time">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one"><span>Send Message</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- appointment-section end -->


    <!-- video-section -->
    <section class="video-section p_relative">
        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}'
            style="background-image: url(assets/images/background/video-bg.jpg);"></div>
        <figure class="image-layer"><img src="assets/images/resource/video-1.png" alt=""></figure>
        <div class="auto-container">
            <div class="inner-box">
                <div class="shape" style="background-image: url(assets/images/shape/shape-17.png);"></div>
                <div class="video-btn">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image" data-caption="">
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


    <!-- team-section -->
    <section class="team-section sec-pad centred">
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
@endsection
