<?php 
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class Wishlist{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }

    public function getWishlists() {
        $sql = "SELECT * FROM tbl_wishlist";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getWishlistById($id_wishlist) {
        $id_wishlist = $this->conn->real_escape_string($id_wishlist);
        $sql = "SELECT * FROM tbl_wishlist WHERE id_wishlist = '$id_wishlist'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_wishlist, $id_customer, $id_product){
        $id_wishlist = $this->conn->real_escape_string($id_wishlist);
        $id_customer = $this->conn->real_escape_string($id_customer);
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "INSERT INTO tbl_wishlist(`id_wishlist`, `id_customer`, `id_product`) VALUES ('$id_wishlist', '$id_customer', '$id_product')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function update($id_wishlist, $id_customer, $id_product){
        $id_wishlist = $this->conn->real_escape_string($id_wishlist);
        $id_customer = $this->conn->real_escape_string($id_customer);
        $id_product = $this->conn->real_escape_string($id_product);
        $sql = "UPDATE tbl_wishlist SET id_customer = '$id_customer', id_product = '$id_product' WHERE `id_wishlist` = '$id_wishlist'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_wishlist){
        $id_wishlist = $this->conn->real_escape_string($id_wishlist);
        $sql = "DELETE FROM tbl_wishlist WHERE `id_wishlist` = '$id_wishlist'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>