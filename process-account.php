<?php
$path = dirname(__FILE__);
require_once $path . '/class/order.php';;
?>

<?php
if (isset($_POST['viewAccount']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $orderModel = new Order();
    $order = $orderModel->getOrderById($id)->fetch_assoc();
?>
    <div class="tab-pane fade" id="account-details">
        <div class="card">
            <div class="card-body">
                <h3>Account details </h3>
                <div class="p-4 border rounded">
                    <form action="#" method="POST" onsubmit="update()">
                        <!-- <p>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginActive">Log in instead!</a></p>
                        <div class="input-radio">
                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                            <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                        </div> <br> -->
                        <div class="col-md-4">
                            <label class="form-label">ID Customer</label>
                            <input type="text" name="id_cus" value="<?php echo $order['id_customer'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">ID Account</label>
                            <input type="text" name="id_acc" value="<?php echo $order['id_account'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="full-name" value="<?php echo $order['fullname'] ?>" require>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Created date</label>
                            <input type="text" name="create-date" value="<?php echo $order['createdate'] ?>" require>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="date" name="email" value="<?php echo $order['email'] ?>" require>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Point</label>
                            <input type="text" name="point" value="<?php echo $order['point'] ?>" require>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" value="<?php echo $order['address'] ?>" require>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" value="<?php echo $order['phone'] ?>" require>
                        </div>
                        
                        
                        <div class="save_button mt-3">
                            <button class="btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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