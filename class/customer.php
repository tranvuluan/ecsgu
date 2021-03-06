<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class Customer{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }

    public function getCustomers() {
        $sql = "SELECT * FROM tbl_customer";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getCustomerByIdAccount($id_account) {
        $id_account = $this->conn->real_escape_string($id_account);
        $sql = "SELECT * FROM tbl_customer WHERE id_account = '$id_account'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    public function getCustomerByIdCustomer($id_customer) {
        $id_customer = $this->conn->real_escape_string($id_customer);
        $sql = "SELECT * FROM tbl_customer WHERE id_customer = '$id_customer'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_customer, $id_account,$fullname, $email, $address, $phone, $createdate, $point){
        $id_customer = $this->conn->real_escape_string($id_customer);
        $id_account = $this->conn->real_escape_string($id_account);
        $fullname = $this->conn->real_escape_string($fullname);
        $email = $this->conn->real_escape_string($email);
        $address = $this->conn->real_escape_string($address);
        $phone = $this->conn->real_escape_string($phone);
        $createdate = $this->conn->real_escape_string($createdate);
        $point = $this->conn->real_escape_string($point);
        $sql = "INSERT INTO tbl_customer(`id_customer`,`id_account`, `fullname`, `email`, `address`, `phone`, `createdate`,`point`) VALUES ('$id_customer','$id_account', '$fullname', '$email', '$address', '$phone', '$createdate', '$point')";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

    public function update($id_customer, $id_account, $fullname, $email, $address, $phone, $createdate, $point){
        $id_customer = $this->conn->real_escape_string($id_customer);
        $id_account = $this->conn->real_escape_string($id_account);
        $fullname = $this->conn->real_escape_string($fullname);
        $email = $this->conn->real_escape_string($email);
        $address = $this->conn->real_escape_string($address);
        $phone = $this->conn->real_escape_string($phone);
        $createdate = $this->conn->real_escape_string($createdate);
        $point = $this->conn->real_escape_string($point);
        $sql = "UPDATE tbl_customer SET `id_account` = '$id_account', `fullname` = '$fullname', `email` = '$email', `address` = '$address', `phone` = '$phone', `createdate` = '$createdate', `point` = '$point' WHERE `id_customer` = '$id_customer'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_customer){
        $id_customer = $this->conn->real_escape_string($id_customer);
        $sql = "DELETE FROM tbl_customer WHERE `id_customer` = '$id_customer'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function plusPoint($id_customer, $point) {
        $id_customer = $this->conn->real_escape_string($id_customer);
        $point = $this->conn->real_escape_string($point);
        $sql = "UPDATE tbl_customer SET `point` = '$point' WHERE `id_customer` = '$id_customer'";
        $result = $this->conn->query($sql);
        return $result;
    }

}
?>