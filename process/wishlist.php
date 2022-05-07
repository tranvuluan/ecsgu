<?php
$path = dirname(__FILE__);
require_once $path . '/../class/wishlist.php';
$path = dirname(__FILE__);
require_once $path . '/../class/product.php';
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php

if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}
?>

<?php
if (isset($_POST['addToWishList']) && isset($_POST['id_product'])) {
    if (!isset($_SESSION['login'])) {
        echo '<script>alert("You must login first!")</script>';
    } else {
        $wishlistModel = new Wishlist();
        $productModel = new Product();
        $id_wishlist = 'WL' . time();
        $id_product = $_POST['id_product'];
        $product = $productModel->getProductById($id_product)->fetch_assoc();
        $id_customer = $_SESSION['id_customer'];
        if (!isset($_SESSION['wishlist'][$id_product])) {
            $wishlistItems = [
                'id_wishlist' => $id_wishlist,
                'id_customer' => $id_customer,
                'id_product' => $id_product,
                'name' => $product['name'],
                'image' => $product['image'],
                'price' => $product['price'],
            ];
            $_SESSION['wishlist'][$id_product] = $wishlistItems;
        } else {
            unset($_SESSION['wishlist'][$id_product]);
        }
    }
}
?>

<?php
if (count($_SESSION['wishlist']) > 0) {
    foreach ($_SESSION['wishlist'] as $key => $value) {
?>
        <ul class="minicart-product-list">
            <li>
                <a href="product-details.php" class="image"><img src="<?php echo $value['image'] ?>" alt="Cart product Image"></a>
                <div class="content">
                    <a href="product-details.php" class="title"><?php echo $value['name'] ?></a>
                    <span class="quantity-price"><span class="amount"><?php echo $value['price'] ?></span></span>
                    <a href="#"  onclick=" confirm('Bạn có muốn xóa không?') ? removeItem('<?php print $key ?>') : event.preventDefault() " class="remove">×</a>
                </div>
            </li>
        </ul>
        <p></p>
<?php
    }
}
?>

<?php 
    if (isset($_POST['removeItem']) && isset($_POST['id_product'])) {
        $id_product = $_POST['id_product'];
        unset($_SESSION['wishlist'][$id_product]);
    }
?>