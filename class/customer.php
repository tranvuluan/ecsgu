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

    public function getCustomerById($id_customer) {
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
        $id_customer = $this->conn->real_escape_string($id_account);
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

    public function update($id_customer, $fullname, $email, $address, $phone, $createdate, $points){
        $id_customer = $this->conn->real_escape_string($id_customer);
        $fullname = $this->conn->real_escape_string($fullname);
        $email = $this->conn->real_escape_string($email);
        $address = $this->conn->real_escape_string($address);
        $phone = $this->conn->real_escape_string($phone);
        $createdate = $this->conn->real_escape_string($createdate);
        $points = $this->conn->real_escape_string($points);
        $sql = "UPDATE tbl_customer SET `fullname` = '$fullname', `email` = '$email', `address` = '$address', `phone` = '$phone', `createdate` = '$createdate', `points` = '$points' WHERE `id_customer` = '$id_customer'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_customer){
        $id_customer = $this->conn->real_escape_string($id_customer);
        $sql = "DELETE FROM tbl_customer WHERE `id_customer` = '$id_customer'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function checkLogin($username, $password) {
        $sql = "SELECT * FROM tbl_customer, tbl_account WHERE tbl_customer.id_account = tbl_account.id_account AND `username` = '$username' AND `password` = '$password'";
        $result = $this->conn->query($sql);
        if ($result->num_rows >0) {
            return $result;
        }else return false;
    }
}
?>