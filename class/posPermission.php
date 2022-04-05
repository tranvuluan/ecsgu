<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/config/connection.php');

class PosPermission{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getPosPermissions() {
        $sql = "SELECT * FROM tbl_pos_permission ORDER BY id_permission  ASC";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getPermissionByPosId($id_position) {
        $id_position = $this->conn->real_escape_string($id_position);
        $sql = "SELECT * FROM tbl_pos_permission WHERE id_position = '$id_position' ";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function insert($id_permission, $id_position){
        $id_permission = $this->conn->real_escape_string($id_permission);
        $id_position = $this->conn->real_escape_string($id_position);
        $sql = "INSERT INTO tbl_pos_permission(`id_permission`, `id_position`) VALUES ('$id_permission', '$id_position')";
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function update($id_permission, $id_position){
        $id_permission = $this->conn->real_escape_string($id_permission);
        $id_position = $this->conn->real_escape_string($id_position);
        $sql = "UPDATE tbl_pos_permission SET id_permission = '$id_permission' WHERE id_position = '$id_position'";
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function delete($id_permission, $id_position){
        $id_permission = $this->conn->real_escape_string($id_permission);
        $id_position = $this->conn->real_escape_string($id_position);
        $sql = "DELETE FROM tbl_pos_permission WHERE `id_permission` = '$id_permission' AND `id_position` = '$id_position'";
        $result = $this->conn->query($sql);
        return $result;
    }

}
?>