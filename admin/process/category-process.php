<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/category.php';
require_once $path . '/../class/categoryChild.php';
?>


<?php
if (isset($_GET['getCategoryChild']) && isset($_GET['id_category'])) {
    $id_category = $_GET['id_category'];
    $categoryChild = new CategoryChild();
    $result = $categoryChild->getCategoryChildsByCategoryId($id_category);
    if ($result) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
?>
            <tr>
                <td><?php echo $row['id_categorychild'] ?></td>
                <td><?php echo $row['id_category'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td>
                    <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-dark" onclick="viewToUpdateChild('<?php print($row['id_categorychild']) ?>')">
                            <ion-icon name="pencil-sharp"></ion-icon>
                        </a>
                        <a onclick=" confirm('Xoa khong?') ? deleteCategoryChild('<?php print($row['id_categorychild']) ?>') : event.preventDefault() " href="javascript:;" class="text-dark">
                            <ion-icon name="trash-sharp"></ion-icon>
                        </a>
                    </div>
                </td>
            </tr>

<?php
        }
    }
}



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
                                <input type="text" class="form-control" id="validationCustom01" value="CA<?php echo (int) (microtime(true)) ?>" name="add_idCate" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="validationName" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="validationName" value="" name="add_nameCate" >
                                <div id="txtName" class="invalid-feedback">Enter Name</div>
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
    $idCate = $_POST['id'];
    $nameCate = $_POST['name'];
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
                                <input type="text" class="form-control" id="validationCustom01" name="update_idCate" value="<?php echo $categoryById['id_category'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="validationName" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="validationName" name="update_nameCate" value="<?php echo $categoryById['name'] ?>" >
                                <div id="txtName" class="invalid-feedback">Enter Name</div>
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
    $id = $_POST['id'];
    $name = $_POST['name'];

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

<?php
if (isset($_POST['viewToAddChild'])) {
?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thêm danh mục con</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="addChild()">
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã danh mục con</label>
                                <input type="text" class="form-control" id="validationCustom01" value="CC<?php echo (int) (microtime(true)) ?>" name="add_idCateChild" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Danh mục</label>
                                <!-- <input type="text" class="form-control" id="validationCustom01" value="" name="add_idCateMom" required> -->
                                <select name="add_idCateMom" id="add_idCateMom" class="form-select col-md-2" aria-label="Default select example">
                                    <?php
                                    $selectCate = new Category();

                                    $getCate = $selectCate->getCategories();
                                    if ($getCate) {
                                        while ($rowCate = $getCate->fetch_assoc()) {
                                    ?>
                                            <option value="<?php echo $rowCate['id_category'] ?>"><?php echo $rowCate['name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationName" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="validationName" value="" name="add_nameCateChild">
                                <div id="txtName" class="invalid-feedback">Enter Name</div>
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
if (isset($_POST['addChild'])) {
    $idCateChild = $_POST['sub_id'];
    $idCate = $_POST['id'];
    $nameCate = $_POST['name'];
    $categoryChild = new CategoryChild();
    $addCategoryChild = $categoryChild->insert($idCateChild, $idCate, $nameCate);
    if ($addCategoryChild) {
        echo "Add thanh cong";
    } else {
        echo 0;
    }
}
?>

<?php
if (isset($_POST['viewToUpdateChild']) && isset($_POST['sub_id'])) {
    $id = $_POST['sub_id'];
    $categoryChildModal = new CategoryChild();
    $categoryChildById = $categoryChildModal->getCategoryChildByIds($id)->fetch_assoc();
?>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Sửa danh mục con</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" method="POST" onsubmit="updateChild()" novalidate>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Mã danh mục con</label>
                                <input type="text" class="form-control" id="validationCustom01" name="update_idCateChild" value="<?php echo $categoryChildById['id_categorychild'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Danh mục</label>

                                <select name="update_idCateMom" id="update_idCateMom" class="form-select col-md-2" aria-label="Default select example">
                                    <?php
                                    $selectCate = new Category();

                                    $getCate = $selectCate->getCategories();
                                    $getCateById = $selectCate->getCategoryById($categoryChildById['id_category']);
                                    $rowOfCateSelected = $getCateById->fetch_assoc();
                                    if ($getCate) {
                                        while ($rowCate = $getCate->fetch_assoc()) {
                                            if ($categoryChildById['id_category'] == $rowCate['id_category']) 
                                                 echo  '<option value="'.$rowCate['id_category'].'" selected>'.$rowCate['name'].'</option>';
                                            else 
                                                 echo  '<option value="'.$rowCate['id_category'].'" >'.$rowCate['name'].'</option>';
                                        }
                                    
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationName" class="form-label">Tên danh mục</label>
                                <input type="text" class="form-control" id="validationName" name="update_nameCateChild" value="<?php echo $categoryChildById['name'] ?>" >
                                <div id="txtName" class="invalid-feedback">Enter Name</div>
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

if (isset($_POST['updateChild']) && isset($_POST['sub_id'])) {
    $sub_id = $_POST['sub_id'];
    $id = $_POST['id'];
    $name = $_POST['name'];

    $categoryChildModal = new CategoryChild();

    $updatecategory = $categoryChildModal->update($sub_id, $id, $name);
    if ($updatecategory) {
        echo 1;
    } else {
        echo 0;
    }
}


?>
<?php
//sdfdf

if (isset($_POST['deleteChild']) && isset($_POST['sub_id'])) {
    $sub_id = $_POST['sub_id'];
    $categoryChildeModal = new CategoryChild();
    $deletecategoryChild = $categoryChildeModal->delete($sub_id);
    if ($deletecategoryChild) {
        echo 1;
    } else {
        echo 0;
    }
}

?>