<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class Supplier{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getSuppliers() {
        $sql = "SELECT * FROM tbl_supplier";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getSupplierById($id_supplier) {
        $id_supplier = $this->conn->real_escape_string($id_supplier);
        $sql = "SELECT * FROM tbl_supplier WHERE id_supplier = '$id_supplier'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }    

    public function insert($id_supplier, $name, $address){
        $id_supplier = $this->conn->real_escape_string($id_supplier);
        $name = $this->conn->real_escape_string($name);
        $address = $this->conn->real_escape_string($address);
        $sql = "INSERT INTO tbl_supplier(`id_supplier`, `name`, `address`) VALUES ('$id_supplier', '$name', '$address')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function update($id_supplier, $name, $address){
        $id_supplier = $this->conn->real_escape_string($id_supplier);
        $name = $this->conn->real_escape_string($name);
        $address = $this->conn->real_escape_string($address);
        $sql = "UPDATE tbl_supplier SET `name` = '$name', `address` = '$address' WHERE `id_supplier` = '$id_supplier'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_supplier){
        $id_supplier = $this->conn->real_escape_string($id_supplier);
        $sql = "DELETE FROM tbl_supplier WHERE `id_supplier` = '$id_supplier'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>