<?php
$path = realpath(dirname(__FILE__));
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

    <style>
        .social-login a {
            width: 50px;
            height: 50px;

        }

        .social-login a img {
            width: 100%;
            border: 1px solid #e4e6eb;
            padding: 13px;
            border-radius: 10px;
        }

        .social-login-footer a {
            color: #3c3e40;
        }

        .seperator {
            background-color: #ffffff;
            left: 35%;
            padding: 0px 10px;
        }

        .seperator-2 {
            background-color: #ffffff;
            left: 45%;
            padding: 0px 10px;
        }
    </style>
    <!--Top bar, Header Area Start -->
    <?php require_once($path . '/includes/header.php') ?>
    <!--Top bar, Header Area End -->
    <div class="offcanvas-overlay"></div>

    <!-- OffCanvas Wishlist Start -->
    <?php require_once($path . '/includes/offcanvasWishlist.php') ?>
    <!-- OffCanvas Wishlist End -->
    <!-- OffCanvas Cart Start -->
    <?php require_once($path . '/includes/offcanvasCart.php') ?>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <?php require_once($path . '/includes/offcanvasMenu.php') ?>
    <!-- OffCanvas Menu End -->

    <!-- login area start -->
    <div class="login-register-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-bs-toggle="tab" href="#lg1">
                                <h4>login</h4>
                            </a>
                            <a data-bs-toggle="tab" href="#lg2">
                                <h4>register</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <input type="text" name="user-name" placeholder="Username" />
                                            <input type="password" name="user-password" placeholder="Password" />
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" />
                                                    <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="d-grid">
                                                        <button type="button" class="btn btn-dark">Sign In</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <input type="text" name="user-name" placeholder="Username" />
                                            <input name="user-email" placeholder="Email" type="email" />
                                            <input type="password" name="user-password" placeholder="Password" />
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" />
                                                    <a class="flote-none" href="javascript:void(0)">I agree the Terms and Conditions</a>
                                                </div>
                                                <div class="">
                                                    <div class="d-grid">
                                                        <button type="button" class="btn btn-dark">Register</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="position-relative border-bottom my-3">
                                                    <div class="position-absolute seperator translate-middle-y">or continue with</div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="social-login d-flex flex-row align-items-center justify-content-center gap-2 my-2">
                                                    <a href="javascript:;" class=""><img src="assets/images/icons/facebook.png" alt=""></a>
                                                    <a href="javascript:;" class=""><img src="assets/images/icons/apple-black-logo.png" alt=""></a>
                                                    <a href="javascript:;" class=""><img src="assets/images/icons/google.png" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <p class="mb-0">Already have an account? <a href="authentication-sign-in-simple.html">Sign in</a></p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- Footer Area Start -->
    <?php require_once($path . '/includes/footer.php') ?>
    <!-- Footer Area End -->

    <!-- Modals -->
    <?php require_once($path . '/includes/modals.php') ?>
    <!-- END Modals -->

    <!-- JavaScripts -->
    <?php require_once($path . '/includes/scripts.php') ?>
    <!-- END JavaScripts -->
</body>

</html>