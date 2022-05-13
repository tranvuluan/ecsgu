<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');


class Employee{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }

    public function getEmployees() {
        $sql = "SELECT * FROM tbl_employee";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getEmployeeById($id_employee) {
        $id_employee = $this->conn->real_escape_string($id_employee);
        $sql = "SELECT * FROM tbl_employee WHERE id_employee = '$id_employee'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getEmployeeByIdPosition($id_position) {
        $id_position = $this->conn->real_escape_string($id_position);
        $sql = "SELECT * FROM tbl_employee WHERE id_position = '$id_position'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_employee, $id_position, $fullname, $gender, $birthday, $address, $phone, $email, $image, $cmnd){
        $id_employee = $this->conn->real_escape_string($id_employee);
        $id_position = $this->conn->real_escape_string($id_position);
        $fullname = $this->conn->real_escape_string($fullname);
        $gender = $this->conn->real_escape_string($gender);
        $birthday = $this->conn->real_escape_string($birthday);
        $address = $this->conn->real_escape_string($address);
        $phone = $this->conn->real_escape_string($phone);
        $email = $this->conn->real_escape_string($email);
        $image = $this->conn->real_escape_string($image);
        $cmnd = $this->conn->real_escape_string($cmnd);
        $sql = "INSERT INTO tbl_employee(`id_employee`, `id_position`, `fullname`, `gender`,`birthday`,`address`,`phone`,`email`,`image`,`cmnd`) VALUES('$id_employee','$id_position','$fullname','$gender','$birthday','$address','$phone','$email','$image','$cmnd')";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }

    public function update($id_employee, $id_position, $fullname, $gender, $birthday, $address, $phone, $email, $image, $cmnd){
        $id_employee = $this->conn->real_escape_string($id_employee);
        $id_position = $this->conn->real_escape_string($id_position);
        $fullname = $this->conn->real_escape_string($fullname);
        $gender = $this->conn->real_escape_string($gender);
        $birthday = $this->conn->real_escape_string($birthday);
        $address = $this->conn->real_escape_string($address);
        $phone = $this->conn->real_escape_string($phone);
        $email = $this->conn->real_escape_string($email);
        $image = $this->conn->real_escape_string($image);
        $cmnd = $this->conn->real_escape_string($cmnd);
        $sql = "UPDATE tbl_employee SET `id_position` = '$id_position', `fullname` = '$fullname', `gender` = '$gender', `birthday` = '$birthday', address = '$address', `phone` = '$phone', `email` = '$email', `image` = '$image', `cmnd` = '$cmnd' WHERE `id_employee` = '$id_employee'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_employee){
        $id_employee = $this->conn->real_escape_string($id_employee);
        $sql = "DELETE FROM tbl_employee WHERE id_employee = '$id_employee'";
        $result = $this->conn->query($sql);
        return $result;
    }

}
