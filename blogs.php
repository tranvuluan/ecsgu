<?php
$path = dirname(__FILE__);

if (!isset($_SESSION)) session_start();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="index, follow" />
    <title>EC Shop</title>
    <meta name="description" content="Jesco - Fashoin eCommerce HTML Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.ico" type="image/png">


    <!-- vendor css (Icon Font) -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.css" />

    <!-- plugins css (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="assets/css/plugins/venobox.css" />

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/style.min.css"> -->

    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css" />

</head>

<body>

    <!--Top bar, Header Area Start -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/header.php') ?>
    <!--Top bar, Header Area End -->
    <div class="offcanvas-overlay"></div>

    <!-- OffCanvas Wishlist Start -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/offcanvasWishlist.php') ?>
    <!-- OffCanvas Wishlist End -->
    <!-- OffCanvas Cart Start -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/offcanvasCart.php') ?>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/offcanvasMenu.php') ?>
    <!-- OffCanvas Menu End -->

    <!-- Blog Area Start -->
    <div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-last col-md-12 order-md-first">
                    <div class="row  mb-n-50">
                        <div class="col-lg-6 col-md-6 mb-50px">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="blog-single-left-sidebar.html"><img src="assets/images/blog-image/1.jfif" class="img-responsive w-100" alt=""></a>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-athor-date">
                                        <a class="blog-date height-shape" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 24 Aug, 2021</a>
                                        <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                            K</a>
                                    </div>
                                    <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single-left-sidebar.html">What is cropped pants man?</a></h5>

                                    <p>How high can you go? With menswear, you know what qualifies as a short and what
                                        you’d wear as trousers, but cropped silhouettes</p>

                                    <a href="#" class="btn btn-primary blog-btn"> Read More<i class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <div class="col-lg-6 col-md-6 mb-50px">
                            <div class="single-blog ">
                                <div class="blog-image">
                                    <a href="blog-single-left-sidebar.html"><img src="assets/images/blog-image/2.jpg" class="img-responsive w-100" alt=""></a>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-athor-date">
                                        <a class="blog-date height-shape" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 24 Aug, 2021</a>
                                        <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                            K</a>
                                    </div>
                                    <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single-left-sidebar.html">How to Choose the Ideal Polo shirt</a></h5>

                                    <p>On the spectrum of style, the polo shirt falls between a t-shirt and a dress shirt."

                                        When looking to outfit your team, there are three main factors to consider when choosing a polo shirt: material, knit, and fit.</p>

                                    <a href="#" class="btn btn-primary blog-btn"> Read More<i class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        
                        <!-- End single blog -->
                        <div class="col-lg-6 col-md-6 mb-50px">
                            <div class="single-blog">
                                <div class="blog-post-media">
                                    <div class="blog-post-audio sidebar">
                                        <iframe class="embed-responsive-item" width="500" height="320" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/182537870&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>
                                    </div>
                                </div>
                                <br><br><br><br>
                                <div class="single-blog">
                                    <div class="blog-post-media">
                                        <div class="blog-post-video position-relative">
                                            <a class="venobox venoboxvid video-icon overflow-hidden vbox-item" data-gall="gall-video" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=K2Jw6LDN8gg" target=_blank>
                                                <img class="img-responsive w-100 thumb-image" src="assets/images/blog-image/banner.jpg" alt="">
                                                <img class="icon" src="assets/images/icons/icon-youtube-play.png" alt="">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        
                        <div class="col-lg-6 col-md-6 mb-50px">
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a href="blog-single-left-sidebar.html"><img src="assets/images/blog-image/1.jpeg" class="img-responsive w-100" alt=""></a>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-athor-date">
                                        <a class="blog-date height-shape" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 24 Aug, 2021</a>
                                        <a class="blog-mosion" href="#"><i class="fa fa-commenting" aria-hidden="true"></i> 1.5
                                            K</a>
                                    </div>
                                    <h5 class="blog-heading"><a class="blog-heading-link" href="blog-single-left-sidebar.html">G-Dragon: Influence on the world fashion village</a></h5>

                                    <p>GDragon fashion holds the throne in the world trending village. The fashion village is always vibrant with the male idol's constant fashion earthquakes.</p>

                                    <a href="#" class="btn btn-primary blog-btn"> Read More<i class="fa fa-arrow-right ml-5px" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--  Pagination Area Start -->
                        

                    </div>
                </div>
                <!-- Sidebar Area Start -->
                <div class="col-lg-4 order-lg-first col-md-12 order-md-last mt-md-50px mt-lm-50px" data-aos="fade-up" data-aos-delay="200">
                    <div class="blog-sidebar mr-20px">
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Search Here</h3>
                            <div class="search-widget">
                                <form action="#">
                                    <input placeholder="Search Your Article" type="text" />
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Post Categories</h3>
                            <div class="category-post">
                                <ul>
                                    <li><a href="#" class="selected">Women Fashion <span>(19)</span> </a></li>
                                    <li><a href="#" class="">Men Fashion <span>(12)</span> </a></li>
                                    <li><a href="#" class="">Baby Fashion <span>(5)</span> </a></li>
                                    <li><a href="#" class="">Fashion Shop <span>(19)</span> </a></li>
                                    <li><a href="#" class="">New Collection <span>(12)</span> </a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Recent Post</h3>

                            <div class="recent-post-widget">
                                <div class="recent-single-post d-flex">
                                    <div class="thumb-side">
                                        <a href="blog-single-left-sidebar.html"><img src="assets/images/blog-image/1.jfif" alt="" /></a>
                                    </div>
                                    <div class="media-side">
                                        <span class="date"> <i class="fa fa-calendar"></i> 24 Aug, 2021</span>
                                        <h5><a href="blog-single-left-sidebar.html">What is cropped pants man?</a>
                                        </h5>
                                    </div>
                                </div>
                                <div class="recent-single-post d-flex">
                                    <div class="thumb-side">
                                        <a href="blog-single-left-sidebar.html"><img src="assets/images/blog-image/2.jpg" alt="" /></a>
                                    </div>
                                    <div class="media-side">
                                        <span class="date"> <i class="fa fa-calendar"></i> 24 Aug, 2021</span>
                                        <h5><a href="blog-single-left-sidebar.html">How to Choose the Ideal Polo shirt</a>
                                        </h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">Popular Tag</h3>

                            <div class="sidebar-widget-tag d-inline-block">
                                <ul>
                                    <li><a href="#">New Fashion</a></li>
                                    <li><a href="#">Products</a></li>
                                    <li><a href="#">Fashion Products</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Women Fashion</a></li>
                                    <li><a href="#">Dress</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                    </div>
                </div>
                <!-- Sidebar Area End -->
            </div>
            <!-- End single blog -->
        </div>
    </div>
    <!-- Blag Area End -->

    <!-- Footer Area Start -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/footer.php') ?>
    <!-- Footer Area End -->

    <!-- Modals -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/modals.php') ?>
    <!-- END Modals -->

    <!-- JavaScripts -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/scripts.php') ?>
    <!-- END JavaScripts -->
</body>

</html>