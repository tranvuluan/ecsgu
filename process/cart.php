<?php 
    $path = dirname(__FILE__);
    require_once $path. '/../class/product.php';
    require_once $path. '/../class/configurable_product.php';
    session_start();
?>

<?php 
    $productModel = new Product();
    $configurableProductModel = new ConfigurableProduct();

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    if(isset($_POST['addToCart']) && isset($_POST['id_product'])){
        $id_product = $_POST['id_product'];
        $product = $productModel->getProductById($id_product)->fetch_assoc();
        $getStockProduct = $configurableProductModel->getConfigurableProductById($id_product);
        if($getStockProduct){
            while($row = $getStockProduct->fetch_assoc()){
                $stock = $row['stock'];
                var_dump($stock);
            }
        }
        
        if(isset($_SESSION['cart'][$id_product])){
            if($stock > $_SESSION['cart'][$id_product]['quantity']){
                $_SESSION['cart'][$id_product]['quantity'] += 1;
            }
            else {
                echo '<script>alert("Stock is not enough!");</script>';
            }
        }
        else{
            if($stock > 0){
                $items = [
                    'id_product' => $id_product,
                    'quantity' => 1,
                    'price' => $product['price'],
                    'name' => $product['name'],
                    'images' => $product['image'],
                    'stock' => $stock
                ];
                $_SESSION['cart'][$id_product] = $items;
            }
            else {
                echo '<script>alert("Stock is not enough!");</script>';
            }
        }

    }

    var_dump( $_SESSION['cart']);
?>