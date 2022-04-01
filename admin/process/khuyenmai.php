<?php
    $path = dirname(__FILE__);
    require_once $path.'/../../class/voucher.php';
?>


<?php 
    if (isset($_POST['id']) && $_POST['view'] == 'true') {
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
                                            <input type="text" class="form-control" id="validationCustom01" value="<?php echo $voucherById['id_voucher'] ?>" required>
                                            <div class="valid-feedback">Enter ID!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom02" class="form-label">Code</label>
                                            <input type="text" class="form-control" id="validationCustom02" value="<?php echo $voucherById['code'] ?>" required>
                                            <div class="valid-feedback">Enter code</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustomUsername" class="form-label">Discount percent</label>
                                            <div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">%</span>
                                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Start Date</label>
                                            <input type="text" class="form-control datepicker" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">End Date</label>
                                            <input type="text" class="form-control datepicker" />
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
    if (isset($_POST['id']) && $_POST['viewToUpdate'] == 'true') {
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
                                    <form class="row g-3 needs-validation" method="POST" onsubmit="update()">
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">ID</label>
                                            <input type="text" class="form-control" id="validationCustom01" value="" required>
                                            <div class="valid-feedback">Enter ID!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom02" class="form-label">Code</label>
                                            <input type="text" class="form-control" id="validationCustom02" value="" required>
                                            <div class="valid-feedback">Enter code</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustomUsername" class="form-label">Discount percent</label>
                                            <div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">%</span>
                                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Start Date</label>
                                            <input type="text" class="form-control datepicker"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">End Date</label>
                                            <input type="text" class="form-control datepicker" />
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit" >Sửa</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



<?php } ?>


<?php 
    if (isset($_POST['update']) && $_POST['update'] == 'true') {
        $id = $_POST['data'][0]['value'];
        
    }

?>