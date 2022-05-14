<?php
$path = dirname(__FILE__);
require_once $path . '/../class/configurable_product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/productSale.php';
$path = dirname(__FILE__);
require_once $path . '/../class/wishlist.php';
$path = dirname(__FILE__);
require_once $path . '/../class/LibClass.php';


if (isset($_GET['checkStock']) && isset($_GET['quantity'])) {
    $ConfigurableProductModel = new ConfigurableProduct();
    $sku = $_GET['sku'];
    $getSKU = $ConfigurableProductModel->getConfigurableProductBySKU($sku);
    if ($getSKU) {
        $sku = $getSKU->fetch_assoc();
        $stock = $sku['stock'];
        if ($_GET['quantity'] > $stock) {
            echo 0;
        } else {
            echo 1;
        }
    } else {
        echo 0;
    }
}


if (isset($_GET['filterProduct'])) {
    $option = $_GET['option'];
    $LibClassModel = new LibClass();
    $filterProductByIndexFilter = $LibClassModel->filterProductByIndexFilter($option);
    if ($filterProductByIndexFilter) {
        while ($row = $filterProductByIndexFilter->fetch_assoc()) {
            if ($row['status'] == 0)
                continue;
?>


            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up" data-aos-delay="200">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="<?php echo 'product-details.php?id_product=' . $row['id_product'] ?>" class="image">
                            <img src="<?php echo $row['image'] ?>" alt="Product" />
                            <img class="hover-image" src="<?php echo $row['image'] ?>" alt="Product" />
                        </a>
                        <!-- <span class="badges">
                            <span class="new">
                                <?php
                                $configurableProductModel = new ConfigurableProduct();
                                $productSaleModel = new ProductSale();
                                $configurableProduct = $configurableProductModel->getConfigurableProductById($row['id_product'])->fetch_assoc();
                                if ($configurableProduct['id_product'] == $row['id_product']) {
                                    $productSale = $productSaleModel->getProductSales()->fetch_assoc();
                                    if ($productSale['id_product'] == $row['id_product']) {
                                        echo 'Sale';
                                    } else {
                                        $sumQuantitySold = $configurableProductModel->sumQuantitySoldByIdProduct($row['id_product']);
                                        echo $sumQuantitySold >= 5 ? 'Hot' : 'New';
                                    }
                                }
                                ?>
                            </span>
                        </span> -->
                        <div class="actions">
                            <?php
                            $wishlistModel = new Wishlist();
                            $checkWishlist = $wishlistModel->getWishlistById($row['id_product']);
                            if ($checkWishlist) {
                                $checkWishlist = $checkWishlist->fetch_assoc();
                                if ($checkWishlist['id_product'] == $row['id_product'] && $checkWishlist['id_customer'] == $_SESSION['id_customer']) {
                            ?>
                                    <a style="color: red;" href="javascript:;" onclick="addToWishList('<?php print $row['id_product'] ?>')" class="action wishlist" title="Wishlist">
                                        <ion-icon name="heart-circle-sharp"></ion-icon>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <!-- <a href="javascript:;" onclick="addToWishList('<?php print $row['id_product'] ?>')" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a> -->
                                    abc
                            <?php
                                }
                            }
                            ?>
                            <a href="javascript:;" onclick="addToWishList('<?php print $row['id_product'] ?>')" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a>
                            <a href="#" onclick="viewDetailModal('<?php print $row['id_product'] ?>')" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                        </div>
                        <!-- <a href="#" onclick="addToCart('<?php print $row['id_product'] ?>')" title="Add To Cart" class=" add-to-cart">Add
                                                        To Cart</a> -->
                    </div>
                    <div class="content">
                        <span class="ratings">
                            <span class="rating-wrap">
                                <span class="star" style="width: 100%"></span>
                            </span>
                            <span class="rating-num">( 5 Review )</span>
                        </span>
                        <h5 class="title"><a href="product-details.php"><?php echo $row['name'] ?>
                            </a>
                        </h5>
                        <span class="price">
                            <span class="new"><?php echo number_format($row['price']) ?>đ</span>
                        </span>
                    </div>
                </div>
            </div>

<?php
        }
    }
}

?>