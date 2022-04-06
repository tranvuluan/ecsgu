<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/category.php';
// require_once $path . '/../../class/categoryChild.php';
?>

<?php
if (isset($_POST['viewToAdd'])) {
?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin danh mục mẹ</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="add()">
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã danh mục</label>
                                <input type="text" class="form-control" id="validationCustom01" value="" name="add_idCate" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="validationCustom02" value="" name="add_nameCate" required>
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
    $idCate = $_POST['add_idCate'];
    $nameCate = $_POST['add_nameCate'];
    $category = new Category();
    $addCategory = $category->insert($idCate, $nameCate);
    if ($addCategory) {
        
        echo 1;
    } else {
        echo 0;
    }
}
?>

<?php
if (isset($_POST['viewToUpdate']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $categoryModal = new Category();
    $categoryById = $categoryModal->getCategoryById($id)->fetch_assoc();
?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin danh mục mẹ</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" method="POST" onsubmit="update()" novalidate>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã danh mục</label>
                                <input type="text" class="form-control" id="validationCustom01" name="update_idCate" value="<?php echo $categoryById['id_category'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="validationCustom02" name="update_nameCate" value="<?php echo $categoryById['name'] ?>" required>
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
    $id = $_POST['update_idCate'];
    $name = $_POST['update_nameCate'];

    $categoryModel = new Category();

    $updatecategory = $categoryModel->update($id, $name);
    if ($updatecategory) {
        echo 1;
    } else {
        echo 0;
    }
}


?>
<?php
if (isset($_POST['delete']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $categoryModel = new category();
    $deletecategory = $categoryModel->delete($id);
    if ($deletecategory) {
        echo 1;
    } else {
        echo 0;
    }
}

?>