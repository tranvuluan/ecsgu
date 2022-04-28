<?php
$path = dirname(__FILE__);
require_once $path . '/../class/product.php';
require_once $path . '/../class/configurable_product.php';
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$productModel = new Product();
$configurableProductModel = new ConfigurableProduct();

if (isset($_POST['addToCart']) && isset($_POST['id_product']) && isset($_POST['sku']) && isset($_POST['qty'])) {
    $id_product = $_POST['id_product'];
    $sku = $_POST['sku'];
    $qty = $_POST['qty'];
    echo $qty;
    $product = $productModel->getProductById($id_product)->fetch_assoc();
    $configurablekProduct = $configurableProductModel->getConfigurableProductBySKU($sku)->fetch_assoc();

    $stock = $configurablekProduct['stock'];

    if (isset($_SESSION['cart'][$sku])) {
        if ($stock > $_SESSION['cart'][$sku]['quantity']) {
            $_SESSION['cart'][$sku]['quantity'] += $qty;
        }
        else {
            echo '<script>alert("Stock is not enough!")</script>';
        }
        if($stock < $_SESSION['cart'][$sku]['quantity']){
            $_SESSION['cart'][$sku]['quantity'] = $stock;
            echo '<script>alert("Stock is not enough!")</script>';
        }

    } else {
        if ($stock > 0) {
            $items = [
                'id_product' => $id_product,
                'sku' => $sku,
                'quantity' => $qty,
                'price' => $product['price'],
                'name' => $product['name'],
                'option' => $configurablekProduct['option'],      
                'images' => $product['image'],
                'stock' => $stock
            ];
            $_SESSION['cart'][$sku] = $items;
        } else {
            echo '<script>alert("Stock is not enough!")</script>';

        }
    }
}
print_r($_SESSION['cart']);

if (count($_SESSION['cart']) > 0) {
    foreach ($_SESSION['cart'] as $key => $value) {
?>
        <ul class="minicart-product-list">
            <li>
                <a href="product-details.php" class="image"><img src="<?php echo $value['images'] ?>" alt="Cart product Image"></a>
                <div class="content">
                    <a href="product-details.php" class="title"><?php echo $value['name'] ?></a>
                    <span class="quantity-price">Size: <?php echo $value['option'] ?></span>
                    <span class="quantity-price"><?php echo $value['quantity'] ?> x <span class="amount"><?php echo $value['price'] ?></span></span>
                    <a href="#" class="remove">×</a>
                </div>
            </li>
            <p></p>
        </ul>
<?php
    }
}
?>