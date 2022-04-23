<?php
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class Position{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }
    
    public function getPositions() {
        $sql = "SELECT * FROM tbl_position";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getPositionFromTbl_Employee($id_position){
        $id_position = $this->conn->real_escape_string($id_position);
        $sql = "SELECT tbl_position.name FROM tbl_employee,tbl_position WHERE  tbl_employee.id_position = tbl_position.id_position AND tbl_position.id_position = '$id_position'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function getPositionById($id_position) {
        $id_position = $this->conn->real_escape_string($id_position);
        $sql = "SELECT * FROM tbl_position WHERE id_position = '$id_position'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }
    
    public function insert($id_position, $name){
        $id_position = $this->conn->real_escape_string($id_position);
        $name = $this->conn->real_escape_string($name);
        $sql = "INSERT INTO tbl_position(`id_position`, `name`) VALUES('$id_position','$name')";
        $result = $this->conn->query($sql);
        return $result;
    }
    
    public function update($id_position, $name){
        $id_position = $this->conn->real_escape_string($id_position);
        $name = $this->conn->real_escape_string($name);
        $sql = "UPDATE tbl_position SET `name` = '$name' WHERE id_position = '$id_position'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_position){
        $id_position = $this->conn->real_escape_string($id_position);
        $sql = "DELETE FROM tbl_position WHERE `id_position` = '$id_position'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>