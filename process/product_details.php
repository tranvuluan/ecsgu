<?php
$path = dirname(__FILE__);
require_once $path . '/../class/product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/configurable_product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/categoryChild.php';

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<?php
if (isset($_GET['id_product'])) {
    $showproductById = $productModel->getProductById($id_product);
    if ($showproductById) {
        while ($result = $showproductById->fetch_assoc()) {

?>
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                    <!-- Swiper -->
                    <div class="swiper-container zoom-top">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide zoom-image-hover">
                                <img class="img-responsive m-auto" src="<?php echo $result['image'] ?>" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-content quickview-content">
                        <h2><?php echo $result['name'] ?></h2>
                        <div class="pricing-meta">
                            <ul>
                                <li class="old-price not-cut"><?php echo number_format($result['price']) ?>đ</li>
                            </ul>
                        </div>
                        <div class="pro-details-rating-wrap">
                            <div class="rating-product">
                                <?php
                                for ($i = 0; $i < $result['rating']; $i++) {
                                ?>
                                    <i class="fa fa-star"></i>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <!-- <div class="pro-details-color-info d-flex align-items-center">
                                    <span>Color</span>
                                    <div class="pro-details-color">
                                        <ul>
                                            <li><a class="active-color yellow" href="#"></a></li>
                                            <li><a class="black" href="#"></a></li>
                                            <li><a class="red" href="#"></a></li>
                                            <li><a class="pink" href="#"></a></li>
                                        </ul>
                                    </div>
                                </div> -->
                        <!-- Sidebar single item -->
                        <div class="pro-details-size-info d-flex align-items-center">
                            <span>Size</span>
                            <div class="pro-details-size">
                                <ul>
                                    <?php
                                    $configurableProduct = $configurableProductModel->getConfigurableProductById($result['id_product']);
                                    if ($configurableProduct) {
                                        while ($resultConfigurableProduct = $configurableProduct->fetch_assoc()) {
                                    ?>

                                            <li><a class="gray" href="#" onclick="pickSize('<?php print $resultConfigurableProduct['sku'] ?>')"><?php echo $resultConfigurableProduct['option'] ?></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <p class="m-0"><?php echo $result['description'] ?></p>
                        <div class="pro-details-quality">
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            <div class="pro-details-cart">
                                <button class="add-cart" onclick="addToCart('<?php print $result['id_product'] ?>')" href="#"> Add To
                                    Cart</button>
                            </div>
                            <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                <?php
                                if (isset($_SESSION['login'])) {
                                    $wishlistModel = new Wishlist();
                                    $wishlist = $wishlistModel->getWishlistByCustomerId($_SESSION['id_customer']);
                                    if ($wishlist) {
                                        while ($rowWishlist = $wishlist->fetch_assoc()) {
                                            if ($rowWishlist['id_product'] == $result['id_product']) {
                                ?>
                                                <a style="color: red;" href="javascript:;" onclick="addToWishListProductDetail(this)" id="<?php print $result['id_product'] ?>" ><i class="pe-7s-like"></i></a>
                                            <?php

                                            } else {
                                            ?>
                                                <!-- <a style="color: white;" href="javascript:;" onclick="addToWishListProductDetail(this)" id="<?php print $result['id_product'] ?>"><i class="pe-7s-like"></i></a> -->
                                        <?php
                                            }
                                        }
                                    } else {
                                        ?>
                                        <a style="color: white;" href="javascript:;" onclick="addToWishListProductDetail(this)" id="<?php print $result['id_product'] ?>"><i class="pe-7s-like"></i></a>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <a style="color: white;" href="javascript:;" onclick="addToWishListProductDetail(this)" id="<?php print $result['id_product'] ?>"><i class="pe-7s-like"></i></a>
                                <?php
                                }
                                ?>
                                <!-- <a href="javascript:;" onclick="addToWishListProductDetail(this)" id="<?php print $result['id_product'] ?>"><i class="pe-7s-like"></i></a> -->
                            </div>
                        </div>
                        <div id="viewSKU">
                        </div>
                        <div class="pro-details-social-info pro-details-same-style d-flex">
                            <span>Share: </span>
                            <ul class="d-flex">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
    <?php
        }
    }
}
    ?>
    <?php
    $configurableProductModel = new ConfigurableProduct();
    $productModel = new Product();
    $categoryChildModel = new CategoryChild();
    if (isset($_POST['pickSize']) && isset($_POST['sku'])) {
        $sku = $_POST['sku'];
    ?>
        <div class="pro-details-sku-info pro-details-same-style  d-flex">
            <span>SKU: </span>
            <ul class="d-flex">
                <?php
                $configurableProduct = $configurableProductModel->getConfigurableProductBySku($sku)->fetch_assoc();
                if ($configurableProduct) {
                ?>
                    <li><a href="#"><?php echo $configurableProduct['sku'] ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="pro-details-categories-info pro-details-same-style d-flex">
            <span>Categories: </span>
            <ul class="d-flex">
                <?php
                $productId = $configurableProductModel->getConfigurableProductBySku($sku)->fetch_assoc()['id_product'];
                $product = $productModel->getProductById($productId)->fetch_assoc();
                $nameCategory = $categoryChildModel->getCategoryChildByIds($product['id_categorychild'])->fetch_assoc();
                if ($nameCategory) {
                ?>
                    <li><a href="#"><?php echo $nameCategory['name'] ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    <?php
    }
    ?>