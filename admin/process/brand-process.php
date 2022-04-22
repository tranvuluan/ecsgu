<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/brand.php';
?>

<?php
if (isset($_POST['viewToAdd'])) {

?>
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thêm thông tin thương hiệu</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="add()" novalidate>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã thương hiệu</label>
                                <input type="text" class="form-control" id="validationCustom01" value="BR<?php echo (int) (microtime(true)) ?>" name="add_Id"  required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên thương hiệu</label>
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
    $brandId = $_POST['id'];
    $brandName = $_POST['name'];

    $brandModal = new Brand();

    $addBrand = $brandModal->insert($brandId, $brandName);
    if ($addBrand) {
        echo 1;
    } else {
        echo 0;
    }
}

?>

<?php 
if (isset($_POST['view']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $BrandModel = new Brand();
    $BrandById = $BrandModel->getBrandById($id)->fetch_assoc();
?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin thương hiệu</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã thương hiệu</label>
                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $BrandById['id_brand'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên thương hiệu</label>
                                <input type="text" class="form-control" id="validationCustom02" value="<?php echo $BrandById['name'] ?>" required>
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
    $BrandModel = new Brand();
    $BrandById = $BrandModel->getBrandById($id)->fetch_assoc();
?>

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin thương hiệu</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="update()">
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã thương hiệu</label>
                                <input type="text" class="form-control" name="update_Id" value="<?php echo $BrandById['id_brand'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustomUsername" class="form-label">Tên thương hiệu</label>
                                <input type="text" class="form-control" name="update_name"  value="<?php echo $BrandById['name'] ?>" required>
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
    $BrandId = $_POST['id'];
    $name = $_POST['name'];

    $BrandModel = new Brand();

    $updateBrand = $BrandModel->update($BrandId, $name);
    if ($updateBrand) {
        echo 1;
    } else {
        echo 0;
    }
}


?>
<?php
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $BrandModel = new Brand();
    $deleteBrand = $BrandModel->delete($id);
    if ($deleteBrand) {
        echo 1;
    } else {
        echo 0;
    }
}

?>