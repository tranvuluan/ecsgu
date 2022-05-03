<?php
$path = dirname(__FILE__);

require_once $path . '/../../class/customer.php';
require_once $path . '/../class/account.php';

?>

<?php
if (isset($_POST['view']) && $_POST['id']) {
    $customerId = $_POST['id'];
    $customerModel = new Customer();
    $getDetailCustomer = $customerModel->getCustomerByIdCustomer($customerId)->fetch_assoc();
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
                                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $getDetailCustomer['id_customer'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="phone" value="<?php echo $getDetailCustomer['phone'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Ngày tạo</label>
                                    <input type="text" class="form-control datepicker" name="createDate" value="<?php echo $getDetailCustomer['createdate'] ?>" readonly/>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Tên khách hàng</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="customerName" value="<?php echo $getDetailCustomer['fullname'] ?>" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="email" value="<?php echo $getDetailCustomer['email'] ?>" readonly>
                                </div>
                                <div class="col-md-8">
                                    <label for="validationCustom04" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="address" value="<?php echo $getDetailCustomer['address'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Điểm</label>
                                    <input type="text" class="form-control" id="validationCustom03" name="point" value="<?php echo $getDetailCustomer['point'] ?>" readonly>
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


<?php
if (isset($_POST['viewToUpdate']) && $_POST['id']) {
    $customerId = $_POST['id'];
    $customerModel = new Customer();
    $getDetailCustomer = $customerModel->getCustomerByIdCustomer($customerId)->fetch_assoc();
    if ($getDetailCustomer) {
?>
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thông tin khách hàng</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" method="POST" onsubmit="update()">
                                <div class="col-md-4">
                                    <label for="validationId" class="form-label">Mã khách hàng</label>
                                    <input type="text" class="form-control" id="validationId" name="customerId" value="<?php echo $customerId ?>" >
                                    <div id="txtId" class="invalid-feedback">Enter ID!</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationPhone" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="validationPhone" name="phone" value="<?php echo $getDetailCustomer['phone'] ?>" >
                                    <div id="txtPhone" class="invalid-feedback">Enter Phone!</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Ngày tạo</label>
                                    <input type="text" class="form-control datepicker" id="validationCreatedate" name="createDate" value="<?php echo $getDetailCustomer['createdate'] ?>" />
                                    <div id="txtCreatedate" class="invalid-feedback">Enter Create Date!</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationName" class="form-label">Tên khách hàng</label>
                                    <input type="text" class="form-control" id="validationName" name="customerName" value="<?php echo $getDetailCustomer['fullname'] ?>" >
                                    <div id="txtName" class="invalid-feedback">Enter Name!</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="validationEmail" name="email" value="<?php echo $getDetailCustomer['email'] ?>" >
                                    <div id="txtEmail" class="invalid-feedback">Enter Email!</div>
                                </div>
                                <div class="col-md-8">
                                    <label for="validationAddress" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="validationAddress" name="address" value="<?php echo $getDetailCustomer['address'] ?>" >
                                    <div id="txtAddress" class="invalid-feedback">Enter Address!</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationPoint" class="form-label">Điểm</label>
                                    <input type="text" class="form-control" id="validationPoint" name="point" value="<?php echo $getDetailCustomer['point'] ?>" >
                                    <div id="txtPoint" class="invalid-feedback">Enter Point!</div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Sửa</button>
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

<?php
if (isset($_POST['update']) && $_POST['customerId']) {
    $customerId = $_POST['customerId'];
    $phone = $_POST['phone'];
    $customerName = $_POST['customerName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $point = $_POST['point'];
    $createdate = $_POST['createDate'];
    $customerModel = new Customer();
    $updateCustomer = $customerModel->update($id_customer, $id_account, $fullname, $email, $address, $phone, $createdate, $point);
    if ($updateCustomer) {
        echo 0;
    } else {
        echo 1;
    }
}
?>

<?php
if (isset($_POST['delete']) && $_POST['id']) {
    $id = $_POST['id'];
    $customerModel = new Customer();
    $deleteCustomer = $customerModel->delete($id);
    if ($deleteCustomer) {
        echo 0;
    } else {
        echo 1;
    }
}
?>