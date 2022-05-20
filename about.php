<?php
$path = dirname(__FILE__);
require_once $path . '/class/position.php';
$path = dirname(__FILE__);
require_once $path . '/class/employee.php';
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="index, follow" />
    <title>Jesco - Fashoin eCommerce HTML Template</title>
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

    <!-- About Intro Area start-->
    <div class="about-intro-area">
        <div class="container position-relative h-100 d-flex align-items-center">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-intro-content">
                        <h2 class="title">About Us</h2>
                        <h4>Giải pháp mua đồ mới lạ</h4>
                        <p>Quên đi những khoản chi trả kha khá và phải đi nhiều nơi lẻ tẻ để có được những món
                            đồ cơ bản nhất như áo thun, quần short, quần sịp, tất (vớ), chúng tôi mong muốn thay đổi mọi thứ.
                            Chỉ bằng vài cú click chuột và một tủ đồ đầy đủ sẽ đến gõ cửa nhà bạn ngay sau đó.</p>
                        <br>
                        <h4>Trải nghiệm mua sắm thông minh</h4>
                        <p>Coolmate đem lại sự thoải mái nhất trong mua sắm. Bạn có thể tự do xem bất kỳ món hàng nào,
                            theo dõi những món đồ muốn mua, mua hàng trong tích tắc
                            và thậm chí là có thể đổi trả 60 ngày miễn phí vì bất kỳ lý do gì.</p>
                        <br>
                        <h4>Giá cả hợp lý</h4>
                        <p>Tất cả những gì bạn thấy trên web là tất cả những gì bạn phải trả,
                            cam kết không có chi phí phát sinh trong quá trình mua và đổi trả hàng.</p>
                    </div>
                </div>
            </div>
            <!-- <div class="intro-left">
                <img src="assets/images/about-image/intro-left.png" alt="" class="intro-left-image">
            </div> -->
            <div class="intro-right">
                <img src="assets/images/product-image/a.jpg" alt="" class="intro-right-image">
            </div>
        </div>
    </div>

    <!-- About Intro Area End-->

    <!-- Service Area Start -->
    <!-- 
    <div class="service-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="service-left align-self-center align-items-center">
                        <img src="assets/images/about-image/srevice-left-img.png" alt="" class="service-left-image">
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="service-right-content align-self-center align-items-center">
                        <span class="sami-title">100% Guaranteed Pure Cotton</span>
                        <h2 class="title">Best Products Here
                            Every Day</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius modjior tem incididunt
                            ut labore et dolore magna aliqua.</p>
                        <a href="shop-left-sidebar.html" class="btn btn-primary service-btn"> Shop Now <i class="fa fa-shopping-basket ml-10px" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Service Area End -->

    <!-- Team Area Start -->

    <div class="team-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30px0px">
                        <h2 class="title line-height-1">#ourteam</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $positionModel = new Position();
                $id_position =  '627c8065c8515';
                $employeeModel = new Employee();
                $employee = $employeeModel->getEmployeeByIdPosition($id_position);
                if ($employee) {
                    while ($row = $employee->fetch_assoc()) {
                ?>
                        <div class="col-md-4 mb-lm-30px">
                            <!-- Single Team -->
                            <div class="team-wrapper">
                                <div class="team-image overflow-hidden">
                                    <img src="<?php echo $row['image'] ?>" alt="" width="100%">
                                </div>
                                <div class="team-content">
                                    <h6 class="title"><?php echo $row['fullname'] ?></h6>
                                    <span class="sub-title">Our Team</span>
                                </div>
                                <ul class="team-social d-flex">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                            <!-- Single Team -->
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Team Area End -->

    <!-- Feature Area Srart -->
    <div class="feature-area pb-100px pt-100px bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- single item -->
                    <div class="single-feature border-0">
                        <div class="feature-icon">
                            <img src="assets/images/icons/1.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h4 class="title">Free Shipping</h4>
                            <span class="sub-title">Capped at 999.000đ</span>
                        </div>
                    </div>
                </div>
                <!-- single item -->
                <div class="col-lg-4 col-md-6 mb-md-30px mb-lm-30px mt-lm-30px">
                    <div class="single-feature border-0">
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
                    <div class="single-feature border-0">
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

    <!-- Testimonial Area Start -->
    <div class="testimonial-area pb-40px pt-100px ">
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
                                <p>Giá cả hợp lý. <br>
                                    Chất lượng tốt

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
                                <p>Giá cả hợp lý. <br>
                                    Chất lượng tốt

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
                                <p>Giá cả hợp lý. <br>
                                    Chất lượng tốt

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
                    <!-- <div class="swiper-slide">
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
                    </div> -->
                    <!-- Slider Single Item -->
                    <!-- <div class="swiper-slide">
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
                    </div> -->
                    <!-- Slider Single Item -->
                </div>
            </div>
            <!-- Slider Start -->
        </div>
    </div>
    <!-- Testimonial Area End -->

    <!-- Brand area start -->
    <div class="brand-area pb-100px">
        <div class="container">
            <div class="brand-slider swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/brand-logo/1.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/brand-logo/2.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/brand-logo/3.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/brand-logo/4.png" alt="" /></a>
                    </div>
                    <div class="swiper-slide brand-slider-item text-center">
                        <a href="#"><img class=" img-fluid" src="assets/images/brand-logo/5.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand area end -->

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