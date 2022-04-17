<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class ConfigurableProduct{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getConfigurableProducts() {
        $sql = "SELECT * FROM tbl_configurable_products";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getConfigurableProductById($id_product) {
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "SELECT * FROM tbl_configurable_products WHERE id_product = '$id_product'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    
    public function insert($configurable_product){
        $sku = $this->conn->real_escape_string($configurable_product['sku']);
        $id_product = $this->conn->real_escape_string($configurable_product['id_product']);
        $stock = $this->conn->real_escape_string($configurable_product['stock']);
        $quantity_sold = $this->conn->real_escape_string($configurable_product['quantity_sold']);
        $inventory_status = $this->conn->real_escape_string($configurable_product['inventory_status']);
        $option = $this->conn->real_escape_string($configurable_product['option']);
        $sql = "INSERT INTO tbl_configurable_products(`sku`, `id_product`, `stock`, `quantity_sold`, `inventory_status`, `option`) VALUES ('$sku', '$id_product', '$stock', '$quantity_sold', '$inventory_status', '$option')";
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function update($sku, $id_product, $stock, $quantity_sold, $inventory_status, $option){
        $sku = $this->conn->real_escape_string($sku);
        $id_product = $this->conn->real_escape_string($id_product);
        $stock = $this->conn->real_escape_string($stock);
        $images = $this->conn->real_escape_string($quantity_sold);
        $images = $this->conn->real_escape_string($images);
        $inventory_status = $this->conn->real_escape_string($inventory_status);
        $option = $this->conn->real_escape_string($option);
        $sql = "UPDATE tbl_configurable_products SET `sku` = '$sku', `stock` = '$stock', `quantity_sold` = '$quantity_sold', `images` = '$images', `inventory_status` = '$inventory_status', `option` = '$option' WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_product){
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "DELETE FROM tbl_configurable_products WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql);
        return $result;
    }

}
?>