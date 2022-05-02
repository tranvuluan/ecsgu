<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class OrderItem{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }

    public function getOrderItems() {
        $sql = "SELECT * FROM tbl_order_item";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getOrderItemById($id_order) {
        $id_order = $this->conn->real_escape_string($id_order);
        $sql = "SELECT * FROM tbl_order_item WHERE id_order = '$id_order'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getOrderItemBySKU($sku){
        $sku = $this->conn->real_escape_string($sku);
        $sql = "SELECT * FROM tbl_order_item WHERE sku = '$sku'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_order, $sku, $quantity, $price){
        $id_order = $this->conn->real_escape_string($id_order);
        $sku = $this->conn->real_escape_string($sku);
        $quantity = $this->conn->real_escape_string($quantity);
        $price = $this->conn->real_escape_string($price);
        $sql = "INSERT INTO tbl_order_item(`id_order`, `sku`, `quantity`, `price`) VALUES ('$id_order', '$sku', '$quantity', '$price')";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

    public function delete($id_order){
        $id_order = $this->conn->real_escape_string($id_order);
        $sql = "DELETE FROM tbl_order_item WHERE `id_order` = '$id_order'";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }
}
?>