<?php 
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }
    print_r($_SESSION['cart']);
?>
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div id="cart-items"></div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                <?php
                foreach ($_SESSION['cart'] as $key => $value) {
                ?>
                    <li>
                        <a href="product-details.php" class="image"><img src="<?php echo $value['images'] ?>" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="product-details.php" class="title"><?php echo $value['name'] ?></a>
                            <span class="quantity-price"><?php echo $value['quantity'] ?> x <span class="amount"><?php echo $value['price'] ?></span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="foot">
            <div class="buttons mt-30px">
                <a href="cart.php" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                <a href="checkout.php" class="btn btn-outline-dark current-btn">checkout</a>
            </div>
        </div>
    </div>
</div>