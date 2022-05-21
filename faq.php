
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
require_once($path . '/includes/offcanvasCart.php')?>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
<?php 
$path = dirname(__FILE__);
require_once($path . '/includes/offcanvasMenu.php')?>
    <!-- OffCanvas Menu End -->

    <!--Faq Policy area start-->
    <div class="login-register-area pb-100px pt-100px faq-area">
        <div class="container">
            <div class="row">
                <div class="ml-auto mr-auto col-lg-9">
                    <div class="checkout-wrapper">
                        <div class="inner-descripe" data-aos="fade-up" data-aos-delay="200">
                            <h4 class="title">Below are frequently asked questions, you may find the answer for yourself
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id erat sagittis, faucibus metus malesuada, eleifend turpis. Mauris semper augue id nisl aliquet, a porta lectus mattis. Nulla at tortor augue. In eget enim diam.
                                Donec gravida tortor sem, ac fermentum nibh rutrum sit amet. Nulla convallis mauris vitae congue consequat. Donec interdum nunc purus, vitae vulputate arcu fringilla quis. Vivamus iaculis euismod dui.</p>
                        </div>
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>1 .</span> <a data-bs-toggle="collapse" href="#my-account-1" class="collapsed" aria-expanded="true">Mauris congue
                                            euismod purus at semper?</a></h3>
                                </div>
                                <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                    <div class="panel-body">
                                        Donec mattis finibus elit ut tristique. Nullam tempus nunc eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla ultricies, elit lorem eleifend lorem
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>2 .</span> <a data-bs-toggle="collapse" href="#my-account-2" aria-expanded="false" class="collapsed">Donec mattis finibus elit ut tristique?</a></h3>
                                </div>
                                <div id="my-account-2" class="panel-collapse collapse" data-bs-parent="#faq">
                                    <div class="panel-body">Donec mattis finibus elit ut tristique. Nullam tempus nunc eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla ultricies,
                                        elit lorem eleifend lorem
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>3 .</span> <a data-bs-toggle="collapse" href="#my-account-3">Aenean elit orci, efficitur quis
                                            nisl?</a></h3>
                                </div>
                                <div id="my-account-3" class="panel-collapse collapse" data-bs-parent="#faq">
                                    <div class="panel-body">Donec mattis finibus elit ut tristique. Nullam tempus nunc eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla ultricies,
                                        elit lorem eleifend lorem
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>4 .</span> <a data-bs-toggle="collapse" href="#my-account-4">Pellentesque habitant morbi
                                            tristique?</a></h3>
                                </div>
                                <div id="my-account-4" class="panel-collapse collapse" data-bs-parent="#faq">
                                    <div class="panel-body">Donec mattis finibus elit ut tristique. Nullam tempus nunc eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla ultricies,
                                        elit lorem eleifend lorem
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default single-my-account m-0" data-aos="fade-up" data-aos-delay="200">
                                <div class="panel-heading my-account-title">
                                    <h3 class="panel-title"><span>5 .</span> <a data-bs-toggle="collapse" href="#my-account-5">Nam pellentesque aliquam metus?</a>
                                    </h3>
                                </div>
                                <div id="my-account-5" class="panel-collapse collapse" data-bs-parent="#faq">
                                    <div class="panel-body">Donec mattis finibus elit ut tristique. Nullam tempus nunc eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla ultricies,
                                        elit lorem eleifend lorem
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Faq Policy area end-->

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

    <!-- Global Vendor, plugins JS -->


<!-- JavaScripts -->
<?php 
$path = dirname(__FILE__);
require_once($path . '/includes/scripts.php')?>
<!-- END JavaScripts -->
</body>

</html>