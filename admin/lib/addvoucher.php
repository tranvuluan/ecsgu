<?php
    $path = dirname(__FILE__);
    require_once $path . '/../../class/voucher.php';

    $voucherModel = new Voucher();

    $voucherId = $_POST['voucherId'];
    $code = $_POST['code'];
    $discountPercent = $_POST['discountPercent'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    echo $startDate;

    // $addvoucher = $voucherModel -> insert($voucherId, $code, $discountPercent, $startDate, $endDate);
    // if ($addvoucher) {
    //     echo '<script>alert("Add voucher success!");</script>';
    //     // echo '<script>window.location.href = "../../admin/voucher.php";</script>';
    // } else {
    //     echo '<script>alert("Add voucher failed!");</script>';
    //     // echo '<script>window.location.href = "../../admin/voucher.php";</script>';
    // }
    
?>