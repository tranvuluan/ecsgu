<?php
$path = dirname(__FILE__);
require_once($path . '/class/product.php');

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

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>

<body>

    <?php $productModel = new Product(); ?>

    <!--Top bar, Header Area Start -->

    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/header.php')
    ?>
    <!--Top bar, Header Area End -->
    <div class="offcanvas-overlay"></div>

    <!-- OffCanvas Wishlist Start -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/offcanvasWishlist.php')
    ?>
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

    <!-- Hero/Intro Slider Start -->
    <div class="section ">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
            <!-- Hero slider Active -->
            <div class="swiper-wrapper">
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex bg-color1">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">Offer 2021</span>
                                    <h2 class="title-1">Sale Up To </h2>
                                    <h2 class="title-2"><span>50%</span> Off</h2>
                                    <a href="categories.php" class="btn btn-lg btn-primary btn-hover-dark"> Shop Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                                <div class="show-case">
                                    <div class="hero-slide-image">
                                        <img src="assets/images/slider-image/slider1.jpg" alt="" width="90%" />
                                    </div>
                                        <!-- <div class="display-wrapper">
                                            <div class="content-side">
                                                <h4 class="title">Full Dress</h4>
                                                <span class="price">$21.00</span>
                                                <a href="categories.php" class="shop-link">Shop Now</a>
                                            </div>
                                            <div class="image-side">
                                                <img src="assets/images/slider-image/display.jpg" alt="" width="97px" height="89px">
                                            </div>
                                        </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide d-flex bg-color2">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 align-self-center sm-center-view">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">Offer 2021</span>
                                    <h2 class="title-1">Sale Up To </h2>
                                    <h2 class="title-2"><span>50%</span> Off</h2>
                                    <a href="categories.php" class="btn btn-lg btn-primary btn-hover-dark"> Shop Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center position-relative">
                                <div class="show-case">
                                    <div class="hero-slide-image">
                                        <img src="assets/images/slider-image/slider2.jpg" alt="" width="70%" />
                                    </div>
                                    <!-- <div class="display-wrapper">
                                        <div class="content-side">
                                            <h4 class="title">Full Dress</h4>
                                            <span class="price">$21.00</span>
                                            <a href="categories.php" class="shop-link">Shop Now</a>
                                        </div>
                                        <div class="image-side">
                                            <img src="assets/images/slider-image/display.jpg" alt="" width="97px" height="89px">
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <!-- Hero/Intro Slider End -->

    <!-- Banner Area Start -->
    <div class="banner-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="single-col">
                    <a href="categories.php" class="single-banner">
                        <img src="assets/images/banner/banner1.jpg" alt="">
                        <div class="item-disc">
                            <span class="item-title">Women</span>
                            <span class="item-amount">16 items</span>
                        </div>
                    </a>
                </div>
                <div class="single-col center-col">
                    <div class="single-banner">
                        <img src="assets/images/banner/banner2.jpg" alt="">
                        <div class="item-disc">
                            <h2 class="title">#bestsellers</h2>
                            <a href="categories.php" class="shop-link">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="single-col">
                    <a href="categories.php" class="single-banner">
                        <img src="assets/images/banner/banner3.jpg" alt="">
                        <div class="item-disc">
                            <span class="item-title">Nomen</span>
                            <span class="item-amount">16 items</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <!-- Feature Area Srart -->
    <div class="feature-area pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6  ">
                    <!-- single item -->
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="assets/images/icons/1.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Free Shipping</h4>
                            <span class="sub-title">Capped at 999.000đ per order</span>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-4 col-md-6 mb-md-30px mb-lm-30px mt-lm-30px">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="assets/images/icons/2.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Card Payments</h4>
                            <span class="sub-title">12 Months Installments</span>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-4 col-md-6 ">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="assets/images/icons/3.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Easy Returns</h4>
                            <span class="sub-title">Shop With Confidence</span>
                        </div>
                    </div>
                    <!-- single item -->
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Area End -->

    <!-- Product Area Start -->
    <div class="product-area">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg col-md col-12">
                    <div class="section-title mb-0">
                        <h2 class="title">#products</h2>
                    </div>
                </div>
                <!-- Section Title End -->

                <!-- Tab Start -->
                <div class="col-lg-auto col-md-auto col-12">
                    <ul class="product-tab-nav nav">
                        <li class="nav-item"><a class="nav-link active" data-option='all' onclick="filterProduct(this)">All</a></li>
                        <li class="nav-item"><a class="nav-link" data-option='new' onclick="filterProduct(this)">New</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-option='bestseller' onclick="filterProduct(this)">Bestsellers</a></li>
                        <li class="nav-item"><a class="nav-link" data-option='sale' onclick="filterProduct(this)">Items
                                Sale</a></li>
                    </ul>
                </div>
                <!-- Tab End -->
            </div>
            <!-- Section Title & Tab End -->

            <div class="row">
                <div class="col">
                    <div class="tab-content top-borber" >
                        <!--  list product by filter -->
                        <div class="tab-pane fade show active">
                            <div class="row" id="filterProduct">
                            </div>
                        </div>
                        <!--  end list product by filter -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End -->

    <!-- Deal Area Start -->
    <div class="deal-area pb-100px pt-100px">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="deal-inner deal-bg position-relative pt-100px pb-100px" data-bg-image="assets/images/deal-img/banner1.jpg">
                        <div class="deal-wrapper">
                            <span class="category">#FASHION SHOP</span>
                            <h3 class="title">Deal Of The Day</h3>
                            <div class="deal-timing">
                                <div data-countdown="2021/05/15"></div>
                            </div>
                            <a href="categories.php" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Shop
                                Now <i class="fa fa-shopping-basket ml-15px" aria-hidden="true"></i></a>
                        </div>
                        <!-- <div class="deal-image">
                            <img class="img-fluid" src="assets/images/deal-img/banner2.jpg" alt="" width="50%" >
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Area End -->

    <!-- Testimonial Area Start -->
    <div class="testimonial-area pb-40px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-0">
                        <h2 class="title line-height-1">#testimonials</h2>
                    </div>
                </div>
            </div>
            <!-- Slider Start -->
            <div class="testimonial-wrapper swiper-container">
                <div class="swiper-wrapper">
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Sản phẩm thoáng mát, không bí. Thích hợp cho các hoạt động thể thao với các loại quần áo thể thao
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="http://res.cloudinary.com/luantransgu/image/upload/v1652435790/signed_upload_demo_form/uszujqtdl5fdjlqqiz2c.jpg" width="100%" height="100px" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Tran Vu Luan</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Nhiều chương trình ưu đãi. Giá cả hợp lý, chất liệu tốt. Sẽ luôn ủng hộ của hàng dài lâu.
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="http://res.cloudinary.com/luantransgu/image/upload/v1652435790/signed_upload_demo_form/uszujqtdl5fdjlqqiz2c.jpg" width="100%" height="100px" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Nguyen Duc Manh</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Giao hàng nhanh chóng, chất lượng tốt. Sẽ tốt hơn khi có cửa hàng trực tiếp cho việc mua sắm thì tốt hơn.
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="http://res.cloudinary.com/luantransgu/image/upload/v1652435790/signed_upload_demo_form/uszujqtdl5fdjlqqiz2c.jpg" width="100%" height="100px" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Vu Ba Kiet</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="http://res.cloudinary.com/luantransgu/image/upload/v1652435790/signed_upload_demo_form/uszujqtdl5fdjlqqiz2c.jpg" width="100%" height="100px" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Tran Vu Luan</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                    <div class="swiper-slide">
                        <div class="testi-inner">
                            <div class="reating-wrap">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="testi-content">
                                <p>Lorem ipsum dolor sit amet, consect adipisici elit, sed do eiusmod tempol incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniamfhq nostrud exercitation.
                                </p>
                            </div>
                            <div class="testi-author">
                                <div class="author-img">
                                    <img src="http://res.cloudinary.com/luantransgu/image/upload/v1652435790/signed_upload_demo_form/uszujqtdl5fdjlqqiz2c.jpg" width="100%" height="100px" alt="">
                                </div>
                                <div class="author-name">
                                    <h4 class="name">Vu Ba Kiet</h4>
                                    <span class="title">Happy Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item -->
                </div>
            </div>
            <!-- Slider Start -->
        </div>
    </div>
    <!-- Testimonial Area End -->

    <!-- Brand area start -->
    
    <!-- Brand area end -->

    <!-- Footer Area Start -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/footer.php') ?>
    <!-- Footer Area End -->

    <!-- Modals -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/modals.php')
    ?>
    <!-- END Modals -->
    <!-- Global Vendor, plugins JS -->

    <!-- JavaScripts -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/scripts.php') ?>
    <!-- END JavaScripts -->

    <script src="./assets/js/product-index.js"></script>
    <script src="./assets/js/wishlist.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>

</html>