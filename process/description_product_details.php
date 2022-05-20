<?php
$path = dirname(__FILE__);
require_once $path . '/../class/product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/productEvaluate.php';
$path = dirname(__FILE__);
require_once $path . '/../class/customer.php';
$path = dirname(__FILE__);
require_once $path . '/../class/brand.php';
$path = dirname(__FILE__);
require_once $path . '/../class/categoryChild.php';
if(!isset($_SESSION)){
    session_start();
}   
?>

<?php
if (isset($_POST['viewReview']) && isset($_POST['id_product'])) {
    $productModel = new Product();
    $productEvaluateModel = new ProductEvaluate();
    $customerModel = new Customer();
?>
    <div class="row">
        <div class="col-lg-7">
            <div class="review-wrapper">
                <?php
                $id_product = $_POST['id_product'];
                $viewEvaluate = $productEvaluateModel->getProductEvaluatesByProductId($id_product);
                if ($viewEvaluate) {
                    while ($rowEvaluate = $viewEvaluate->fetch_assoc()) {
                ?>
                        <div class="single-review">
                            <div class="review-img" style="text-align: center;">
                                <?php
                                $product = $productModel->getProductById($rowEvaluate['id_product'])->fetch_assoc();
                                ?>
                                <img src="<?php echo $product['image'] ?>" alt="" width="100%" />
                                <br>
                                <span style="font-size: small;"><i><?php echo $product['name'] ?></i></span>
                                <?php
                                ?>

                            </div>
                            <div class="review-content">
                                <div class="review-top-wrap">
                                    <div class="review-left">
                                        <div class="review-name">
                                            <?php
                                            $customer = $customerModel->getCustomerByIdCustomer($rowEvaluate['id_customer'])->fetch_assoc();
                                            ?>
                                            <h4><?php echo $customer['fullname'] ?></h4>
                                        </div>
                                        <div class="rating-product">
                                            <?php
                                            for ($i = 0; $i < $rowEvaluate['rating']; $i++) {
                                            ?>
                                                <i class="fa fa-star"></i>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-bottom">
                                    <p>
                                        <?php echo $rowEvaluate['evaluate'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <!-- <div class="single-review child-review">
                                            <div class="review-img">
                                                <img src="assets/images/review-image/2.png" alt="" />
                                            </div>
                                            <div class="review-content">
                                                <div class="review-top-wrap">
                                                    <div class="review-left">
                                                        <div class="review-name">
                                                            <h4>White Lewis</h4>
                                                        </div>
                                                        <div class="rating-product">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="review-left">
                                                        <a href="#">Reply</a>
                                                    </div>
                                                </div>
                                                <div class="review-bottom">
                                                    <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                        cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                        euismod vehicula.</p>
                                                </div>
                                            </div>
                                        </div> -->

            </div>
        </div>
        <div class="col-lg-5">
            <div class="ratting-form-wrapper pl-50">
                <h5>Add a Review</h5>
                <div class="ratting-form">
                    <form>
                        <div class="star-box">
                            <span>Your rating:</span>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                        
                        <div class="rating-form-style form-submit">
                            <textarea class="form-control" id="rateProduct" placeholder="Message"></textarea>
                            <br>
                            <div class="your-order-area">
                                <div class="Place-order mt-25" style="margin-top: 0!important;">
                                    <a class="btn-hover" onclick="rateProduct('<?php print $id_product ?>')" href="javascript:;">Evaluate</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<?php
if (isset($_POST['viewDescription']) && isset($_POST['id_product'])) {
    $productModel = new Product();
    $product = $productModel->getProductById($_POST['id_product'])->fetch_assoc();
?>
    <div class="product-description-wrapper">
        <p>
            <?php echo $product['description'] ?>
        </p>
    </div>
<?php
}
?>

<?php
if (isset($_POST['viewInformation']) && isset($_POST['id_product'])) {
    $productModel = new Product();
    $product = $productModel->getProductById($_POST['id_product'])->fetch_assoc();
?>
    <div class="product-anotherinfo-wrapper text-start">
        <ul>
            <li><span>Brand</span>
            <?php 
            $brandModel = new Brand();
            $brand = $brandModel->getBrandById($product['id_brand'])->fetch_assoc();
            echo $brand['name'];
            ?>
            </li>
            <li><span>Category</span>
            <?php 
            $categoryChildModel = new CategoryChild();
            $categoryChild = $categoryChildModel->getCategoryChildByIds($product['id_categorychild'])->fetch_assoc();
            echo $categoryChild['name'];
            ?>
        </li>
            <li><span>Rating</span><?php echo $product['rating'] ?>/5<i class="fa fa-star"></i></li>
        </ul>
    </div>
<?php
}
?>

<?php 
    if(isset($_POST['rate']) && isset($_POST['id_product'])){
        if(!isset($_SESSION['login'])){
            echo '<script>alert("You need to login first!")</script>';
        }
        else{
            $id_customer = $_SESSION['id_customer'];
            $id_product = $_POST['id_product'];
            $rating = $_POST['rating'];
            $evaluate = $_POST['evaluate'];
            $productEvaluateModel = new ProductEvaluate();
            $insertEvaluateProduct = $productEvaluateModel->insertEvaluate($id_product, $id_customer, $rating, $evaluate);
            if ($insertEvaluateProduct) {
                $avgProduct = $productEvaluateModel->ratingProduct($id_product)->fetch_assoc();
                $updateRating = $productModel->updateRating($id_product, $avgProduct['avg']);
                echo '<script>alert("Evaluate success!")</script>';
            } else {
                echo '<script>alert("Evaluate fail!")</script>';
            }
        }
    }
?>