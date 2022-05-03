<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class WarehouseReceipt{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getWarehouseReceipts() {
        $sql = "SELECT * FROM tbl_warehousereceipt";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getWarehouseReceiptById($id_warehousereceipt) {
        $id_warehousereceipt = $this->conn->real_escape_string($id_warehousereceipt);
        $sql = "SELECT * FROM tbl_warehousereceipt WHERE id_warehousereceipt = '$id_warehousereceipt'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }    
    
    public function insert($id_warehousereceipt, $id_supplier, $id_employee, $date, $totalprice){
        $id_warehousereceipt = $this->conn->real_escape_string($id_warehousereceipt);
        $id_supplier = $this->conn->real_escape_string($id_supplier);
        $id_employee = $this->conn->real_escape_string($id_employee);
        $date = $this->conn->real_escape_string($date);
        $totalprice = $this->conn->real_escape_string($totalprice);
        $sql = "INSERT INTO tbl_warehousereceipt(`id_warehousereceipt`, `id_supplier`, `id_employee`, `date`, `totalprice`) VALUES ('$id_warehousereceipt', '$id_supplier', '$id_employee', '$date', '$totalprice')";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

    public function update($id_warehousereceipt, $id_supplier, $id_employee, $date, $totalprice){
        $id_warehousereceipt = $this->conn->real_escape_string($id_warehousereceipt);
        $id_supplier = $this->conn->real_escape_string($id_supplier);
        $id_employee = $this->conn->real_escape_string($id_employee);
        $date = $this->conn->real_escape_string($date);
        $totalprice = $this->conn->real_escape_string($totalprice);
        $sql = "UPDATE tbl_warehousereceipt SET `id_supplier` = '$id_supplier', `id_employee` = '$id_employee', `date` = '$date', `totalprice` = '$totalprice' WHERE `id_warehousereceipt` = '$id_warehousereceipt'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_warehousereceipt){
        $id_warehousereceipt = $this->conn->real_escape_string($id_warehousereceipt);
        $sql = "DELETE FROM tbl_warehousereceipt WHERE `id_warehousereceipt` = '$id_warehousereceipt'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>