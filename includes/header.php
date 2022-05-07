<?php
    // session_start();
    if (!isset($_SESSION)) {
        session_start();
    }

?>

<!-- Top Bar -->

    <div class="header-to-bar"> HELLO EVERYONE! 25% Off All Products </div>

<!-- Top Bar -->

<header>
        <div class="header-main sticky-nav ">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-auto align-self-center">
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/images/logo/logo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <div class="col align-self-center d-none d-lg-block">
                        <div class="main-menu">
                            <ul>
                                <li class="dropdown"><a href="index.php">Home </a>
                                </li>
                                <li class="dropdown"><a href="#">Shop <i
                                    class="pe-7s-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="categories.php">Category</a></li>
                                    </ul>
                                </li>
                                </li>
                                <li class="dropdown "><a href="blogs.php">Blogs</a>
                                </li>
                                <li class="dropdown"><a href="about.php">About us <i
                                    class="pe-7s-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <!-- <li><a href="my-account.php">Account</a></li> -->
                                        <li><a href="privacy-policy.php">Privacy Policy</a></li>
                                        <li><a href="faq.php">Faq</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Action Start -->
                    <div class="col col-lg-auto align-self-center pl-0">
                        <div class="header-actions">
                            <?php
                                if(isset($_SESSION['login']) && isset($_SESSION['id_customer'])){
                                    echo '<a href="my-account.php" class="header-action-btn login-btn">'.$_SESSION['fullname'].'</a>';
                                }
                                else {
                                    echo '<a href="login.php" class="header-action-btn login-btn" data-bs-toggle="modal"
                                    data-bs-target="#loginActive">Sign In</a>';
                                }
                            ?>
                            
                            <!-- Single Wedge Start -->
                            <a href="#" class="header-action-btn" data-bs-toggle="modal" data-bs-target="#searchActive">
                                <i class="pe-7s-search"></i>
                            </a>
                            <!-- Single Wedge End -->
                            <!-- Single Wedge Start -->
                            <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                                <i class="pe-7s-like"></i>
                            </a>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart"
                                class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num"><?php isset($_SESSION['cart']) ? print(count($_SESSION['cart'])): print(0)  ?></span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu"
                                class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="pe-7s-menu"></i>
                            </a>
                        </div>
                        <!-- Header Action End -->
                    </div>
                </div>
            </div>
    </header>
    <div id="switchModal"></div>