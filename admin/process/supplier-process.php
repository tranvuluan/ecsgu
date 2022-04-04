<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/supplier.php';
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
                        <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="add()" novalidate>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã NCC</label>
                                <input type="text" class="form-control" id="validationCustom01" value="" name="add_Id" placeholder="SU01" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom01" value="" name="add_address" placeholder="" required>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom02" class="form-label">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" name="add_name" required>
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
    $suppAdrr = $_POST['adress'];

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
                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $supplierById['id_supplier'] ?>" placeholder="SU01" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $supplierById['address'] ?>" placeholder="" required>
                            </div>
                            <div class="col-md-12">
                                <label for="validationCustom02" class="form-label">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" id="validationCustom02" value="<?php echo $supplierById['name'] ?>" required>
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
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Mã nhà cung cấp</label>
                                <input type="text" class="form-control" name="update_Id" value="<?php echo $supplierById['id_supplier'] ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="update_address" value="<?php echo $supplierById['address'] ?>" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustomUsername" class="form-label">Tên nhà cung cấp</label>
                                <input type="text" class="form-control" name="update_name"  value="<?php echo $supplierById['name'] ?>" required>
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
    $address = $_POST['adress'];

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