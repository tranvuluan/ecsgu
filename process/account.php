<?php
$path = dirname(__FILE__);
require_once $path . '/../class/customer.php';
require_once $path . '/../class/orderItem.php';
?>

<?php

if (isset($_POST['viewOrderDetail']) && isset($_POST['id_order'])) {
    $id_order = $_POST['id_order'];
?>

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Orders</h4>
                <div class="table_page table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID Order</th>
                                <th>ID Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <?php
                        $OrderItem = new OrderItem();
                        $orderList = $OrderItem->getOrderItems();
                        if ($orderList) {
                            while ($row = $orderList->fetch_assoc()) {
                                if ($row['id_order'] == $id_order) {
                        ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['id_order'] ?></td>
                                            <td><?php echo $row['id_product'] ?></td>
                                            <td><?php echo $row['quantity'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                        </tr>
                                    </tbody>
                        <?php
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php
}

?>

<?php
if (isset($_POST['viewToUpdate'])) {
    $customer = new Customer();
    $showCustomer = $customer->getCustomerByIdCustomer($id_account)->fetch_assoc();
?>
    <div class="modal-dialog fade" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <h3>Account details </h3>
                    <div class="p-4 border rounded">
                        <form class="row g-3" action="#" method="POST" onsubmit="update()">
                            <div class="col-md-3 default-form-box mb-20">
                                <label class="form-label ">ID Customer</label>
                                <input class="form-control" type="text" name="id_cus" value="<?php echo $showCustomer['id_customer'] ?>" readonly>
                            </div>
                            <div class="col-md-3 default-form-box mb-20">
                                <label class="form-label ">ID Account</label>
                                <input class="form-control" type="text" name="id_acc" value="<?php echo $showCustomer['id_account'] ?>" readonly>
                            </div>
                            <div class="col-md-3 default-form-box mb-20">
                                <label class="form-label ">Created date</label>
                                <input class="form-control" type="text" name="create-date" value="<?php echo $showCustomer['createdate'] ?>" readonly>
                            </div>
                            <div class="col-md-3 default-form-box mb-20">
                                <label class="form-label ">Point</label>
                                <input class="form-control" type="text" name="point" value="<?php echo $showCustomer['point'] ?>" readonly>
                            </div>
                            <div class="col-md-6 default-form-box mb-20">
                                <label class="form-label ">Full Name</label>
                                <input class="form-control" type="text" name="full-name" value="<?php echo $showCustomer['fullname'] ?>" require>
                            </div>
                            <div class="col-md-6 default-form-box mb-20">
                                <label class="form-label ">Address</label>
                                <input class="form-control" type="text" name="address" value="<?php echo $showCustomer['address'] ?>" require>
                            </div>
                            <div class="col-md-6 default-form-box mb-20">
                                <label class="form-label ">Email</label>
                                <input class="form-control" type="text" name="email" value="<?php echo $showCustomer['email'] ?>" require>
                            </div>
                            <div class="col-md-6 default-form-box mb-20">
                                <label class="form-label ">Phone</label>
                                <input class="form-control" type="text" name="phone" value="<?php echo $showCustomer['phone'] ?>" require>
                            </div>


                            <div class="save_button mt-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

}
?>


<?php
if (isset($_POST['update']) && isset($_POST['id_account'])) {
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
    if ($result) {
        echo 1;
    } else
        echo 0;
}
?>