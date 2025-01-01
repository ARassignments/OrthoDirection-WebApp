@extends('../index')
@section('content')
    <!-- page-title -->
    <section class="page-title p_relative centred">
        <div class="bg-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
        <div class="auto-container">
            <div class="content-box">
                <h1>Blog Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li><a href="/blogs">Blogs</a></li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container sec-pad-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="blog-sidebar default-sidebar mr_10">
                        <div class="sidebar-widget search-widget">
                            <div class="search-form">
                                <form method="post" action="blog-2.html">
                                    <div class="form-group">
                                        <input type="search" name="search-field" placeholder="Search here" required>
                                        <button type="submit"><i class="icon-27"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <div class="widget-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li><a href="#">Cardiology</a></li>
                                    <li><a href="#">Dental Clinic</a></li>
                                    <li><a href="#">Neurosurgery</a></li>
                                    <li><a href="#">Medical</a></li>
                                    <li><a href="#">Pediatrics</a></li>
                                    <li><a href="#">Modern Laboratory</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget category-widget archives-widget">
                            <div class="widget-title">
                                <h3>Archives</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="category-list clearfix">
                                    <li><a href="#">December 2021</a></li>
                                    <li><a href="#">October 2021</a></li>
                                    <li><a href="#">January 2022</a></li>
                                    <li><a href="#">October 2022</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget post-widget">
                            <div class="widget-title">
                                <h3>Latest Post</h3>
                            </div>
                            <div class="widget-content post-inner">
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html"><img
                                                src="assets/images/news/post-1.jpg" alt=""></a></figure>
                                    <h6><a href="blog-details.html">What Causes Inherited Retinal Diseases?</a></h6>
                                    <ul class="post-info clearfix">
                                        <li>09 Jan 2022</li>
                                        <li>03 Comt</li>
                                    </ul>
                                </div>
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html"><img
                                                src="assets/images/news/post-2.jpg" alt=""></a></figure>
                                    <h6><a href="blog-details.html">How reliece can help you manage diabetes</a></h6>
                                    <ul class="post-info clearfix">
                                        <li>10 Jan 2022</li>
                                        <li>05 Comt</li>
                                    </ul>
                                </div>
                                <div class="post">
                                    <figure class="post-thumb"><a href="blog-details.html"><img
                                                src="assets/images/news/post-3.jpg" alt=""></a></figure>
                                    <h6><a href="blog-details.html">Prepare to Speak with Your Eye Specialist.</a></h6>
                                    <ul class="post-info clearfix">
                                        <li>11 Jan 2022</li>
                                        <li>01 Comt</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget gallery-widget">
                            <div class="widget-title">
                                <h3>Gallery</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="image-list clearfix">
                                    <li>
                                        <figure class="image"><a href="assets/images/news/gallery-1.jpg"
                                                class="lightbox-image" data-fancybox="gallery"><img
                                                    src="assets/images/news/gallery-1.jpg" alt=""></a></figure>
                                    </li>
                                    <li>
                                        <figure class="image"><a href="assets/images/news/gallery-2.jpg"
                                                class="lightbox-image" data-fancybox="gallery"><img
                                                    src="assets/images/news/gallery-2.jpg" alt=""></a></figure>
                                    </li>
                                    <li>
                                        <figure class="image"><a href="assets/images/news/gallery-3.jpg"
                                                class="lightbox-image" data-fancybox="gallery"><img
                                                    src="assets/images/news/gallery-3.jpg" alt=""></a></figure>
                                    </li>
                                    <li>
                                        <figure class="image"><a href="assets/images/news/gallery-4.jpg"
                                                class="lightbox-image" data-fancybox="gallery"><img
                                                    src="assets/images/news/gallery-4.jpg" alt=""></a></figure>
                                    </li>
                                    <li>
                                        <figure class="image"><a href="assets/images/news/gallery-5.jpg"
                                                class="lightbox-image" data-fancybox="gallery"><img
                                                    src="assets/images/news/gallery-5.jpg" alt=""></a></figure>
                                    </li>
                                    <li>
                                        <figure class="image"><a href="assets/images/news/gallery-6.jpg"
                                                class="lightbox-image" data-fancybox="gallery"><img
                                                    src="assets/images/news/gallery-6.jpg" alt=""></a></figure>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget tags-widget">
                            <div class="widget-title">
                                <h3>Tags</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="tags-list clearfix">
                                    <li><a href="blog-details.html">Adventures</a></li>
                                    <li><a href="blog-details.html">Health</a></li>
                                    <li><a href="blog-details.html">Care</a></li>
                                    <li><a href="blog-details.html">Cardiac</a></li>
                                    <li><a href="blog-details.html">Doctors</a></li>
                                    <li><a href="blog-details.html">Cardiac</a></li>
                                    <li><a href="blog-details.html">Hospital</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="news-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/news/news-11.jpg" alt="">
                                </figure>
                                <div class="lower-content">
                                    <ul class="post-info mb_15 clearfix">
                                        <li><a href="blog-details.html">Admin</a></li>
                                        <li>15 Jan 2022</li>
                                        <li>03 Comt</li>
                                    </ul>
                                    <h2>What Causes Inherited Retinal Diseases?</h2>
                                    <p>The abbreviation IRD refers to a group of hereditary conditions called retinal
                                        diseases. Genes con tain DNA, also known as “deoxyribonucleic acid.A gene contains
                                        the instructions necessary for the development and operation.</p>
                                    <p>of the retinal cells in our bodies. A “mistake” or alteration in one or more genes
                                        causes IRDs. Because of this, retinal cells don’t function properly, which
                                        eventually results in vision loss. Already, 250 genes have been linked to IRD.</p>
                                    <p>There are many more genes, but they haven’t all been discovered. Each IRD may be
                                        passed down differently within a family from one generation to the next. It’s
                                        possible that you or a member of your family has an IRD. You might be the oldest
                                        member of your family.</p>
                                    <h3>Results Are Easy To Obtain</h3>
                                    <p>Nullam elit elit, vehicula sit amet lobortis quis, luctus vitae purus. Etiam vitae
                                        leo non magna venenatis congue. Ut commodo, tellus id gravida ultricies, libero
                                        mauris aliquam enim, in luctus nunc nisi eu neque. Aenean lacinia, tortor ac
                                        sagittis venenatis, massa velit fringilla tortor, a venenatis mi sapien. Maecenas a
                                        tellus at justo molestie pulvinar</p>
                                    <div class="two-image">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                                <figure class="image mb_30"><img src="assets/images/news/news-12.jpg"
                                                        alt=""></figure>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                                <figure class="image mb_30"><img src="assets/images/news/news-13.jpg"
                                                        alt=""></figure>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Nullam elit elit, vehicula sit amet lobortis quis, luctus vitae purus. Etiam vitae
                                        leo non magna venenatis congue. Ut commodo, tellus id gravida ultricies, libero
                                        mauris aliquam enim, in luctus nunc nisi eu neque. Aenean lacinia, tortor ac
                                        sagittis venenatis, massa velit fringilla tortor, a venenatis mi sapien. Maecenas a
                                        tellus at justo molestie pulvinar</p>
                                    <blockquote>
                                        <div class="icon-box"><i class="icon-23"></i></div>
                                        <p>“It is a long established fact that a reader will be distracted by the readable
                                            content of a page when looking at its layout.“</p>
                                        <h4>Ralph Edwards</h4>
                                        <span class="designation">Dog Trainer</span>
                                    </blockquote>
                                    <p>Nullam elit elit, vehicula sit amet lobortis quis, luctus vitae purus. Etiam vitae
                                        leo non magna venenatis congue. Ut commodo, tellus id gravida ultricies, libero
                                        mauris aliquam enim, in luctus nunc nisi eu neque. Aenean lacinia, tortor ac
                                        sagittis venenatis, massa velit fringilla tortor, a venenatis mi sapien. Maecenas a
                                        tellus at justo molestie pulvinar</p>
                                </div>
                            </div>
                        </div>
                        <div class="post-tags mb_60">
                            <ul class="tags-list clearfix">
                                <li>
                                    <h3>Popular Tags:</h3>
                                </li>
                                <li><a href="blog-details.html">Adventures</a></li>
                                <li><a href="blog-details.html">Health</a></li>
                                <li><a href="blog-details.html">Care</a></li>
                                <li><a href="blog-details.html">Hospital</a></li>
                            </ul>
                        </div>
                        <div class="comment-form-box mb_60">
                            <h2>Leave A Comment</h2>
                            <form method="post" action="blog-details.html" class="default-form">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="text" placeholder="Name" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Type Comment here"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one"><span>Post
                                                Comment</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="comment-box">
                            <h3>2 Comments</h3>
                            <div class="comment-inner">
                                <div class="comment">
                                    <div class="comment-thumb">
                                        <figure class="thumb-box"><img src="assets/images/news/comment-1.jpg"
                                                alt=""></figure>
                                        <span class="date">08 Jan 2023</span>
                                    </div>
                                    <h4>Jane Cooper</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cursus ornare non non massa
                                        elit rutrum. Eros proin nibh neque interdum accumsan, neque vitae. Tortor etiam sed
                                        suspendisse.</p>
                                    <a href="blog-details.html" class="reply-btn">Reply</a>
                                </div>
                                <div class="comment">
                                    <div class="comment-thumb">
                                        <figure class="thumb-box"><img src="assets/images/news/comment-2.jpg"
                                                alt=""></figure>
                                        <span class="date">07 Jan 2023</span>
                                    </div>
                                    <h4>Marvin McKinney</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cursus ornare non non massa
                                        elit rutrum. Eros proin nibh neque interdum accumsan, neque vitae. Tortor etiam sed
                                        suspendisse.</p>
                                    <a href="blog-details.html" class="reply-btn">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->
@endsection
