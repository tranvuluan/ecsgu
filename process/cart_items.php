<?php
if (!isset($_SESSION)) {
    session_start();
}

$_SESSION['cart'] ? $_SESSION['cart'] : $_SESSION['cart'] = [];

if (isset($_GET['addToCar'])) {
    $id_product = $_GET['id_product'];
    if (isset($_SESSION['cart'][$id_product]))
        $_SESSION['cart'][$id_product]['quantity']++;
    else {

        $item = [
            'id' => $id,
            'name' => $_GET['name'],
            'price' => $_GET['price'],
            'quantity' => 1
        ];
        $_SESSION['cart'][$id] = $product;
    }
}

if (count($_SESSION['cart']) > 0) {
    foreach ($$_SESSION['cart'] as $key => $value) {
        # code...
?>

        <ul class="minicart-product-list">
            <li>
                <a href="product-details.php" class="image"><img src="assets/images/product-image/1.jpg" alt="Cart product Image"></a>
                <div class="content">
                    <a href="product-details.php" class="title">Women's Elizabeth Coat</a>
                    <span class="quantity-price">1 x <span class="amount">$18.86</span></span>
                    <a href="#" class="remove">×</a>
                </div>
            </li>
            <li>
                <a href="product-details.php" class="image"><img src="assets/images/product-image/2.jpg" alt="Cart product Image"></a>
                <div class="content">
                    <a href="product-details.php" class="title">Long sleeve knee length</a>
                    <span class="quantity-price">1 x <span class="amount">$43.28</span></span>
                    <a href="#" class="remove">×</a>
                </div>
            </li>
            <li>
                <a href="product-details.php" class="image"><img src="assets/images/product-image/3.jpg" alt="Cart product Image"></a>
                <div class="content">
                    <a href="product-details.php" class="title">Cool Man Wearing Leather</a>
                    <span class="quantity-price">1 x <span class="amount">$37.34</span></span>
                    <a href="#" class="remove">×</a>
                </div>
            </li>
        </ul>
<?php
    }
}
?>