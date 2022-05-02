<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class ProductSale{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getProductSales() {
        $sql = "SELECT * FROM tbl_product_sale";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getProductSaleByProductId($id_product) {
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "SELECT * FROM tbl_product_sale WHERE id_product = '$id_product'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function checkSale($id_product){
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "SELECT * FROM tbl_product_sale WHERE id_product = '$id_product' AND CURRENTTIMESTAMP BETWEEN `start_date` AND `end_date`";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_product, $sale_percent, $start_date, $end_date){
        $id_product = $this->conn->real_escape_string($id_product);
        $sale_percent = $this->conn->real_escape_string($sale_percent);
        $start_date = $this->conn->real_escape_string($start_date);
        $end_date = $this->conn->real_escape_string($end_date);
        $sql = "INSERT INTO tbl_product_sale(`id_product`, `salepercent`, `startdate`, `enddate`) VALUES ('$id_product', '$sale_percent', '$start_date', '$end_date')";
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function update($id_product, $sale_percent, $start_date, $end_date){
        $id_product = $this->conn->real_escape_string($id_product);
        $sale_percent = $this->conn->real_escape_string($sale_percent);
        $start_date = $this->conn->real_escape_string($start_date);
        $end_date = $this->conn->real_escape_string($end_date);
        $sql = "UPDATE tbl_product_sale SET `salepercent` = '$sale_percent', `startdate` = '$start_date', `enddate` = '$end_date' WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_product){
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "DELETE FROM tbl_product_sale WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
