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

        $wishlist = $wishlistModel->getWishlistByCustomerId($id_customer);
        if ($wishlist) {
            $wishlistByProductId = $wishlistModel->getWishlistByProductId($id_product);
            if ($wishlistByProductId) {
                while ($row = $wishlistByProductId->fetch_assoc()) {
                    if ($row['id_product'] == $id_product) {
                        $wishlistModel->delete($row['id_wishlist']);
                    } else {
                        $wishlistModel->insert($id_wishlist, $id_customer, $id_product);
                    }
                }
            } else {
                $wishlistModel->insert($id_wishlist, $id_customer, $id_product);
            }
        } else {
            $wishlistModel->insert($id_wishlist, $id_customer, $id_product);
        }
    }
}
?>



<?php
if (isset($_SESSION['login'])) {
    $wishlistModel = new Wishlist();
    $productModel = new Product();
    $wishlist = $wishlistModel->getWishlists();
    if ($wishlist) {
        while ($row = $wishlist->fetch_assoc()) {
            $product = $productModel->getProductById($row['id_product'])->fetch_assoc();
?>
            <ul class="minicart-product-list">
                <li>
                    <a href="<?php echo 'product-details.php?id_product=' . $product['id_product'] ?>" class="image"><img src="<?php echo $product['image'] ?>" alt="Cart product Image"></a>
                    <div class="content">
                        <a href="product-details.php" class="title"><?php echo $product['name'] ?></a>
                        <span class="quantity-price"><span class="amount"><?php echo number_format($product['price']) ?>đ</span></span>
                        <a href="#" onclick=" confirm('Bạn có muốn xóa không?') ? removeItem('<?php print $row['id_product'] ?>') : event.preventDefault() " class="remove">×</a>
                    </div>
                </li>
            </ul>
            <p></p>
<?php
        }
    }
}
?>

<?php
if (isset($_POST['removeItem']) && isset($_POST['id_product'])) {
    $id_product = $_POST['id_product'];
    $wishlistModel = new Wishlist();
    $wishlist = $wishlistModel->getWishlistByProductId($id_product)->fetch_assoc();
    $wishlistModel->delete($wishlist['id_wishlist']);
}
?>