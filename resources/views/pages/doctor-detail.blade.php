@extends('../index')
@section('content')

<!-- page-title -->
<section class="page-title p_relative centred">
    <div class="bg-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Doctor Details</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Doctor Details</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->


<!-- team-details -->
<section class="team-details sec-pad-2">
    <div class="auto-container">
        <div class="team-details-content mb_50">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                    <figure class="image-box mr_15"><img src="assets/images/team/team-13.jpg" alt=""></figure>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <h2>Jenny Wilson</h2>
                        <span class="designation">Senior Orthodontist</span>
                        <p>Eget lorem dolor sed viverra. Mattis nunc sed blandit libero volutpat sed cras ornare arcu. consectetur adipiscing elit. Libero turpis blandit blandit mauris aliquam condimentum quam suspendisse Pellentesque habitant morbi tristique senectus et netus</p>
                        <ul class="info-list mb_30 clearfix">
                            <li><strong>Experience: </strong>20 Years</li>
                            <li><strong>Email: </strong><a href="mailto:tanya.hill@example.com">tanya.hill@example.com</a></li>
                            <li><strong>Phone: </strong><a href="tel:3035550105">(303) 555-0105</a></li>
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
        </div>
        <div class="experience-details mb_50">
            <h2>Personal Experience</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
        </div>
        <div class="two-column">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 skills-column">
                    <div class="skills-box">
                        <div class="text-box mb_30">
                            <h2>Expertise & Skills</h2>
                            <p>Consectetur adipiscing elit. Semper sagittis dolor aliquet quam feugiat ultrices feugiat Viverra facilisi turpis.</p>
                        </div>
                        <div class="progress-inner">
                            <div class="progress-box">
                                <p>Empathy</p>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="85%"></div>
                                    <div class="count-text">85%</div>
                                </div>
                            </div>
                            <div class="progress-box">
                                <p>Technique</p>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="90%"></div>
                                    <div class="count-text">90%</div>
                                </div>
                            </div>
                            <div class="progress-box">
                                <p>Neurology</p>
                                <div class="bar">
                                    <div class="bar-inner count-bar" data-percent="80%"></div>
                                    <div class="count-text">80%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 appointment-column">
                    <div class="appointment-inner">
                        <h2>Book An Appointment</h2>
                        <form method="post" action="team-details.html" class="default-form">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="fname" placeholder="First Name" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone Number" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject" required>
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
<!-- team-details end -->

@endsection