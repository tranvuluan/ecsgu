<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

?>
<?php
if (count($_SESSION['wishlist']) > 0) {
?>
    <h3 class="cart-page-title">Your wishlist items</h3>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="#">
                <div class="table-content table-responsive cart-table-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_SESSION['wishlist'] as $key => $value) {
                            ?>
                                <tr>
                                    <td class="product-thumbnail">
                                        <a href="<?php echo 'product-details.php?id_product=' . $value['id_product'] ?>"><img class="img-responsive ml-15px" src="<?php echo $value['image'] ?>" alt="" /></a>
                                    </td>
                                    <td class="product-name"><a href="#"><?php echo $value['name'] ?></a></td>
                                    <td class="product-price-cart"><span class="amount"><?php echo number_format($value['price']) ?>đ</span></td>

                                    <td class="product-wishlist-cart">
                                        <a href="<?php echo 'product-details.php?id_product=' . $value['id_product'] ?>">view product</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
<?php
}
else {
    ?>
        <div class="empty-cart-area pb-100px pt-100px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-heading">
                            <h2>Your wishlist item</h2>
                        </div>
                        <div class="empty-text-contant text-center">
                            <i class="pe-7s-like"></i>
                            <h3>There are no more items in your wishlist</h3>
                            <a class="empty-cart-btn" href="index.php">
                                <i class="fa fa-arrow-left"> </i> Continue shopping
                            </a>
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
    unset($_SESSION['wishlist'][$sku]);
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
    // $_SESSION['wishlist'][$sku]['quantity'] = $quantity;
}
?>