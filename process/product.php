<?php 
$path = dirname(__FILE__);
require_once $path . '/../class/configurable_product.php';


if (isset($_GET['checkStock']) && isset($_GET['quantity'])) {
    $ConfigurableProductModel = new ConfigurableProduct();
    $id_product = $_GET['id_product'];
    $getSKU = $ConfigurableProductModel->getConfigurableProductById($id_product);
    if ($getSKU) {
        $sku = $getSKU->fetch_assoc();
        $stock = $sku['stock'];
        if ($_GET['quantity'] > $stock) {
            echo 0;
        } else {
            echo 1;
        }
    } else {
        echo 0;
    }
}

?>