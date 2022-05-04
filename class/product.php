<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class Product{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getProducts() {
        $sql = "SELECT * FROM tbl_product";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getProductById($id_product) {
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "SELECT * FROM tbl_product WHERE id_product = '$id_product'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getProductsByOrderItem($id_product){
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "SELECT tbl_order_item.id_product FROM tbl_order_item, tbl_product WHERE tbl_order_item.id_product = tbl_product.id_product AND tbl_order_item.id_product = '$id_product'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getProductByStatus($status){
        $status = $this->conn->real_escape_string($status);
        $sql = "SELECT * FROM tbl_product WHERE status = '$status'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_product, $id_brand, $id_categorychild, $name, $image, $status, $description){
        $id_product = $this->conn->real_escape_string($id_product);
        $description = $this->conn->real_escape_string($description);
        $id_brand = $this->conn->real_escape_string($id_brand);
        $id_categorychild = $this->conn->real_escape_string($id_categorychild);
        $name = $this->conn->real_escape_string($name);
        $image = $this->conn->real_escape_string($image);
        $status = $this->conn->real_escape_string($status);
        $sql = "INSERT INTO tbl_product(`id_product`, `id_brand`, `id_categorychild`, `name`, `image`, `status`, `description`) VALUES ('$id_product', '$id_brand', '$id_categorychild', '$name', '$image', '$status', '$description')";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }
    
    public function update($id_product, $id_brand, $id_categorychild, $name, $price, $image, $status, $description){
        $id_product = $this->conn->real_escape_string($id_product);
        $id_brand = $this->conn->real_escape_string($id_brand);
        $id_categorychild = $this->conn->real_escape_string($id_categorychild);
        $description = $this->conn->real_escape_string($description);
        $name = $this->conn->real_escape_string($name);
        $price = $this->conn->real_escape_string($price);
        $image = $this->conn->real_escape_string($image);
        $status = $this->conn->real_escape_string($status);
        $sql = "UPDATE tbl_product SET `id_brand` = '$id_brand', `id_categorychild` = '$id_categorychild', `description` = '$description',`name` = '$name', `price` = '$price', `image` = '$image', `status` = '$status' WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

    public function delete($id_product){
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "DELETE FROM tbl_product WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function activeSellProduct($id_product, $price, $id_categorychild, $id_brand) {
        $id_product = $this->conn->real_escape_string($id_product);
        $price = $this->conn->real_escape_string($price);
        $id_categorychild = $this->conn->real_escape_string($id_categorychild);
        $id_brand = $this->conn->real_escape_string($id_brand);
        $sql = "UPDATE tbl_product SET status = 1, `price` = $price, `id_categorychild` = '$id_categorychild', `id_brand` = '$id_brand' WHERE `id_product` = '$id_product'";
        $result = $this->conn->query($sql);
        return $result;
    }

}
?>