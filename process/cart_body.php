<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
if (count($_SESSION['cart']) > 0) {
?>
    <h3 class="cart-page-title">Your cart items</h3>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="#">
                <div class="table-content table-responsive cart-table-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Until Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total += $value['price'];
                            ?>

                                <tr data-sku="<?php print $key ?>">
                                    <td class="product-thumbnail">
                                        <a href="<?php echo 'product-details.php?id_product=' . $value['id_product'] ?>"><img class="img-responsive ml-15px" src="<?php echo $value['images'] ?>" alt="" /></a>
                                    </td>
                                    <td class="product-name"><a href="#"><?php echo $value['name'] ?></a>
                                        <p>Size: <?php echo $value['option'] ?></p>
                                    </td>
                                    <td class="product-price-cart"><span class="amount"><?php echo $value['price'] ?></span></td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" onchange="changeQuantity('<?php print $value['stock'] ?>')" value="<?php echo $value['quantity'] ?>" />
                                        </div>
                                    </td>
                                    <td class="product-subtotal"><?php echo $value['quantity'] * $value['price'] ?></td>
                                    <td class="product-remove">
                                        <!-- <a href="#" for="qtybutton" onclick="editCartItem('<?php print $key ?>')"><i class="fa fa-pencil"></i></a> -->
                                        <a href="#" onclick="confirm('Bạn có muốn xóa không?') ? deleteCartItem('<?php print $key ?>') : event.preventDefault()"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-update">
                                <a href="#">Continue Shopping</a>
                            </div>
                            <div class="cart-clear">
                                <button>Update Shopping Cart</button>
                                <a href="#">Clear Shopping Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-lm-30px">
                    <div class="discount-code-wrapper">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                        </div>
                        <div class="discount-code">
                            <p>Enter your coupon code if you have one.</p>
                            <form>
                                <input type="text" required="" name="name" />
                                <button class="cart-btn-2" type="submit">Apply Coupon</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-lm-30px">

                </div>
                <div class="col-lg-4 col-md-12 mt-md-30px">
                    <div class="grand-totall">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                        </div>
                        <h5>Total products <span id="total-product"><?php echo  $total.' đ' ?></span></h5>
                        <div class="total-shipping">
                            <h5>Total shipping <span id="total-ship">30000 đ</span></h5>
                        </div>
                        <h4 class="grand-totall-title">Grand Total <span id="grand-total"><?php echo ($total + 30000).' đ' ?></span></h4>
                        <a onclick="goToCheckout()">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<?php
if (isset($_POST['deleteCartItem']) && isset($_POST['sku'])) {
    if (!isset($_SESSTION)) {
        session_start();
    }
    $sku = $_POST['sku'];
    unset($_SESSION['cart'][$sku]);
}
?>

<?php
if (isset($_POST['editCartItem']) && isset($_POST['sku']) && isset($_POST['qty'])) {
    if (!isset($_SESSTION)) {
        session_start();
    }
    $sku = $_POST['sku'];
    $quantity = $_POST['qty'];
    echo $quantity;
    // $_SESSION['cart'][$sku]['quantity'] = $quantity;
}
?>