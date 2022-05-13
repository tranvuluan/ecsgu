<?php
$path = realpath(dirname(__FILE__));
require_once($path . '/class/product.php');
$path = realpath(dirname(__FILE__));
require_once($path . '/class/configurable_product.php');
$path = realpath(dirname(__FILE__));
require_once($path . '/class/productEvaluate.php');
$path = realpath(dirname(__FILE__));
require_once($path . '/class/customer.php');

if (!isset($_SESSION)) {
    session_start();
}
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

    <?php
    $productModel = new Product();
    $configurableProductModel = new ConfigurableProduct();
    $productEvaluateModel = new ProductEvaluate();
    ?>

    <?php
    if (isset($_GET['id_product'])) {
        $id_product = $_GET['id_product'];
    }
    ?>

    <!--Top bar, Header Area Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/header.php');
    ?>
    <!--Top bar, Header Area End -->
    <div class="offcanvas-overlay"></div>

    <!-- OffCanvas Wishlist Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/offcanvasWishlist.php') ?>
    <!-- OffCanvas Wishlist End -->
    <!-- OffCanvas Cart Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/offcanvasCart.php') ?>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/offcanvasMenu.php') ?>
    <!-- OffCanvas Menu End -->



    <!-- Product Details Area Start -->
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <?php
            $path = dirname(__FILE__);
            require_once $path . '/process/product_details.php';
            ?>
        </div>
        <br><br><br>

        <!-- product details description area start -->
        <div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav">
                        <a data-bs-toggle="tab" href="#des-details2" onclick="viewInformation('<?php print $_GET['id_product'] ?>')">Information</a>
                        <a class="active" data-bs-toggle="tab" href="#des-details1" onclick="viewDescription('<?php print $_GET['id_product'] ?>')">Description</a>
                        <a data-bs-toggle="tab" href="#des-details3" onclick="viewReview('<?php print $_GET['id_product'] ?>')">Reviews</a>
                    </div>
                    <div class="tab-content description-review-bottom">
                        <div id="des-details2" class="tab-pane">

                        </div>
                        <div id="des-details1" class="tab-pane active">

                        </div>
                        <div id="des-details3" class="tab-pane">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product details description area end -->

        <!-- Related product Area Start -->
        <div class="related-product-area pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-30px0px line-height-1">
                            <h2 class="title m-0">Related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
                    <div class="new-product-wrapper swiper-wrapper">
                        <?php $showRelatedProduct = $productModel->getProducts();
                        if ($showRelatedProduct) {
                            while ($row = $showRelatedProduct->fetch_assoc()) {
                        ?>
                                <div class="new-product-item swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="product-details.php?id_product=<?php echo $row['id_product'] ?>" class="image">
                                                <img src="<?php echo $row['image'] ?>" alt="Product" />
                                                <img class="hover-image" src="<?php echo $row['image'] ?>" alt="Product" />
                                            </a>
                                            <span class="badges">
                                                <span class="new">New</span>
                                            </span>
                                            <div class="actions">
                                                <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                <a href="compare.html" class="action compare" title="Compare"><i class="pe-7s-refresh-2"></i></a>
                                            </div>
                                            <button title="Add To Cart" class=" add-to-cart">Add
                                                To Cart</button>
                                        </div>
                                        <div class="content">
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">( 5 Review )</span>
                                            </span>
                                            <h5 class="title"><a href="product-details.php?id_product=<?php echo $row['id_product']  ?>"><?php echo $row['name'] ?>
                                                </a>
                                            </h5>
                                            <span class="price">
                                                <span class="new"><?php echo $row['price'] ?></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Related product Area End -->
    </div>
    </div>

    <!-- Footer Area Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/footer.php') ?>
    <!-- Footer Area End -->

    <!-- Modals -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/modals.php') ?>
    <!-- END Modals -->
<div id="AlertEvaluate"></div>
    <!-- JavaScripts -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/scripts.php') ?>
    <!-- END JavaScripts -->
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/wishlist.js"></script>
    <script src="./assets/js/description-product.js"></script>
</body>

</html>