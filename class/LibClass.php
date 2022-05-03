<?php
$path = realpath(dirname(__FILE__));

require_once($path . '/../config/connection.php');

class LibClass
{
    public $conn;
    public function __construct()
    {
        $this->conn = getConnection();
    }

    public function getFullInfoOrder($id_order) {
        $id_order = $this->conn->real_escape_string($id_order);
        $sql = "SELECT * FROM `tbl_order`, `tbl_order_item`, `tbl_configurable_products`, `tbl_product` WHERE   tbl_order.id_order = tbl_order_item.id_order AND tbl_order_item.sku = tbl_configurable_products.sku AND tbl_configurable_products.id_product = tbl_product.id_product AND tbl_order.id_order = '$id_order'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}

?>