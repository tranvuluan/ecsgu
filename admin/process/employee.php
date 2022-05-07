<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/employee.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/position.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/account.php';

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
                                <div class="row">
                                    <div class="col-6">
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
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" checked="">
                                                <input class="form-check-input" type="radio" name="status" value="0">
                                                <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                                            </div>
                                    </div>
                                    <div class="col-6">
                                        <img src="" alt="" id="image_employee">
                                    </div>
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
                        <img src="<?php echo $getEmployee['image'] ?>" alt="" style="width:200px;">

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

<?php
if (isset($_POST['viewToAdd'])) {
?>
    <!-- Modal xem thông tin nhân viên -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin nhân viên</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" method="POST" onsubmit="add()">
                            <div class="col-md-3">
                                <label for="validationId" class="form-label">Mã nhân viên</label>
                                <input type="text" class="form-control" id="validationId" name="employeeId" value="EM<?php echo (int)(microtime(true) * 1000) ?>">
                                <div id="txtId" class="invalid-feedback">Enter ID!</div>
                            </div>
                            <div class="col-md-3">
                                <label for="validationGender" class="form-label">Giới tính</label>
                                <select class="form-select" id="validationGender" name="gender" aria-label="Default select example">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control datepicker" id="validationBirthday" name="birthday" value="" />
                                <div id="txtBirthday" class="invalid-feedback">Enter Birthday!</div>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCMND" class="form-label">CMND/CCCD</label>
                                <input type="text" class="form-control" id="validationCMND" name="cmnd" value="">
                                <div id="txtCMND" class="invalid-feedback">Enter CMND!</div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationName" class="form-label">Tên nhân viên</label>
                                <input type="text" class="form-control" id="validationName" name="employeeName" value="">
                                <div id="txtName" class="invalid-feedback">Enter Name!</div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" id="validationEmail" name="email" value="">
                                <div id="txtEmail" class="invalid-feedback">Enter Email!</div>
                            </div>
                            <div class="col-md-8">
                                <label for="validationAddress" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationAddress" name="address" value="">
                                <div id="txtAddress" class="invalid-feedback">Enter Address!</div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationPhone" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="validationPhone" name="phone" value="">
                                <div id="txtPhone" class="invalid-feedback">Enter Phone!</div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationPosition" class="form-label">Chức vụ</label>
                                <select id="validationPosition" name="position" class="form-select">
                                    <?php
                                    $positionModel = new Position();
                                    $getPosition = $positionModel->getPositions();
                                    if ($getPosition) {
                                        while ($row = $getPosition->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $row['id_position'] ?>"><?php echo $row['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="col-md-6">
                                <label for="validationUser" class="form-label">Tài khoản</label>
                                <input type="text" class="form-control" id="validationUser" name="username" value="">
                                <div id="txtUser" class="invalid-feedback">Enter User!</div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="validationCustom04" class="form-label">Trạng thái</label>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <input class="form-check-input" type="radio" name="status" value="1" checked="">
                                            <label class="form-check-label" for="flexRadioDefault1">Hoạt động</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" checked="">
                                            <input class="form-check-input" type="radio" name="status" value="0">
                                            <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" id="fileEmployeeImage" onchange="changeAddEmployeeImage()">
                                        </div>
                                        <img src="" alt="" style="width:200px" id="imageEmployee">
                                        <div class="spinner-border d-none" role="status" id="loadingImage">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationPassword" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="validationPassword" name="password" value="">
                                <div id="txtPassword" class="invalid-feedback">Enter Password!</div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <label for="validationConfirmPassword" class="form-label">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" id="validationConfirmPassword" name="confirm_password" value="">
                                <div id="txtConfirmPassword" class="invalid-feedback">Enter Confirm Password!</div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit">Thêm</button>
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

<?php
if (isset($_POST['add'])) {
    $accountModel = new Account();
    $employeeModel = new Employee();
    $id_employee = $_POST['id'];
    $id_position = $_POST['position'];
    $fullname = $_POST['name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $cmnd = $_POST['cmnd'];

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $status = $_POST['status'];

    if ($password == $confirm_password) {
        $addAccount = $accountModel->insert($id_employee, $username, $password);
    }
    if ($addAccount) {
        if ($status == 1) {
            $active = $accountModel->active($id_employee);
        } else {
            $suspend = $accountModel->suspend($id_employee);
        }
        $addEmployee = $employeeModel->insert($id_employee, $id_position, $fullname, $gender, $birthday, $address, $phone, $email, $image, $cmnd);
    }
    if ($addEmployee) {
        echo 1;
    } else {
        echo 0;
    }
}
?>

<?php
if (isset($_POST['viewToUpdate']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $employeeModel = new Employee();
    $getEmployee = $employeeModel->getEmployeeById($id)->fetch_assoc();
    if ($getEmployee) {
?>
        <!-- Modal xem thông tin nhân viên -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thông tin nhân viên</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" method="POST" onsubmit="update()">
                                <div class="col-md-3">
                                    <label for="validationId" class="form-label">Mã nhân viên</label>
                                    <input type="text" class="form-control" id="validationId" name="employeeId" value="<?php echo $getEmployee['id_employee'] ?>">
                                    <div id="txtId" class="invalid-feedback">Enter ID!</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationGender" class="form-label">Giới tính</label>
                                    <select class="form-select" id="validationGender" name="gender" aria-label="Default select example">
                                        <option value="<?php echo $getEmployee['gender'] ?>"><?php echo $getEmployee['gender'] ?></option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Ngày sinh</label>
                                    <input type="text" class="form-control datepicker" id="validationBirthday" name="birthday" value="<?php echo $getEmployee['birthday'] ?>" />
                                    <div id="txtBirthday" class="invalid-feedback">Enter Birthday!</div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCMND" class="form-label">CMND/CCCD</label>
                                    <input type="text" class="form-control" id="validationCMND" name="cmnd" value="<?php echo $getEmployee['cmnd'] ?>">
                                    <div id="txtCMND" class="invalid-feedback">Enter CMND!</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationName" class="form-label">Tên nhân viên</label>
                                    <input type="text" class="form-control" id="validationName" name="employeeName" value="<?php echo $getEmployee['fullname'] ?>">
                                    <div id="txtName" class="invalid-feedback">Enter Name!</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="validationEmail" name="email" value="<?php echo $getEmployee['email'] ?>">
                                    <div id="txtEmail" class="invalid-feedback">Enter Email!</div>
                                </div>
                                <div class="col-md-8">
                                    <label for="validationAddress" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control" id="validationAddress" name="address" value="<?php echo $getEmployee['address'] ?>">
                                    <div id="txtAddress" class="invalid-feedback">Enter Address!</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationPhone" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control" id="validationPhone" name="phone" value="<?php echo $getEmployee['phone'] ?>">
                                    <div id="txtPhone" class="invalid-feedback">Enter Phone!</div>
                                </div>

                                <div class="col-md-6">
                                    <label for="validationPosition" class="form-label">Chức vụ</label>
                                    <select id="validationPosition" name="position" class="form-select">
                                        <?php
                                        $positionModel = new Position();
                                        $getPosition = $positionModel->getPositions();
                                        if ($getPosition) {
                                            while ($row = $getPosition->fetch_assoc()) {
                                                if ($row['id_position'] == $getEmployee['id_position']) {
                                        ?>
                                                    <option value="<?php echo $row['id_position'] ?>" selected><?php echo $row['name'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo $row['id_position'] ?>"><?php echo $row['name'] ?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationUser" class="form-label">Tài khoản</label>
                                    <?php
                                    $accountModel = new Account();
                                    $getAccount = $accountModel->getAccountById($getEmployee['id_employee'])->fetch_assoc();
                                    if ($getAccount) {
                                    ?>
                                        <input type="text" class="form-control" id="validationUser" name="username" value="<?php echo $getAccount['username'] ?>">
                                    <?php
                                    }
                                    ?>
                                    <div id="txtUser" class="invalid-feedback">Enter User!</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="validationCustom04" class="form-label">Trạng thái</label>
                                            <?php
                                            echo ' <div class="form-check">';
                                            if ($getAccount['status'] == '1')
                                                echo     '<input class="form-check-input" type="radio" name="status"  value="1" checked>';
                                            else
                                                echo     '<input class="form-check-input" type="radio" name="status"  value="1" >';
                                            echo     '<label class="form-check-label" for="flexRadioDefault2">Hoạt động</label>';
                                            echo '</div>';
                                            echo ' <div class="form-check">';
                                            if ($getAccount['status'] == '0')
                                                echo     '<input class="form-check-input" type="radio" name="status"  value="0" checked>';
                                            else
                                                echo     '<input class="form-check-input" type="radio" name="status"  value="0" >';
                                            echo '<label class="form-check-label" for="flexRadioDefault2">Khóa</label>';
                                            echo     '</div>';


                                            ?>

                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                                <input type="file" class="form-control" id="fileEmployeeImage" onchange="changeAddEmployeeImage()">
                                            </div>
                                            <img src="<?php echo $getEmployee['image'] ?>" alt="" style="width:200px" id="imageEmployee">
                                            <div class="spinner-border d-none" role="status" id="loadingImage">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6">
                                    <label for="validationPassword" class="form-label">Mật khẩu</label>
                                    <?php
                                    $accountModel = new Account();
                                    $getAccount = $accountModel->getAccountById($getEmployee['id_employee'])->fetch_assoc();
                                    if ($getAccount) {
                                    ?>
                                        <input type="password" class="form-control" id="validationPassword" name="password" value="<?php echo $getAccount['password'] ?>">
                                    <?php
                                    }
                                    ?>
                                    <div id="txtPassword" class="invalid-feedback">Enter Password!</div>
                                </div>
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <label for="validationConfirmPassword" class="form-label">Xác nhận mật khẩu</label>
                                    <input type="password" class="form-control" id="validationConfirmPassword" name="confirm_password" value="">
                                    <div id="txtConfirmPassword" class="invalid-feedback">Enter Confirm Password!</div>
                                </div> -->
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Sửa</button>
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
}
?>

<?php
if (isset($_POST['update'])) {
    $accountModel = new Account();
    $employeeModel = new Employee();
    $id_employee = $_POST['id'];
    $id_position = $_POST['position'];
    $fullname = $_POST['name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $cmnd = $_POST['cmnd'];

    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $confirm_password = $_POST['confirm_password'];

    $status = $_POST['status'];

    if ($status == 1) {
        $active = $accountModel->active($id_employee);
    } else {
        $suspend = $accountModel->suspend($id_employee);
    }
    $updateEmployee = $employeeModel->update($id_employee, $id_position, $fullname, $gender, $birthday, $address, $phone, $email, $image, $cmnd);
    if ($addEmployee) {
        echo 1;
    } else {
        echo 0;
    }
}
?>