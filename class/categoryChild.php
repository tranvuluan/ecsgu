<?php 
$path = realpath(dirname(__FILE__));

require_once($path.'/../config/connection.php');

class CategoryChild{
    public $conn;
    public function __construct(){
        $this->conn = getConnection();
    }

    public function getCategoryChilds() {
        $sql = "SELECT * FROM tbl_categorychild";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getCategoryChildByIds($id_categorychild) {
        $id_categorychild = $this->conn->real_escape_string($id_categorychild);
        $sql = "SELECT * FROM tbl_categorychild WHERE `id_categorychild` = '$id_categorychild'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function getCategoryChildsByCategoryId($id_category) {
        $id_category = $this->conn->real_escape_string($id_category);
        $sql = "SELECT * FROM tbl_categorychild WHERE `id_category` = '$id_category'";
        $result = $this->conn->query($sql);
        if($result -> num_rows > 0){
            return $result;
        }
        else {
            return false;
        }
    }

    public function insert($id_categorychild, $id_category, $name){
        $id_categorychild = $this->conn->real_escape_string($id_categorychild);
        $id_category = $this->conn->real_escape_string($id_category);
        $name = $this->conn->real_escape_string($name);
        $sql = "INSERT INTO tbl_categorychild(`id_categorychild`, `id_category`, `name`) VALUES ('$id_categorychild', '$id_category', '$name')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function update($id_categorychild, $name){
        $id_categorychild = $this->conn->real_escape_string($id_categorychild);
        $name = $this->conn->real_escape_string($name);
        $sql = "UPDATE tbl_categorychild SET `name` = '$name' WHERE `id_categorychild` = '$id_categorychild'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function delete($id_categorychild){
        $id_categorychild = $this->conn->real_escape_string($id_categorychild);
        $sql = "DELETE FROM tbl_categorychild WHERE `id_categorychild` = '$id_categorychild'";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>