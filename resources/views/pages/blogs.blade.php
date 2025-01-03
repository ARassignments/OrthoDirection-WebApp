@extends('../index')
@section('content')
<!-- page-title -->
<section class="page-title p_relative centred">
    <div class="bg-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Blogs</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Blogs</li>
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
                    <div class="sidebar-widget tags-widget">
                        <div class="widget-title">
                            <h3>Tags</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="tags-list clearfix">
                                <li><a href="#">Adventures</a></li>
                                <li><a href="#">Health</a></li>
                                <li><a href="#">Care</a></li>
                                <li><a href="#">Cardiac</a></li>
                                <li><a href="#">Doctors</a></li>
                                <li><a href="#">Cardiac</a></li>
                                <li><a href="#">Hospital</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-classic-content">
                    <div class="news-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><a href="/blog-detail"><img src="assets/images/news/news-7.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info mb_15 clearfix">
                                    <li><a href="#">Admin</a></li>
                                    <li>12 Jan 2022</li>
                                    <li>03 Comt</li>
                                </ul>
                                <h3><a href="/blog-details">How do Inherited Retinal of Diseases Happen?</a></h3>
                                <p>Tincidunt Maur nemi sit Interdum praesento eget morbi lacinia volutpat pellentesque Tincidunt aurna suspit.</p>
                                <div class="link">
                                    <a href="/blog-detail"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><a href="/blog-detail"><img src="assets/images/news/news-8.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info mb_15 clearfix">
                                    <li><a href="#">Admin</a></li>
                                    <li>11 Jan 2022</li>
                                    <li>05 Comt</li>
                                </ul>
                                <h3><a href="/blog-detail">Prepare to Speak with Your Eye Specialist.</a></h3>
                                <p>Tincidunt Maur nemi sit Interdum praesento eget morbi lacinia volutpat pellentesque Tincidunt aurna suspit.</p>
                                <div class="link">
                                    <a href="/blog-detail"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><a href="/blog-detail"><img src="assets/images/news/news-9.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info mb_15 clearfix">
                                    <li><a href="#">Admin</a></li>
                                    <li>10 Jan 2022</li>
                                    <li>0 Comt</li>
                                </ul>
                                <h3><a href="/blog-detail">How reliece can help you manage diabetes</a></h3>
                                <p>Tincidunt Maur nemi sit Interdum praesento eget morbi lacinia volutpat pellentesque Tincidunt aurna suspit.</p>
                                <div class="link">
                                    <a href="/blog-detail"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><a href="/blog-detail"><img src="assets/images/news/news-10.jpg" alt=""></a></figure>
                            <div class="lower-content">
                                <ul class="post-info mb_15 clearfix">
                                    <li><a href="#">Admin</a></li>
                                    <li>09 Jan 2022</li>
                                    <li>03 Comt</li>
                                </ul>
                                <h3><a href="/blog-detail">What Causes Inherited Retinal Diseases?</a></h3>
                                <p>Tincidunt Maur nemi sit Interdum praesento eget morbi lacinia volutpat pellentesque Tincidunt aurna suspit.</p>
                                <div class="link">
                                    <a href="/blog-detail"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-wrapper pt_20">
                        <ul class="pagination clearfix">
                            <li><a href="#" class="current">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="icon-36"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- sidebar-page-container end -->
@endsection