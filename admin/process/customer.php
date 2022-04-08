<?php
$path = dirname(__FILE__);

require_once $path . '/../../class/customer.php';
require_once $path . '/../class/account.php';

?>

<?php
if (isset($_POST['viewToAdd'])) {
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin khách hàng</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" method="POST" onsubmit="add()">
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Mã khách hàng</label>
                                <input type="text" class="form-control" id="validationCustom01" name="customerId" value="CU<?php echo (int) (microtime(true) * 1000) ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="validationCustom03" name="phone" value="" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Ngày tạo</label>
                                <input type="text" class="form-control datepicker" name="createDate" value="<?php echo date('Y-m-d') ?>" />
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên khách hàng</label>
                                <input type="text" class="form-control" id="validationCustom02" name="customerName" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Email</label>
                                <input type="text" class="form-control" id="validationCustom03" name="email" value="" required>
                            </div>
                            <div class="col-md-8">
                                <label for="validationCustom04" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom03" name="address" value="" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Điểm</label>
                                <input type="text" class="form-control" id="validationCustom03" name="point" value="0" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Thêm</button>
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
if (isset($_POST['add'])) {
    $customerId = $_POST['customerId'];
    $customerName = $_POST['customerName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $point = $_POST['point'];
    $createDate = $_POST['createDate'];



    $accountModel = new Account();
    $customerModel = new Customer();


    $addCustomer = $customerModel->insert($customerId, $customerId, $customerName, $email, $address, $phone, $createDate, $point);
    if ($addCustomer) {
        echo 'Them thanh cong';
    } else {
        echo 'Them that bai';
    }
}
?>

<?php
if (isset($_POST['view']) && $_POST['id']) {
    $customerId = $_POST['id'];
    $customerModel = new Customer();
    $getDetailCustomer = $customerModel->getCustomerById($customerId)->fetch_assoc();
    if ($getDetailCustomer) {
?>
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thông tin khách hàng</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Mã khách hàng</label>
                                    <input type="text" class="form-control" id="validationCustom01" value="CU<?php echo (int) (microtime(true) * 1000) ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="phone" value="<?php echo $getDetailCustomer['phone'] ?>"required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Ngày tạo</label>
                                    <input type="text" class="form-control datepicker" name="createDate"  value="<?php echo $getDetailCustomer['createdate'] ?>"/>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Tên khách hàng</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="customerName" value="<?php echo $getDetailCustomer['fullname'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="email" value="<?php echo $getDetailCustomer['email'] ?>" required>
                                </div>
                                <div class="col-md-8">
                                    <label for="validationCustom04" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="address" value="<?php echo $getDetailCustomer['address'] ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Điểm</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="point" value="<?php echo $getDetailCustomer['point'] ?>" required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>