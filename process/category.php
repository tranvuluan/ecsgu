<?php
$path = dirname(__FILE__);
require_once $path . '/../class/LibClass.php';
$path = dirname(__FILE__);
require_once $path . '/../class/productEvaluate.php';
$path = dirname(__FILE__);
require_once $path . '/../class/product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/wishlist.php';

if(!isset($_SESSION)){
    session_start();
}

if (isset($_GET['filterProduct'])) {
    $category = $_GET['category'];
    $size = $_GET['size'];
    $LibClassModel = new LibClass();
    $filterProduct = $LibClassModel->filterProductByCategoryFilter($category, $size);
    if ($filterProduct) {
        while ($row = $filterProduct->fetch_assoc()) {
?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up" data-aos-delay="800">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="product-details.php?id_product=<?php echo $row['id_product'] ?>" class="image">
                            <img src="<?php echo $row['image'] ?>" alt="Product" />
                            <img class="hover-image" src="<?php echo $row['image'] ?>" alt="Product" />
                        </a>
                        <!-- <span class="badges">
                            <span class="new">Sale</span>
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
                            <!-- <a href="wishlist.php" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a> -->
                            <!-- <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a> -->
                        </div>
                        <!-- <button title="Add To Cart" class=" add-to-cart">Add
                            To Cart</button> -->
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
                        <h5 class="title"><a href="product-details.php"><?php echo $row['name'] ?></a></h5>
                        <span class="price">
                            <span class="new"><?php echo number_format($row['price']) ?>đ</span>
                        </span>
                    </div>
                </div>
                <!-- Single Prodect -->
            </div>
<?php
        }
    }
}
?>

<?php
if (isset($_GET['filterProductByKeyword']) && isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $productModel = new Product();
    $searchItem = $productModel->searchItem($keyword);
    if ($searchItem) {
        while ($row = $searchItem->fetch_assoc()) {
            if ($row['status'] == 0)
                continue;
?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up" data-aos-delay="800">
                <!-- Single Prodect -->
                <div class="product">
                    <div class="thumb">
                        <a href="product-details.php?id_product=<?php echo $row['id_product'] ?>" class="image">
                            <img src="<?php echo $row['image'] ?>" alt="Product" />
                            <img class="hover-image" src="<?php echo $row['image'] ?>" alt="Product" />
                        </a>
                        <!-- <span class="badges">
                            <span class="new">Sale</span>
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
                            <!-- <a href="wishlist.php" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a> -->
                            <!-- <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a> -->
                        </div>
                        <!-- <button title="Add To Cart" class=" add-to-cart">Add
                            To Cart</button> -->
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
                        <h5 class="title"><a href="product-details.php"><?php echo $row['name'] ?></a></h5>
                        <span class="price">
                            <span class="new"><?php echo number_format($row['price']) ?>đ</span>
                        </span>
                    </div>
                </div>
                <!-- Single Prodect -->
            </div>
<?php
        }
    }
}
?>