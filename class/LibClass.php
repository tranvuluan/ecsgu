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

    public function filterProductByIndexFilter($option) {
        $option = $this->conn->real_escape_string($option);
        if ($option == 'all') {
            $sql = "SELECT * FROM `tbl_product`";
        }
        elseif ($option == 'new') {
            $sql = "SELECT * FROM `tbl_product` ORDER BY `date` DESC";
        } elseif ($option == 'sale') {
            $sql  = "SELECT * FROM tbl_product, tbl_product_sale WHERE tbl_product.id_product = tbl_product_sale.id_product";

        } elseif ($option == 'bestseller') {
            $sql = "SELECT * FROM tbl_product, tbl_configurable_products WHERE tbl_product.id_product = tbl_configurable_products.id_product ORDER BY tbl_configurable_products.quantity_sold DESC";
        } else {
            $sql = "SELECT * FROM `tbl_product`";
        }

        $result = $this->conn->query($sql) or die($this->conn->error);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


    public function filterProductByCategoryFilter($category, $size) {
        if ($category && !$size) {
            $sql = "SELECT * FROM `tbl_product`, (SELECT `id_categorychild` FROM `tbl_categorychild` WHERE `id_category` = '$category') temp WHERE tbl_product.id_categorychild = temp.id_categorychild";
        } elseif ($size && !$category) {
            $sql = "SELECT * FROM `tbl_product`, (SELECT `id_product` FROM `tbl_configurable_products` WHERE `option` = '$size') temp WHERE tbl_product.id_product = temp.id_product ";
        } else {
            $sql = "SELECT * FROM `tbl_product` ,(SELECT `id_product` FROM `tbl_configurable_products` WHERE `option` = '$size') tbl_size, (SELECT `id_categorychild` FROM `tbl_categorychild` WHERE `id_category` = '$category') tbl_filcate WHERE tbl_product.id_product = tbl_size.id_product AND tbl_product.id_categorychild = tbl_filcate.id_categorychild";
        }
        $result = $this->conn->query($sql) or die($this->conn->error);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }

    }

    public function rateProduct($id_product, $rating) {
        $id_product = $this->conn->real_escape_string($id_product);
        // $sql1 = "SELECT SUM("
    }
}

?>