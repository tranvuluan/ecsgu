<?php
$path = dirname(__FILE__);
require_once $path . '/class/customer.php';;
?>

<?php
if (isset($_POST['viewAccountToUpdate']) ) {
    $rs = 
    $id_cus = $_POST['id_cus'];
    $customer = new Customer();
    $showCustomer = $customer->getCustomerById($id_cus)->fetch_assoc();
?>
    <div class="tab-pane fade" id="account-details">
        <div class="card">
            <div class="card-body">
                <h3>Account details </h3>
                <div class="p-4 border rounded">
                    <form class="row g-3" action="#" method="POST" onsubmit="update()">
                        <div class="col-md-3 default-form-box mb-20">
                            <label class="form-label ">ID Customer</label>
                            <input class="form-control" type="text" name="id_cus" value="<?php echo $order['id_customer'] ?>" readonly>
                        </div>
                        <div class="col-md-3 default-form-box mb-20">
                            <label class="form-label ">ID Account</label>
                            <input class="form-control" type="text" name="id_acc" value="<?php echo $order['id_account'] ?>" readonly>
                        </div>
                        <div class="col-md-3 default-form-box mb-20">
                            <label class="form-label ">Created date</label>
                            <input class="form-control" type="text" name="create-date" value="<?php echo $order['createdate'] ?>" readonly>
                        </div>
                        <div class="col-md-3 default-form-box mb-20">
                            <label class="form-label ">Point</label>
                            <input class="form-control" type="text" name="point" value="<?php echo $order['point'] ?>" readonly>
                        </div>
                        <div class="col-md-6 default-form-box mb-20">
                            <label class="form-label ">Full Name</label>
                            <input class="form-control" type="text" name="full-name" value="<?php echo $order['fullname'] ?>" require>
                        </div>
                        <div class="col-md-6 default-form-box mb-20">
                            <label class="form-label ">Address</label>
                            <input class="form-control" type="text" name="address" value="<?php echo $order['address'] ?>" require>
                        </div>
                        <div class="col-md-6 default-form-box mb-20">
                            <label class="form-label ">Email</label>
                            <input class="form-control" type="text" name="email" value="<?php echo $order['email'] ?>" require>
                        </div>
                        <div class="col-md-6 default-form-box mb-20">
                            <label class="form-label ">Phone</label>
                            <input class="form-control" type="text" name="phone" value="<?php echo $order['phone'] ?>" require>
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
if (isset($_POST['update'])) {
    $id_cus = $_POST['id_cus'];
    $id_acc = $_POST['id_acc'];
    $createDate = $_POST['createDate'];
    $point = $_POST['point'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $customer = new Customer();
    $result = $customer->update($id_cus, $id_acc, $name, $email, $address, $phone, $createDate, $point);
    if($result){
        echo 1;
    }
    else
        echo 0;
}
?>