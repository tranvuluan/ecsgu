<?php
$path = realpath(dirname(__FILE__));

require_once($path . '/../config/connection.php');

class Order
{
    public $conn;
    public function __construct()
    {
        $this->conn = getConnection();
    }

    public function getOrders()
    {
        $sql = "SELECT * FROM tbl_order";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function getOrderById($id_order)
    {
        $id_order = $this->conn->real_escape_string($id_order);
        $sql = "SELECT * FROM tbl_order WHERE id_order = '$id_order'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function getOrderByIdCus($id_customer)
    {
        $id_customer = $this->conn->real_escape_string($id_customer);
        $sql = "SELECT * FROM tbl_order WHERE id_customer = '$id_customer'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


    public function insert($id_order, $id_customer, $fullname, $phone, $email, $address, $country,$totalprice, $id_voucher, $date)
    {
        $fullname = $this->conn->real_escape_string($fullname);
        $id_order = $this->conn->real_escape_string($id_order);
        $id_customer = $this->conn->real_escape_string($id_customer);
        $phone = $this->conn->real_escape_string($phone);
        $address = $this->conn->real_escape_string($address);
        $email = $this->conn->real_escape_string($email);
        $totalprice = $this->conn->real_escape_string($totalprice);
        $id_voucher = $this->conn->real_escape_string($id_voucher);
        $country = $this->conn->real_escape_string($country);
        $date = $this->conn->real_escape_string($date);
        if ($id_voucher != null)
            $sql = "INSERT INTO tbl_order(`id_order`, `id_customer`, `fullname`, `phone`, `email`, `address`, `country`, `id_voucher`, `totalprice`, `date`) VALUES ('$id_order', '$id_customer', '$fullname','$phone', '$email', '$address', '$country', '$id_voucher', '$totalprice', '$date')";
        else
            $sql = "INSERT INTO tbl_order(`id_order`, `id_customer`, `fullname`,`phone`, `email`, `address`,`country`, `totalprice`, `date`) VALUES ('$id_order', '$id_customer', '$fullname','$phone', '$email', '$address', '$country', '$totalprice', '$date')";

        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

    public function changeStatus($id_order, $status)
    {
        $id_order = $this->conn->real_escape_string($id_order);
        $status = $this->conn->real_escape_string($status);
        $sql = "UPDATE tbl_order SET status = '$status' WHERE id_order = '$id_order'";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }
    public function delete($id_order)
    {
        $id_order = $this->conn->real_escape_string($id_order);
        $sql = "DELETE FROM tbl_order WHERE id_order = '$id_order'";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

}
?>
