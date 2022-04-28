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

    <!--Top bar, Header Area Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/header.php') ?>
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

    <?php
    print_r($_SESSION['cart']);
    ?>
    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                foreach ($_SESSION['cart'] as $key => $value) {
                                ?>
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="<?php echo 'product-details.php?id_product=' . $value['id_product'] ?>"><img class="img-responsive ml-15px" src="<?php echo $value['images'] ?>" alt="" /></a>
                                            </td>
                                            <td class="product-name"><a href="#"><?php echo $value['name'] ?></a></td>
                                            <td class="product-price-cart"><span class="amount"><?php echo $value['price'] ?></span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="<?php echo $value['quantity'] ?>" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><?php echo $value['quantity']* $value['price'] ?></td>
                                            <td class="product-remove">
                                                <a href="#"><i class="fa fa-pencil"></i></a>
                                                <a href="#"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="#">Continue Shopping</a>
                                    </div>
                                    <div class="cart-clear">
                                        <button>Update Shopping Cart</button>
                                        <a href="#">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-lm-30px">
                            <div class="cart-tax">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                </div>
                                <div class="tax-wrapper">
                                    <p>Enter your destination to get a shipping estimate.</p>
                                    <div class="tax-select-wrapper">
                                        <div class="tax-select">
                                            <label>
                                                * Country
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select">
                                            <label>
                                                * Region / State
                                            </label>
                                            <select class="email s-email s-wid">
                                                <option>Bangladesh</option>
                                                <option>Albania</option>
                                                <option>Åland Islands</option>
                                                <option>Afghanistan</option>
                                                <option>Belgium</option>
                                            </select>
                                        </div>
                                        <div class="tax-select mb-25px">
                                            <label>
                                                * Zip/Postal Code
                                            </label>
                                            <input type="text" />
                                        </div>
                                        <button class="cart-btn-2" type="submit">Get A Quote</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-lm-30px">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                </div>
                                <div class="discount-code">
                                    <p>Enter your coupon code if you have one.</p>
                                    <form>
                                        <input type="text" required="" name="name" />
                                        <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 mt-md-30px">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                </div>
                                <h5>Total products <span>$260.00</span></h5>
                                <div class="total-shipping">
                                    <h5>Total shipping</h5>
                                    <ul>
                                        <li><input type="checkbox" /> Standard <span>$20.00</span></li>
                                        <li><input type="checkbox" /> Express <span>$30.00</span></li>
                                    </ul>
                                </div>
                                <h4 class="grand-totall-title">Grand Total <span>$260.00</span></h4>
                                <a href="checkout.html">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->

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

    <!-- JavaScripts -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/scripts.php') ?>
    <!-- END JavaScripts -->
</body>

</html>