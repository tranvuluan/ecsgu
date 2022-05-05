<?php
$path = realpath(dirname(__FILE__));

require_once($path . '/class/product.php');
require_once($path . '/category.php');
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
    $categoryModel = new Category();
    ?>

    <!--Top bar, Header Area Start -->
    <?php 
    $path = dirname(__FILE__);
    require_once($path . '/includes/header.php') ?>
    <!--Top bar, Header Area End -->
    <!-- Header Area End -->
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


    <!-- Shop Page Start  -->
    <div class="shop-category-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last col-md-12 order-md-first">
                    <!-- Shop Top Area Start -->
                    <div class="shop-top-bar d-flex">
                        <!-- Left Side start -->
                        <p><span>12</span> Product Found of <span>30</span></p>
                        <!-- Left Side End -->
                        <div class="shop-tab nav">
                            <a class="active" href="#shop-grid" data-bs-toggle="tab">
                                <i class="fa fa-th" aria-hidden="true"></i>
                            </a>
                            <a href="#shop-list" data-bs-toggle="tab">
                                <i class="fa fa-list" aria-hidden="true"></i>
                            </a>
                        </div>
                        <!-- Right Side Start -->
                        <div class="select-shoing-wrap d-flex align-items-center">
                            <div class="shot-product">
                                <p>Sort By:</p>
                            </div>
                            <div class="shop-select">
                                <select class="shop-sort">
                                    <option data-display="Relevance">Relevance</option>
                                    <option value="1"> Name, A to Z</option>
                                    <option value="2"> Name, Z to A</option>
                                    <option value="3"> Price, low to high</option>
                                    <option value="4"> Price, high to low</option>
                                </select>

                            </div>
                        </div>
                        <!-- Right Side End -->
                    </div>
                    <!-- Shop Top Area End -->

                    <!-- Shop Bottom Area Start -->
                    <div class="shop-bottom-area">

                        <!-- Tab Content Area Start -->
                        <div class="row">
                            <div class="col">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="shop-grid">
                                        <div class="row mb-n-30px" id="grid_product">
                                            <?php $showproduct = $productModel->getProducts();
                                            if ($showproduct) {
                                                while ($row = $showproduct->fetch_assoc()) {
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
                                            ?>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="shop-list">
                                        <?php $showproduct = $productModel->getProducts();
                                        if ($showproduct) {
                                            while ($row = $showproduct->fetch_assoc()) {
                                        ?>
                                                <div class="shop-list-wrapper">
                                                    <div class="row">
                                                        <div class="col-md-5 col-lg-5 col-xl-4">
                                                            <div class="product">
                                                                <div class="thumb">
                                                                    <a href="product-details.php" class="image">
                                                                        <img src="<?php echo $row['image'] ?>" alt="Product" />
                                                                        <img class="hover-image" src="assets/images/product-image/1.jpg" alt="Product" />
                                                                    </a>
                                                                    <span class="badges">
                                                                        <span class="new">New</span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-lg-7 col-xl-8">
                                                            <div class="content-desc-wrap">
                                                                <div class="content">
                                                                    <span class="ratings">
                                                                        <span class="rating-wrap">
                                                                            <span class="star" style="width: 100%"></span>
                                                                        </span>
                                                                        <span class="rating-num">( 5 Review )</span>
                                                                    </span>
                                                                    <h5 class="title"><a href="product-details.php"><?php echo $row['name'] ?></a></h5>
                                                                    <p><?php echo $row['description'] ?></p>
                                                                </div>
                                                                <div class="box-inner">
                                                                    <span class="price">
                                                                        <span class="new"><?php echo $row['price'] ?></span>
                                                                    </span>
                                                                    <div class="actions">
                                                                        <a href="wishlist.html" class="action wishlist" title="Wishlist"><i class="pe-7s-like"></i></a>
                                                                        <a href="#" class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                                        <a href="compare.html" class="action compare" title="Compare"><i class="pe-7s-refresh-2"></i></a>
                                                                    </div>
                                                                    <button title="Add To Cart" class=" add-to-cart">Add
                                                                        To Cart</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab Content Area End -->

                        <!--  Pagination Area Start -->
                        <div class="load-more-items text-center mb-md-60px mb-lm-60px mt-30px0px" data-aos="fade-up">
                            <a href="#" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Load More <i class="fa fa-refresh ml-15px" aria-hidden="true"></i></a>
                        </div>
                        <!--  Pagination Area End -->
                    </div>
                    <!-- Shop Bottom Area End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="col-lg-3 order-lg-first col-md-12 order-md-last mb-md-60px mb-lm-60px">
                    <div class="shop-sidebar-wrap">
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget-search">
                            <form id="widgets-searchbox" action="#">
                                <input class="input-field" type="text" placeholder="Search">
                                <button class="widgets-searchbox-btn" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h4 class="sidebar-title">Category</h4>
                            <div class="sidebar-widget-category">
                                <ul>
                                    <?php
                                    $showcategory = $categoryModel->getCategories();
                                    if ($showcategory) {
                                        while ($row = $showcategory->fetch_assoc()) {
                                    ?>
                                            <li><a class="selected m-0" onclick="filterCategory('<?php echo $row['id_category'] ?>')"><?php echo $row['name']; ?><span>(???)</span></a></li>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <!-- <li><a href="#" class="selected m-0">Accesasories <span>(6)</span> </a></li>
                                    <li><a href="#" class="">Computer <span>(4)</span> </a></li>
                                    <li><a href="#" class="">Covid-19 <span>(2)</span> </a></li>
                                    <li><a href="#" class="">Electronics <span>(6)</span> </a></li>
                                    <li><a href="#" class="">Frame Sunglasses <span>(12)</span> </a></li>
                                    <li><a href="#" class="">Furniture <span>(7)</span> </a></li>
                                    <li><a href="#" class="">Genuine Leather <span>(9)</span> </a></li> -->
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget">
                            <h4 class="sidebar-title">Size</h4>
                            <div class="sidebar-widget-list size">
                                <ul>
                                    <li><a onclick="filterSize('S')" class="active-2 gray" href="#">S</a></li>
                                    <li><a onclick="filterSize('M')" class="gray" href="#">M</a></li>
                                    <li><a onclick="filterSize('L')" class="gray" href="#">L</a></li>
                                    <li><a onclick="filterSize('XL')" class="gray" href="#">XL</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                        <div class="sidebar-widget-image">
                            <div class="single-banner">
                                <img src="assets/images/banner/2.jpg" alt="">
                                <div class="item-disc">
                                    <h2 class="title">#bestsellers</h2>
                                    <a href="single-product-variable.html" class="shop-link">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar single item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page End  -->

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
    <script src="./assets/js/category.js"></script>
    <!-- END JavaScripts -->
</body>

</html>