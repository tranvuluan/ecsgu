<?php
$path = dirname(__FILE__);
require_once $path . '/../class/product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/configurable_product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/categoryChild.php';
?>
<?php
if (isset($_POST['viewDetailModal']) && isset($_POST['id_product'])) {
    $id_product = $_POST['id_product'];
    $productModel = new Product();
    $configurableProductModel = new ConfigurableProduct();
    $showproductById = $productModel->getProductById($id_product);
    if ($showproductById) {
        while ($result = $showproductById->fetch_assoc()) {
?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
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
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton"  value="1" />
                                        </div>
                                        <div class="pro-details-cart">
                                            <button class="add-cart" onclick="addToCart('<?php print $result['id_product'] ?>')" href="#"> Add To
                                                Cart</button>
                                        </div>
                                        <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                            <a href="javascript:;" onclick="addToWishList('<?php print $result['id_product'] ?>')"><i class="pe-7s-like"></i></a>
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
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    }
}
?>