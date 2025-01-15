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
                        <p>Main Office: <br /><a href="tel:23345678901">(+233)456-789-01</a>, <a href="tel:+1045678901">+10456-789-01</a></p>
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
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="fname" placeholder="First Name" required="">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="lname" placeholder="Last Name" required="">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Your email" required="">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" required="" placeholder="Phone">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="subject" required="" placeholder="Subject">
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="comment" placeholder="message"></textarea>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                <button class="theme-btn btn-one" type="submit"><span>Send Message</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 image-column">
                <figure class="image-box"><img src="assets/images/resource/contact-1.jpg" height="100%" alt=""></figure>
            </div>
        </div>
    </div>
</section>
<!-- contact-style-three end -->


<!-- google-map-section -->
<section class="google-map-section">
    <div class="map-inner">
        <div 
            class="google-map" 
            id="contact-google-map" 
            data-map-lat="40.712776" 
            data-map-lng="-74.005974" 
            data-icon-path="assets/images/icons/map-marker.png"  
            data-map-title="Brooklyn, New York, United Kingdom" 
            data-map-zoom="12" 
            data-markers='{
                "marker-1": [40.712776, -74.005974, "<h4>Branch Office</h4><p>77/99 New York</p>","assets/images/icons/map-marker.png"]
            }'>

        </div>
    </div>
</section>
<!-- google-map-section end -->
@endsection
@section('js')
    <script>
        $('#ContactForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)

            $.ajax({
                url: "{{ route('contact.send') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    if (response['status'] == true) {

                      $('#ContactForm')[0].reset();
                      $('.is-invalid').removeClass('is-invalid');
                      $('span.text-danger').html('');

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
                        Toast.fire({
                            icon: "success",
                            title: response['msg'],
                        });
                    } else {  
                       if(response['IsLogin'] == false){
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
                        Toast.fire({
                            icon: "error",
                            title: response['error'],
                        });
                       }
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
