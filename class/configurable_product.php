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

    public function getConfigurableProductBySKU($SKU) {
        $SKU = $this->conn->real_escape_string($SKU);
        $sql = "SELECT * FROM tbl_configurable_products WHERE `sku` = '$SKU'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function checkStock($sku, $quantity) {
        $sku = $this->conn->real_escape_string($sku);
        $quantity = $this->conn->real_escape_string($quantity);
        $sql = "SELECT * FROM tbl_configurable_products WHERE `sku` = '$sku'";
        $result = $this->conn->query($sql) or die($this->conn->error);
        if($result -> num_rows > 0){
            $row = $result->fetch_assoc();
            if ($row['stock'] >= $quantity) {
                return true;
            } else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function decStock($sku, $quantity) {
        $sku = $this->conn->real_escape_string($sku);
        $quantity = $this->conn->real_escape_string($quantity);
        $sql = "UPDATE tbl_configurable_products SET `stock` = `stock` - '$quantity' WHERE `sku` = '$sku'";
        $result = $this->conn->query($sql);
        return $result;
    }

    
    public function insert($sku,  $id_product, $stock, $inventory_status, $option){
        $sku = $this->conn->real_escape_string($sku);
        $id_product = $this->conn->real_escape_string($id_product);
        $stock = $this->conn->real_escape_string($stock);
        $inventory_status = $this->conn->real_escape_string($inventory_status);
        $option = $this->conn->real_escape_string($option);
        $sql = "INSERT INTO tbl_configurable_products(`sku`, `id_product`, `stock`, `quantity_sold`, `inventory_status`, `option`) VALUES ('$sku', '$id_product', '$stock', '0', '$inventory_status', '$option')";
        $result = $this->conn->query($sql)or die($this->conn->error);
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
        $sql = "UPDATE tbl_configurable_products SET `sku` = '$sku', `stock` = '$stock', `quantity_sold` = '$quantity_sold', `inventory_status` = '$inventory_status', `option` = '$option' WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

    public function delete($id_product){
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "DELETE FROM tbl_configurable_products WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function updateStock($stock, $sku){
        $stock = $this->conn->real_escape_string($stock);
        $sku = $this->conn->real_escape_string($sku);
        $sql= "UPDATE tbl_configurable_products SET `stock` = '$stock' WHERE `sku` = '$sku'";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

    public function incQuantitySold($sku, $quantity) {
        $sku = $this->conn->real_escape_string($sku);
        $quantity = $this->conn->real_escape_string($quantity);
        $sql= "UPDATE tbl_configurable_products SET `quantity_sold` = '$quantity' WHERE `sku` = '$sku'";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

}
?>