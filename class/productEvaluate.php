<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class ProductEvaluate{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getProductEvaluatesByProductId($id_product){
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "SELECT * FROM tbl_product_evaluate WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }
    }

    public function insertEvaluate($id_product, $id_customer, $rating, $evaluate){
        $id_product = $this->conn->real_escape_string($id_product);
        $id_customer = $this->conn->real_escape_string($id_customer);
        $rating = $this->conn->real_escape_string($rating);
        $evaluate = $this->conn->real_escape_string($evaluate);
        $sql = "INSERT INTO tbl_product_evaluate(`id_product`, `id_customer`, `rating`, `evaluate`) VALUES ('$id_product', '$id_customer', '$rating', '$evaluate')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function ratingProduct($id_product){
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "SELECT AVG(rating) AS 'avg' FROM tbl_product_evaluate WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            return $result;
        }
        else{
            return false;
        }
    }
}
?>