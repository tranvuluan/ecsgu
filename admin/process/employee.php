<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/employee.php';
require_once $path . '/../class/position.php';
require_once $path . '/../class/account.php';

?>

<?php
if (isset($_POST['viewToAdd'])) {
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin nhân viên</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" method="POST" onsubmit="add()">
                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label">Mã nhân viên</label>
                                <input type="text" class="form-control" id="validationCustom01" name="employeeId" value="EM<?php echo (int) (microtime(true) * 1000) ?>" required>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom03" class="form-label">Giới tính</label>
                                <select name="gender" class="form-select" aria-label="Default select example">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control datepicker" name="birthday" value="" required>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom04" class="form-label">CMND</label>
                                <input type="text" class="form-control" id="validationCustom03" name="cmnd" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên nhân viên</label>
                                <input type="text" class="form-control" id="validationCustom02" name="employeeName" value="" required>
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
                                <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="validationCustom03" name="phone" value="" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Chức vụ</label>
                                <select name="position" class="form-select col-md-2" aria-label="Default select example">
                                    <?php
                                    $positionModel = new Position();

                                    $getPosition = $positionModel->getPositions();
                                    if ($getPosition) {
                                        while ($rowPosition = $getPosition->fetch_assoc()) {
                                    ?>

                                            <option value="<?php echo $rowPosition['id_position'] ?>"><?php echo $rowPosition['name'] ?></option>

                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Trạng thái</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">Hoạt động</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                                </div>
                            </div>
                            <div class="col-md-6"></div>

                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Tài khoản</label>
                                <input type="text" class="form-control" name="username" value="" required>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" value="" required>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" name="confirm_password" value="" required>
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

    $employeeId = $_POST['id'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $cmnd = $_POST['cmnd'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $status = $_POST['status'];

    $accountModel = new Account();

    if ($password == $confirm_password) {
        $addAccount = $accountModel->insert($employeeId, $username, $password);
        if ($addAccount) {
            if ($status == 1) {
                $activeAccount = $accountModel->active($employeeId);
            } else {
                $suspendAccount = $accountModel->suspend($employeeId);
            }
            $employeeModel = new Employee();
            $addEmployee = $employeeModel->insert($employeeId, $position, $name, $gender, $birthday, $address, $phone, $email, 'abc', $cmnd);
            if ($addEmployee) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }
}

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
                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $getEmployee['id_employee'] ?>" required>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom03" class="form-label">Giới tính</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="<?php echo $getEmployee['gender'] ?>"><?php echo $getEmployee['gender'] ?></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control datepicker" value="<?php echo $getEmployee['birthday'] ?>" />
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom04" class="form-label">CMND/CCCD</label>
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getEmployee['cmnd'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên nhân viên</label>
                                <input type="text" class="form-control" id="validationCustom02" value="<?php echo $getEmployee['fullname'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Email</label>
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getEmployee['email'] ?>" required>
                            </div>
                            <div class="col-md-8">
                                <label for="validationCustom04" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getEmployee['address'] ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getEmployee['phone'] ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Chức vụ</label>
                                <?php
                                $positionModel = new Position();
                                $nameEmployee = $positionModel->getPositionFromTbl_Employee($getEmployee['id_position']);
                                if ($nameEmployee) {
                                    $rowName = $nameEmployee->fetch_assoc();
                                ?>
                                    <input type="text" class="form-control" value="<?php echo $rowName['name'] ?>" required>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Tài khoản</label>
                                <?php
                                $AccountModel = new Account();
                                $getAccount = $AccountModel->getAccountById($employeeId)->fetch_assoc();
                                if ($getAccount) {
                                ?>
                                    <input type="text" class="form-control" value="<?php echo $getAccount['username'] ?>" required>

                                <?php
                                }
                                ?>
                            </div>

                            <?php
                            $accountModel = new Account();
                            $getAccount = $accountModel->getAccountById($getEmployee['id_employee'])->fetch_assoc();
                            if ($getAccount['status'] == 1) {
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="1" checked="">
                                    <label class="form-check-label" for="flexRadioDefault1">Hoạt động</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="0">
                                    <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
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

<?php
if (isset($_POST['viewToUpdate']) && $_POST['id']) {
    $employeeId = $_POST['id'];
    $employeeModel = new Employee();
    $getEmployee = $employeeModel->getEmployeeById($employeeId)->fetch_assoc();
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin nhân viên</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" method="POST" onsubmit="update()">
                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label">Mã nhân viên</label>
                                <input type="text" class="form-control" id="validationCustom01" name="employeeId" value="<?php echo $getEmployee['id_employee'] ?>" required>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom03" class="form-label">Giới tính</label>
                                <select name="gender" class="form-select" aria-label="Default select example">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control datepicker" name="birthday" value="<?php echo $getEmployee['birthday']; ?>" required>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom04" class="form-label">CMND</label>
                                <input type="text" class="form-control" id="validationCustom03" name="cmnd" value="<?php echo $getEmployee['cmnd']; ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên nhân viên</label>
                                <input type="text" class="form-control" id="validationCustom02" name="employeeName" value="<?php echo $getEmployee['fullname'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Email</label>
                                <input type="text" class="form-control" id="validationCustom03" name="email" value="<?php echo $getEmployee['email']; ?>" required>
                            </div>
                            <div class="col-md-8">
                                <label for="validationCustom04" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom03" name="address" value="<?php echo $getEmployee['address'] ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="validationCustom03" name="phone" value="<?php echo $getEmployee['phone'] ?>" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Chức vụ</label>
                                <select name="position" class="form-select col-md-2" aria-label="Default select example">
                                    <?php
                                    $positionModel = new Position();

                                    $getPosition = $positionModel->getPositions();
                                    if ($getPosition) {
                                        while ($rowPosition = $getPosition->fetch_assoc()) {
                                    ?>

                                            <option value="<?php echo $rowPosition['id_position'] ?>"><?php echo $rowPosition['name'] ?></option>

                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Trạng thái</label>
                                <?php
                                $accountModel = new Account();
                                $getAccount = $accountModel->getAccountById($getEmployee['id_employee'])->fetch_assoc();
                                if ($getAccount['status'] == 1) {
                                ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="1" checked="">
                                        <label class="form-check-label" for="flexRadioDefault1">Hoạt động</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="0">
                                        <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
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
                            <div class="col-md-6"></div>

                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Tài khoản</label>
                                <?php
                                $accountModel = new Account();
                                $getAccount = $accountModel->getAccountById($getEmployee['id_employee'])->fetch_assoc();
                                ?>
                                <input type="text" class="form-control" name="username" value="<?php echo $getAccount['username'] ?>" required>

                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Mật khẩu</label>
                                <?php
                                $accountModel = new Account();
                                $getAccount = $accountModel->getAccountById($getEmployee['id_employee'])->fetch_assoc();
                                ?>
                                <input type="text" class="form-control" name="password" value="<?php echo $getAccount['password'] ?>" required>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Xác nhận mật khẩu</label>
                                <?php
                                $accountModel = new Account();
                                $getAccount = $accountModel->getAccountById($getEmployee['id_employee'])->fetch_assoc();
                                ?>
                                <input type="text" class="form-control" name="confirm_password" value="<?php echo $getAccount['password'] ?>" required>
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

?>

<?php
if (isset($_POST['update']) && $_POST['id']) {
    $id = $_POST['id'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $cmnd = $_POST['cmnd'];
    $employeeName = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $confirm_password = $_POST['confirm_password'];

    $status = $_POST['status'];

    $accountModel = new Account();
    if ($status == 1) {
        $activeAccount = $accountModel->active($id);
        if ($activeAccount) {
            $employeeModel = new Employee();
            $updateEmployee = $employeeModel->update($id, $position, $employeeName, $gender, $birthday, $address, $phone, $email, 'abc', $cmnd);
            if ($updateEmployee) {
                echo 1;
            } else {
                echo 0;
            }
        }
    } else {
        $lockAccount = $accountModel->suspend($id);
        echo 'Khoa tai khoan';
    }
}
?>