<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll" id="cart_items">
                <?php 
                print_r($_SESSION['cart']);
                    $path = dirname(__FILE__);
                    require_once $path.'/../process/cart_items.php';
                ?>
            </div>
            <div class="foot">
                <div class="buttons mt-30px">
                    <a href="cart.php" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                    <a href="checkout.php" class="btn btn-outline-dark current-btn">checkout</a>
                </div>
            </div>
        </div>
    </div>