<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/voucher.php';
?>

<?php
if (isset($_POST['viewToAdd'])) {

?>
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin khuyến mãi</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="add()">
                            <div class="col-md-4">
                                <label for="validationVoucherId" class="form-label">ID</label>
                                <input type="text" class="form-control" id="validationVoucherId" name="voucherId" value="VC<?php echo (int) (microtime(true) * 1000) ?>" name="voucherId" readonly>
                                <div id="txtId" class="invalid-feedback">Enter ID!</div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCode" class="form-label">Code</label>
                                <input type="text" class="form-control" id="validationCode" value="" name="code">
                                <div id="txtCode" class="invalid-feedback">Enter code</div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustomUsername" class="form-label">Discount percent</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">%</span>
                                    <input type="text" class="form-control" id="validationDiscount" name="discount">
                                </div>
                                <div id="txtDiscount" class="invalid-feedback">Enter Discount</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Start Date</label>
                                <input type="text" class="form-control datepicker" name="startdate" id="validationStartdate" />
                                <div id="txtStartdate" class="invalid-feedback">Enter Start Date</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Date</label>
                                <input type="text" class="form-control datepicker" name="enddate" id="validationEnddate" />
                                <div id="txtEnddate" class="invalid-feedback">Enter End Date</div>
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
    $voucherId = $_POST['id'];
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $voucherModel = new Voucher();

    $addVoucher = $voucherModel->insert($voucherId, $code, $discount, $startdate, $enddate);
    if ($updateVoucher) {
        echo 1;
    } else {
        echo 0;
    }
}


?>


<?php
if (isset($_POST['view']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $voucherModel = new Voucher();
    $voucherById = $voucherModel->getVoucherById($id)->fetch_assoc();
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin khuyến mãi</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">ID</label>
                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $voucherById['id_voucher'] ?>" readonly>
                                <div class="valid-feedback">Enter ID!</div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Code</label>
                                <input type="text" class="form-control" id="validationCustom02" value="<?php echo $voucherById['code'] ?>" readonly>
                                <div class="valid-feedback">Enter code</div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustomUsername" class="form-label">Discount percent</label>
                                <div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">%</span>
                                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $voucherById['discountpercent'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Start Date</label>
                                <input type="text" class="form-control datepicker" value="<?php echo $voucherById['startdate'] ?>" readonly/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Date</label>
                                <input type="text" class="form-control datepicker" value="<?php echo $voucherById['enddate'] ?>" readonly/>
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
if (isset($_POST['viewToUpdate']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $voucherModel = new Voucher();
    $voucherById = $voucherModel->getVoucherById($id)->fetch_assoc();
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin khuyến mãi</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="update()">
                            <div class="col-md-4">
                                <label for="validationVoucherId" class="form-label">ID</label>
                                <input type="text" class="form-control" id="validationVoucherId" name="voucherId" value="<?php echo $voucherById['id_voucher'] ?>" >
                                <div id="txtId" class="invalid-feedback">Enter ID!</div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCode" class="form-label">Code</label>
                                <input type="text" class="form-control" id="validationCode" name="code" value="<?php echo $voucherById['code'] ?>" >
                                <div id="txtCode" class="invalid-feedback">Enter code</div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationDiscount" class="form-label">Discount percent</label>
                                <div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">%</span>
                                    <input type="text" class="form-control" name="discount" id="validationDiscount" value="<?php echo $voucherById['discountpercent'] ?>" >
                                </div>
                                <div id="txtDiscount" class="invalid-feedback">Enter Discount</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Start Date</label>
                                <input type="text" class="form-control datepicker" id="validationStartdate" name="startdate" value="<?php echo $voucherById['startdate'] ?>" />
                                <div id="txtStartdate" class="invalid-feedback">Enter Start Date</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Date</label>
                                <input type="text" class="form-control datepicker" id="validationEnddate" name="enddate" value="<?php echo $voucherById['enddate'] ?>" />
                                <div id="txtEnddate" class="invalid-feedback">Enter End Date</div>
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

if (isset($_POST['update']) && isset($_POST['id'])) {
    $voucherId = $_POST['id'];
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    $voucherModel = new Voucher();

    $updateVoucher = $voucherModel->update($voucherId, $code, $discount, $startdate, $enddate);
    if ($updateVoucher) {
        echo 1;
    } else {
        echo 0;
    }
}


?>
<?php
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $voucherModel = new Voucher();
    $deleteVoucher = $voucherModel->delete($id);
    if ($deleteVoucher) {
        echo 1;
    } else {
        echo 0;
    }
}

?>