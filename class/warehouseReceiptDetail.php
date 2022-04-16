<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class WarehouseReceiptDetail{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getWarehouseReceiptDetails() {
        $sql = "SELECT * FROM tbl_warehousereceipt_detail";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getWarehouseReceiptDetailById($id_warehousereceipt) {
        $id_warehousereceipt = $this->conn->real_escape_string($id_warehousereceipt);
        $sql = "SELECT * FROM tbl_warehousereceipt_detail WHERE id_warehousereceipt = '$id_warehousereceipt'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getWarehouseReceiptDetailsByProductId($id_product){
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "SELECT * FROM tbl_warehousereceipt_detail WHERE id_product = '$id_product'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getWarehouseReceiptDetailsByWarehouseReceiptId($id_warehousereceipt){
        $id_warehousereceipt = $this->conn->real_escape_string($id_warehousereceipt);
        $sql = "SELECT * FROM tbl_warehousereceipt_detail WHERE id_warehousereceipt = '$id_warehousereceipt'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_warehousereceipt, $idproduct, $amount, $price){
        $id_warehousereceipt = $this->conn->real_escape_string($id_warehousereceipt);
        $idproduct = $this->conn->real_escape_string($idproduct);
        $amount = $this->conn->real_escape_string($amount);
        $price = $this->conn->real_escape_string($price);
        $sql = "INSERT INTO tbl_warehousereceipt_detail(`id_warehousereceipt`, `id_product`, `amount`, `price`) VALUES ('$id_warehousereceipt', '$idproduct', '$amount', '$price')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function update($id_warehousereceipt, $idproduct, $amount, $price){
        $id_warehousereceipt = $this->conn->real_escape_string($id_warehousereceipt);
        $idproduct = $this->conn->real_escape_string($idproduct);
        $amount = $this->conn->real_escape_string($amount);
        $price = $this->conn->real_escape_string($price);
        $sql = "UPDATE tbl_warehousereceipt_detail SET `id_product` = '$idproduct', `amount` = '$amount', `price` = '$price' WHERE `id_warehousereceipt` = '$id_warehousereceipt'";
        $result = $this->conn->query($sql);
        return $result;
    }

}
?>