<?php
$path = dirname(__FILE__);
require_once $path . '/../class/LibClass.php';

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
                        <span class="badges">
                            <span class="new">Sale</span>
                        </span>
                        <div class="actions">
                            <a href="wishlist.php" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a>
                            <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                        </div>
                        <button title="Add To Cart" class=" add-to-cart">Add
                            To Cart</button>
                    </div>
                    <div class="content">
                        <span class="ratings">
                            <span class="rating-wrap">
                                <span class="star" style="width: 60%"></span>
                            </span>
                            <span class="rating-num">( 3 Review )</span>
                        </span>
                        <h5 class="title"><a href="product-details.php"><?php echo $row['name'] ?></a></h5>
                        <span class="price">
                            <span class="new"><?php echo $row['price'] ?></span>
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