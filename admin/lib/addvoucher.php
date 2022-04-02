<?php
    $path = dirname(__FILE__);
    require_once $path . '/../../class/voucher.php';

    $voucherModel = new Voucher();

    $voucherId = $_POST['voucherId'];
    $code = $_POST['code'];
    $discountPercent = $_POST['discountPercent'];
    $startDate = date('Y-m-d',strtotime($_POST['startDate']));
    $endDate = date('Y-m-d',strtotime($_POST['endDate']));

     


    $addvoucher = $voucherModel -> insert($voucherId, $code, $discountPercent, $startDate, $endDate);
    if ($addvoucher) {
        echo '<script>alert("Add voucher success!");</script>';
        echo '<script>window.location.href = "../../admin/khuyenmai.php";</script>';
    } else {
        echo '<script>alert("Add voucher failed!");</script>';
        echo '<script>window.location.href = "../../admin/khuyenmai.php";</script>';
    }
    
?>