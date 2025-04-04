@extends('../index')
@section('content')
    <!-- page-title -->
    <section class="page-title p_relative centred">
        <div class="bg-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Contact Us</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- contact-info-section -->
    <section class="contact-info-section pt_120">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="info-block-one">
                        <h3>Quick Contact</h3>
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-2"></i></div>
                            <p>Main Office: <br /><a href="tel:23345678901">(+233)456-789-01</a>, <a
                                    href="tel:+1045678901">+10456-789-01</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="info-block-one">
                        <h3>Email Address</h3>
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-26"></i></div>
                            <p>Mail: <br /><a href="mailto:info@example.com">info@example.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                    <div class="info-block-one">
                        <h3>Mailing Address</h3>
                        <div class="inner-box">
                            <div class="icon-box"><img src="assets/images/icons/icon-2.png" alt=""></div>
                            <p>3891 Ranchview Dr. Richardson, <br />California 62639</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-section end -->


    <!-- contact-style-three -->
    <section class="contact-style-three pt_90 pb_120">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                    <div class="form-inner mr_40">
                        <div class="sec-title mb_50">
                            <h2>Send a Message</h2>
                        </div>
                        <form method="post" id="ContactForm" class="default-form">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="fname" id="fname" placeholder="First Name"
                                        minlength="3" maxlength="15" required>
                                    <span class="mt-2 pt-2 mb-0 badge bg-light text-danger"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="lname" id="lname" placeholder="Last Name"
                                        minlength="3" maxlength="15" required>
                                    <span class="mt-2 pt-2 mb-0 badge bg-light text-danger"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" id="email" placeholder="Your email"
                                        maxlength="30" required>
                                    <span class="mt-2 pt-2 mb-0 badge bg-light text-danger"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" id="phone" required placeholder="Phone">
                                    <span class="mt-2 pt-2 mb-0 badge bg-light text-danger"></span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="subject" id="subject" minlength="3" maxlength="55"
                                        required placeholder="Subject">
                                    <span class="mt-2 pt-2 mb-0 badge bg-light text-danger"></span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="comment" id="comment" placeholder="Message" minlength="10" required></textarea>
                                    <span class="mt-2 pt-2 mb-0 badge bg-light text-danger"></span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button class="theme-btn btn-one" type="submit"><span>Send Message</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                    <figure class="image-box"><img src="assets/images/resource/contact-1.jpg" height="100%" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-style-three end -->


    <!-- google-map-section -->
    <section class="google-map-section">
        <div class="map-inner">
            <div class="google-map" id="contact-google-map" data-map-lat="40.712776" data-map-lng="-74.005974"
                data-icon-path="assets/images/icons/map-marker.png" data-map-title="Brooklyn, New York, United Kingdom"
                data-map-zoom="12"
                data-markers='{
                "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
            }'>

            </div>
        </div>
    </section>
    <!-- google-map-section end -->
    <script src="{{ asset('assets/dash/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dash/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script>
        $('#ContactForm').submit(function(event) {
            // alert();
            event.preventDefault();
            var element = $(this);
            $.ajax({
                url: "{{ url('send-contact') }}",
                type: "post",
                data: element.serialize() + '&_token={{ csrf_token() }}',
                dataType: "json",
                success: function(response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    if (response['status'] == true) {
                        $('#ContactForm')[0].reset();
                        $('.is-invalid').removeClass('is-invalid');
                        $('span.text-danger').html('');
                        Toast.fire({
                            icon: "success",
                            title: response['msg'],
                        });
                    } else {
                        var errors = response['errors'];
                        $('.is-invalid').removeClass('is-invalid');
                        $('span.text-danger').html('');
                        $.each(errors, function(key, value) {
                            var field = $('#' + key);
                            if (field.length) {
                                field.addClass('is-invalid').siblings('span.text-danger')
                                    .html(value);
                            }
                        });
                    }
                }
            })
        })
    </script>
@endsection
