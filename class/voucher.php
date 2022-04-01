<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class Voucher{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getVouchers() {
        $sql = "SELECT * FROM tbl_voucher";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getVoucherById($id_voucher) {
        $id_voucher = $this->conn->real_escape_string($id_voucher);
        $sql = "SELECT * FROM tbl_voucher WHERE id_voucher = '$id_voucher'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }    
    
    public function insert($id_voucher, $code, $discountpercent, $startdate, $enddate){
        $id_voucher = $this->conn->real_escape_string($id_voucher);
        $code = $this->conn->real_escape_string($code);
        $discountpercent = $this->conn->real_escape_string($discountpercent);
        $startdate = $this->conn->real_escape_string($startdate);
        $enddate = $this->conn->real_escape_string($enddate);
        $sql = "INSERT INTO tbl_voucher(`id_voucher`, `code`, `discountpercent`, `startdate`, `enddate`) VALUES ('$id_voucher', '$code', '$discountpercent', '$startdate', '$enddate')";
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function update($id_voucher, $code, $discountpercent, $startdate, $enddate){
        $id_voucher = $this->conn->real_escape_string($id_voucher);
        $code = $this->conn->real_escape_string($code);
        $discountpercent = $this->conn->real_escape_string($discountpercent);
        $startdate = $this->conn->real_escape_string($startdate);
        $enddate = $this->conn->real_escape_string($enddate);
        $sql = "UPDATE tbl_voucher SET `code` = '$code', `discountpercent` = '$discountpercent', `startdate` = '$startdate', `enddate` = '$enddate' WHERE `id_voucher` = '$id_voucher'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_voucher){
        $id_voucher = $this->conn->real_escape_string($id_voucher);
        $sql = "DELETE * FROM tbl_voucher WHERE `id_voucher` = '$id_voucher'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>