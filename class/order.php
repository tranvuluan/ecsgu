<?php
$path = realpath(dirname(__FILE__));

require_once($path. '/../config/connection.php');

class Order{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }

    public function getOrders() {
        $sql = "SELECT * FROM tbl_order";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getOrderById($id_order) {
        $id_order = $this->conn->real_escape_string($id_order);
        $sql = "SELECT * FROM tbl_order WHERE id_order = '$id_order'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    public function getOrderByIdCus($id_customer) {
        $id_customer = $this->conn->real_escape_string($id_customer);
        $sql = "SELECT * FROM tbl_order WHERE id_customer = '$id_customer'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }


    public function insert($id_order, $id_customer, $id_product, $totalprice, $id_voucher, $id_emloyee, $date, $fullname, $phone, $address, $email, $note, $status){
        $id_order = $this->conn->real_escape_string($id_order);
        $id_customer = $this->conn->real_escape_string($id_customer);
        $id_product = $this->conn->real_escape_string($id_product);
        $totalprice = $this->conn->real_escape_string($totalprice);
        $id_voucher = $this->conn->real_escape_string($id_voucher);
        $id_emloyee = $this->conn->real_escape_string($id_emloyee);
        $date = $this->conn->real_escape_string($date);
        $fullname = $this->conn->real_escape_string($fullname);
        $phone = $this->conn->real_escape_string($phone);
        $address = $this->conn->real_escape_string($address);
        $email = $this->conn->real_escape_string($email);
        $note = $this->conn->real_escape_string($note);
        $status = $this->conn->real_escape_string($status);
        $sql = "INSERT INTO tbl_order(`id_order`, `id_customer`, `id_product`, `totalprice`, `id_voucher`, `id_emloyee`, `date`, `fullname`, `phone`, `address`, `email`, `note`, `status`) VALUES ('$id_order', '$id_customer', '$id_product', '$totalprice', '$id_voucher', '$id_emloyee', '$date', '$fullname', '$phone', '$address', '$email', '$note', '$status')";
        $result = $this->conn->query($sql);
        return $result;
    }

}
?>