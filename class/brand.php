<?php 
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class Brand{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }

    public function getBrands() {
        $sql = "SELECT * FROM tbl_brand";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getBrandById($id_brand) {
        $id_brand = $this->conn->real_escape_string($id_brand);
        $sql = "SELECT * FROM tbl_brand WHERE id_brand = '$id_brand'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_brand, $name){
        $id_brand = $this->conn->real_escape_string($id_brand);
        $name = $this->conn->real_escape_string($name);
        $sql = "INSERT INTO tbl_brand(`id_brand`, `name`) VALUES ('$id_brand', '$name')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function update($id_brand, $name){
        $id_brand = $this->conn->real_escape_string($id_brand);
        $name = $this->conn->real_escape_string($name);
        $sql = "UPDATE tbl_brand SET name = '$name' WHERE `id_brand` = '$id_brand'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_brand){
        $id_brand = $this->conn->real_escape_string($id_brand);
        $sql = "DELETE FROM tbl_brand WHERE `id_brand` = '$id_brand'";
        $result = $this->conn->query($sql);
        return $result;
    }
    
}
?>