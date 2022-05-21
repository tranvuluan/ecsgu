<?php
$path = dirname(__FILE__);
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

    <!-- Contact Area Start -->
    <div class="contact-area pt-100px pb-100px">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-info">
                            <div class="single-contact">
                                <div class="icon-box">
                                    <img src="assets/images/icons/4.png" alt="">
                                </div>
                                <div class="info-box">
                                    <h5 class="title">Phone:</h5>
                                    <p><a href="tel:0123456789">012 345 67 89</a></p>
                                </div>
                            </div>
                            <div class="single-contact">
                                <div class="icon-box">
                                    <img src="assets/images/icons/5.png" alt="">
                                </div>
                                <div class="info-box">
                                    <h5 class="title">Email:</h5>
                                    <p><a href="mailto:demo@example.com">demo@example.com</a></p>
                                </div>
                            </div>
                            <div class="single-contact">
                                <div class="icon-box">
                                    <img src="assets/images/icons/6.png" alt="">
                                </div>
                                <div class="info-box">
                                    <h5 class="title">Address:</h5>
                                    <p>Your address goes here</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-form">
                            <div class="contact-title mb-30">
                                <h2 class="title" data-aos="fade-up" data-aos-delay="200">Leave a Message</h2>

                            </div>
                            <form class="contact-form-style" id="contact-form" action="assets/php/mail.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                        <input name="name" placeholder="Name*" type="text" />
                                    </div>
                                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                                        <input name="email" placeholder="Email*" type="email" />
                                    </div>
                                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                                        <textarea name="message" placeholder="Your Message*"></textarea>
                                        <button class="btn btn-primary mt-4" data-aos="fade-up" data-aos-delay="200" type="submit">Post Comment <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->

    <!-- map Area Start -->

    <div class="contact-map">
        
        <div style="width: 100%">
            <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=273%20An%20D%C6%B0%C6%A1ng%20V%C6%B0%C6%A1ng,%20Ph%C6%B0%E1%BB%9Dng%203,%20Qu%E1%BA%ADn%205+(JESCO)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                <a href="https://www.gps.ie/sport-gps/">fitness tracker</a>
            </iframe>
        </div>
    </div>
    <!-- map Area End -->
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