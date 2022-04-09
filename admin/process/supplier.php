<?php 
    $path = dirname(__FILE__);
    require_once("$path/../../class/supplier.php");
?>

<?php
if (isset($_POST['viewToAdd'])) {
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin nhà cung cấp</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" method="POST" onsubmit="add()">
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã NCC</label>
                                <input type="text" class="form-control" id="validationCustom01" name="supplierId" value="SUP<?php echo (int) (microtime(true) * 1000)?>" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom01" name="address" value="" placeholder="" required>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom02" class="form-label">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="validationCustom02" name="supplierName" value="" required>
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
    if(isset($_POST['add']) && $_POST['supplierId']){
        $supplierId = $_POST['supplierId'];
        $address = $_POST['address'];
        $supplierName = $_POST['supplierName'];

        $supplierModel = new Supplier();

        $addSupplier = $supplierModel->insert($supplierId, $supplierName, $address);
        if($addSupplier){
            echo 0;
        }
        else{
            echo 1;
        }

    }
?>