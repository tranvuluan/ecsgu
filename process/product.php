<?php
$path = dirname(__FILE__);
require_once $path . '/../class/configurable_product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/wishlist.php';
$path = dirname(__FILE__);
require_once $path . '/../class/productEvaluate.php';
$path = dirname(__FILE__);
require_once $path . '/../class/LibClass.php';

if (!isset($_SESSION)) {
    session_start();
}


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
                            <span class="new">New</span>
                        </span> -->
                        <div class="actions">
                            <?php
                            if (isset($_SESSION['login'])) {
                                $wishlistModel = new Wishlist();
                                $wishlist = $wishlistModel->getWishlistByCustomerId($_SESSION['id_customer']);
                                $flag = 0;
                                if ($wishlist) {
                                    while ($rowWishlist = $wishlist->fetch_assoc()) {
                                        if ($rowWishlist['id_product'] == $row['id_product']) {
                                            $flag = 1;
                                            if ($flag == 1) {
                            ?>
                                                <a href="javascript:;" onclick="addToWishList(this)" class="action wishlist active" title="Wishlist" id="<?php print $row['id_product'] ?>"><i class="pe-7s-like"></i></a>
                                    <?php
                                                break;
                                            }
                                        }
                                    }
                                }
                                if ($flag == 0) {
                                    ?>
                                    <a href="javascript:;" onclick="addToWishList(this)" class="action wishlist" title="Wishlist" id="<?php print $row['id_product'] ?>"><i class="pe-7s-like"></i></a>
                                <?php
                                }
                            } else {
                                ?>
                                <a href="javascript:;" onclick="confirmLogin()" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a>
                            <?php
                            }
                            ?>
                            <!-- <a href="javascript:;" onclick="addToWishList(this)" class="action wishlist" title="Wishlist" id="<?php print $row['id_product'] ?>"><i class="pe-7s-like"></i></a> -->
                            <a href="#" onclick="viewDetailModal('<?php print $row['id_product'] ?>')" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                        </div>
                        <!-- <a href="#" onclick="addToCart('<?php print $row['id_product'] ?>')" title="Add To Cart" class=" add-to-cart">Add
                                                        To Cart</a> -->
                    </div>
                    <div class="content">
                        <span class="ratings">
                            <span class="rating-wrap">
                                <?php $rating = $row['rating'] ?>
                                <span class="star" style="width: <?php echo $rating * 20 ?>%"></span> <!-- width = 100% -> 5star -->
                            </span>

                            <span class="rating-num">( <?php
                                                        $productEvaluateModel = new ProductEvaluate();
                                                        $productEvaluate = $productEvaluateModel->getProductEvaluatesByProductId($row['id_product']);
                                                        $productEvaluate ? print($productEvaluate->num_rows) : print(0);
                                                        ?> Review )
                            </span>
                        </span>
                        <h5 class="title"><a href="<?php echo 'product-details.php?id_product=' . $row['id_product'] ?>"><?php echo $row['name'] ?>
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