<?php 
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class Account{
    private $conn;
    public function __construct()
    {
        $this->conn = getConnection();
    }

    public function getAccounts() {
        $sql = "SELECT * FROM tbl_account";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getAccountById($id_user) {
        $id_user = $this->conn->real_escape_string($id_user);
        $sql = "SELECT * FROM tbl_account WHERE id_user = '$id_user'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_user, $username, $password){
        $id_user = $this->conn->real_escape_string($id_user);
        $username = $this->conn->real_escape_string($username);
        $password = $this->conn->real_escape_string($password);
        $sql = "INSERT INTO tbl_account(`id_user`, `username`, `password`) VALUES ('$id_user', '$username', '$password')";
        $result = $this->conn->query($sql);
        if($result){
            return $result;
        }
        else {
            return false;
        }
    }

    public function active($id_user){
        $id_user = $this->conn->real_escape_string($id_user);
        $sql = "UPDATE tbl_account SET status = 1 WHERE id_user = '$id_user'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function suspend($id_user){
        $id_user = $this->conn->real_escape_string($id_user);
        $sql = "UPDATE tbl_account SET status = 0 WHERE id_user = '$id_user'";
        $result = $this->conn->query($sql);
        return $result;
    }
}

?>