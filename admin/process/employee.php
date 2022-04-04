<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/employee.php';
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
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label">Mã nhân viên</label>
                                <input type="text" class="form-control" id="validationCustom01" value="" required>
                            </div>

                            <div class="col-md-3">
                                <label for="validationCustom03" class="form-label">Giới tính</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                    <option value="3">Khác</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ngày sinh</label>
                                <input type="text" class="form-control datepicker" />
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom04" class="form-label">CMND/CCCD</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên nhân viên</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Email</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                            </div>
                            <div class="col-md-8">
                                <label for="validationCustom04" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label">Chức vụ</label>
                                <select class="form-select col-md-2" aria-label="Default select example">
                                    <option value="1">Quản lý</option>
                                    <option value="2">Nhân viên</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Tài khoản</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Trạng thái</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">Hoạt động</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked="">
                                    <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="validationCustom03" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
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