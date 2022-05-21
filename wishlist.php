<?php
$path = realpath(dirname(__FILE__));
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


    <!-- Wishlist Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container" id="wishlist_body">
            <?php
            $path = dirname(__FILE__);
            require_once $path . '/process/wishlist_body.php';
            ?>
        </div>
    </div>

    <!-- Wishlist Area End -->

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
    <script src="./assets/js/wishlist.js"></script>
</body>

</html>