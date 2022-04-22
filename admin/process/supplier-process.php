<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/supplier.php';
?>

<?php
if (isset($_POST['viewToAdd'])) {

?>
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin nhà cung cấp</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="add()" novalidate>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã NCC</label>
                                <input type="text" class="form-control" id="validationCustom01" value="SU<?php echo (int)(microtime(true)*1000) ?>" name="add_Id" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationName" class="form-label">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="validationName" value="" name="add_name" required>
                                <div id="txtName" class="invalid-feedback">Enter Name</div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationAddress" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationAddress" value="" name="add_address"  required>
                                <div id="txtAddress" class="invalid-feedback">Enter Address</div>
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
    $suppId = $_POST['id'];
    $suppName = $_POST['name'];
    $suppAdrr = $_POST['address'];

    $supplierModel = new Supplier();

    $addSupplier = $supplierModel->insert($suppId, $suppName, $suppAdrr);
    if ($updateSupplier) {
        echo 1;
    } else {
        echo 0;
    }
}

?>

<?php
if (isset($_POST['view']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $supplierModel = new Supplier();
    $supplierById = $supplierModel->getSupplierById($id)->fetch_assoc();
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin nhà cung cấp</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã NCC</label>
                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $supplierById['id_supplier'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $supplierById['address'] ?>" placeholder="" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom02" class="form-label">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="validationCustom02" value="<?php echo $supplierById['name'] ?>" readonly>
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
    $supplierModel = new Supplier();
    $supplierById = $supplierModel->getSupplierById($id)->fetch_assoc();
?>

    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin nhà cung cấp</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="update()">
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã nhà cung cấp</label>
                                <input type="text" class="form-control" name="update_Id" value="<?php echo $supplierById['id_supplier'] ?>" >
                            </div>
                            <div class="col-md-6">
                                <label for="validationName" class="form-label">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="validationName" name="update_name"  value="<?php echo $supplierById['name'] ?>" >
                                <div id="txtName" class="invalid-feedback">Enter Name</div>
                            </div>
                            <div class="col-md-12">
                                <label for="validationAddress" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationAddress" name="update_address" value="<?php echo $supplierById['address'] ?>" >
                                <div id="txtAddress" class="invalid-feedback">Enter Address</div>
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
    $supplierId = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $supplierModel = new Supplier();

    $updateSupplier = $supplierModel->update($supplierId, $name, $address);
    if ($updateSupplier) {
        echo 1;
    } else {
        echo 0;
    }
}


?>
<?php
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $supplierModel = new Supplier();
    $deletesupplier = $supplierModel->delete($id);
    if ($deletesupplier) {
        echo 1;
    } else {
        echo 0;
    }
}

?>