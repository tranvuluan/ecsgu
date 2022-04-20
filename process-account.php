<?php
    $path = dirname(__FILE__);
    require_once $path . '/class/order.php';;
?>

<?php 
if (isset($_POST['viewOrder'])){
?>
<?php
    
}
?>
<?php
if (isset($_POST['btn-submit'])) {
    $id_order = $_POST['id_order'];
    $id_customer = $_POST['id_customer'];
    $id_product = $_POST['id_product'];
    $totalprice = $_POST['totalprice'];
    $id_voucher = $_POST['id_voucher'];
    $id_emloyee = $_POST['id_emloyee'];
    $date = $_POST['date'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $note = $_POST['note'];
    $status = $_POST['status'];
    $order = new Order();
    $result = $order->insert($id_order, $id_customer, $id_product, $totalprice, $id_voucher, $id_emloyee, $date, $fullname, $phone, $address, $email, $note, $status);
    if ($result) {
        echo '<script>alert("Thêm thành công")</script>';
        echo '<script>window.location.href = "index.php?page=order"</script>';
    } else {
        echo '<script>alert("Thêm thất bại")</script>';
        echo '<script>window.location.href = "index.php?page=order"</script>';
    }
}
?>