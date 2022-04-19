<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/employee.php';
require_once $path . '/../class/position.php';
require_once $path . '/../class/account.php';

?>

<?php
if (isset($_POST['view']) && isset($_POST['id'])) {
    $employeeId = $_POST['id'];
    $employeeModel = new Employee();
    $getEmployee = $employeeModel->getEmployeeById($employeeId)->fetch_assoc();
?>
    <!-- Modal xem thông tin nhân viên -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin nhân viên</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label">Mã nhân viên</label>
                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $getEmployee['id_employee'] ?>" readonly>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom03" class="form-label">Giới tính</label>
                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $getEmployee['gender'] ?>" readonly>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control datepicker" value="<?php echo $getEmployee['birthday'] ?>" readonly />
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom04" class="form-label">CMND/CCCD</label>
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getEmployee['cmnd'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên nhân viên</label>
                                <input type="text" class="form-control" id="validationCustom02" value="<?php echo $getEmployee['fullname'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Email</label>
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getEmployee['email'] ?>" readonly>
                            </div>
                            <div class="col-md-8">
                                <label for="validationCustom04" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getEmployee['address'] ?>" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getEmployee['phone'] ?>" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Chức vụ</label>
                                <?php
                                $positionModel = new Position();
                                $nameEmployee = $positionModel->getPositionFromTbl_Employee($getEmployee['id_position']);
                                if ($nameEmployee) {
                                    $rowName = $nameEmployee->fetch_assoc();
                                ?>
                                    <input type="text" class="form-control" id="validationCustom03" value="<?php echo $rowName['name'] ?>" readonly>
                                <?php
                                }

                                ?>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Tài khoản</label>
                                <?php
                                $AccountModel = new Account();
                                $getAccount = $AccountModel->getAccountById($getEmployee['id_employee'])->fetch_assoc();
                                ?>
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getAccount['username'] ?>" readonly>

                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Trạng thái</label>
                                <?php
                                $accountModel = new Account();
                                $getAccount = $accountModel->getAccountById($getEmployee['id_employee'])->fetch_assoc();
                                if ($getAccount['status'] == 1) {
                                ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <input class="form-check-input" type="radio" name="status" value="1" checked="">
                                        <label class="form-check-label" for="flexRadioDefault1">Hoạt động</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked="">
                                        <input class="form-check-input" type="radio" name="status" value="0">
                                        <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                                    </div>
                            </div>

                        <?php
                                } else {
                        ?>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="1">
                                <label class="form-check-label" for="flexRadioDefault1">Hoạt động</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="0" checked="">
                                <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                            </div>


                        <?php
                                }
                        ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END Modal xem thông tin nhân viên -->
<?php
}
?>


