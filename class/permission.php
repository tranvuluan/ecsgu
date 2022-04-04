<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class Permission{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getPermissions() {
        $sql = "SELECT * FROM tbl_permission";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getPermissionById($id_permission) {
        $id_permission = $this->conn->real_escape_string($id_permission);
        $sql = "SELECT * FROM tbl_permission WHERE id_permission = '$id_permission'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function insert($id_permission, $name){
        $id_permission = $this->conn->real_escape_string($id_permission);
        $name = $this->conn->real_escape_string($name);
        $sql = "INSERT INTO tbl_permission(`id_permission`, `name`) VALUES ('$id_permission', '$name')";
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function update($id_permission, $name){
        $id_permission = $this->conn->real_escape_string($id_permission);
        $name = $this->conn->real_escape_string($name);
        $sql = "UPDATE tbl_permission SET `name` = '$name' WHERE `id_permission` = '$id_permission'";
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function delete($id_permission){
        $id_permission = $this->conn->real_escape_string($id_permission);
        $sql = "DELETE FROM tbl_permission WHERE `id_permission` = '$id_permission'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>