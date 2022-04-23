<?php
$path = dirname(__FILE__);
require_once($path . '/../../class/position.php');
$path = dirname(__FILE__);
require_once($path . '/../../class/posPermission.php');
$path = dirname(__FILE__);
require_once($path . '/../../class/permission.php');


if (isset($_GET['get_permission']) && isset($_GET['position'])) {
    $PositionModel = new Position();
    $id_position = $_GET['id_position'];
    $positions = $PositionModel->getPositions();
    if ($positions) {
?>



<?php
    }
}
?>

<?php
if (isset($_GET['get_modal_add_position'])) {

?>
    <!-- start modal xem phân quyền -->
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin phân quyền</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" onsubmit="addPosition()">
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label"></label>
                                <input type="text" class="form-control" id="validationCustom01" name="add_id_position" value="<?php echo uniqid() ?>" readonly>
                                <label for="validationCustom01" class="form-label">Tên chức vụ</label>
                                <input type="text" class="form-control" id="validationCustom01" name="add_name_position">
                                <br><br>
                                <button class="btn btn-primary" type="submit">Thêm</button>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $path = dirname(__FILE__);
                                require_once($path . '/../../class/permission.php');
                                $PermissionModel = new Permission();
                                $permissions = $PermissionModel->getPermissions();
                                if ($permissions) {
                                    while ($row = $permissions->fetch_assoc()) {
                                ?>
                                        <div class="form-check-danger form-check form-switch">
                                            <input class="form-check-input" name="checkboxAdd[]" type="checkbox" value="<?php echo $row['id_permission'] ?>">
                                            <label class="form-check-label"> <?php echo $row['name'] ?> </label>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal xem phân quyền -->

<?php
}
?>


<?php
if (isset($_GET['get_modal_update_position'])) {
    $PositionModel = new Position();
    $PosPermissionModel = new PosPermission();
    $PermissionModel = new Permission();
?>
    <!-- start modal xem phân quyền -->
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thông tin phân quyền</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" onsubmit="updatePosition('<?php echo $_GET['id_position'] ?>')">
                            <div class="col-md-6">
                                <label for="validationCustom03" class="form-label"></label>
                                <input type="text" class="form-control" id="validationCustom01" name="add_id_position" value="<?php echo $_GET['id_position'] ?>" readonly>
                                <label for="validationCustom01" class="form-label">Tên chức vụ</label>
                                <input type="text" class="form-control" id="validationCustom01" name="add_name_position">
                                <br><br>
                                <button class="btn btn-primary" type="submit">Cập nhật</button>
                            </div>
                            <div class="col-md-6">
                                <?php
                                $permissionByPosition = $PosPermissionModel->getPermissionByPosId($_GET['id_position']);
                                if ($permissionByPosition) {
                                    while ($row = $permissionByPosition->fetch_assoc()) {
                                        $permissionByIdPermission = $PermissionModel->getPermissionById($row['id_permission'])->fetch_assoc();

                                ?>
                                        <div class="form-check-danger form-check form-switch">
                                            <?php
                                            if ($row['status'] == 1)
                                                echo '<input class="form-check-input" type="checkbox" name="checkboxAdd[]" value="' . $row['id_permission'] . '" checked>';
                                            else
                                                echo '<input class="form-check-input" type="checkbox" name="checkboxAdd[]" value="' . $row['id_permission'] . '">';

                                            ?>
                                            <label class="form-check-label"> <?php echo $permissionByIdPermission['name'] ?> </label>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal xem phân quyền -->

<?php
}
?>


<?php
if (isset($_POST['add_position'])) {
    $PositionModel = new Position();
    $PosPermissionModel = new PosPermission();
    $flag = true;
    $insertPosition = $PositionModel->insert($_POST['id_position'], $_POST['name_position']);
    if (!$insertPosition) {
        $flag = false;
    }

    foreach ($_POST['permissions'] as $key => $value) {
        $insertPermission = $PosPermissionModel->insert($value['id_permission'], $_POST['id_position'], $value['isChecked']);
        if (!$insertPermission) $flag = false;
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}
?>


<?php 
if (isset($_POST['update_position'])) {
    $PositionModel = new Position();
    $PosPermissionModel = new PosPermission();
    $flag = true;
    $insertPosition = $PositionModel->update($_POST['id_position'], $_POST['name_position']);
    if (!$insertPosition) {
        $flag = false;
    }

    foreach ($_POST['permissions'] as $key => $value) {
        $insertPermission = $PosPermissionModel->update($value['id_permission'], $_POST['id_position'], $value['isChecked']);
        if (!$insertPermission) $flag = false;
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}
?>

<?php
if (isset($_GET['get_permission'])) {
    $PosPermissionModel = new PosPermission();
    $PermissionModel = new Permission();
?>
    <div class="card-body">
        <?php
        $permissionByPosition = $PosPermissionModel->getPermissionByPosId($_GET['id_position']);
        if ($permissionByPosition) {
            while ($row = $permissionByPosition->fetch_assoc()) {
                $permissionByIdPermission = $PermissionModel->getPermissionById($row['id_permission'])->fetch_assoc();

        ?>
                <div class="form-check-danger form-check form-switch">
                    <?php
                    if ($row['status'] == 1)
                        echo '<input class="form-check-input" type="checkbox" value="' . $row['id_permission'] . '" checked>';
                    else
                        echo '<input class="form-check-input" type="checkbox" value="' . $row['id_permission'] . '">';

                    ?>
                    <label class="form-check-label"> <?php echo $permissionByIdPermission['name'] ?> </label>
                </div>
        <?php
            }
        }
        ?>

    </div>

<?php
}
?>

<?php
if (isset($_POST['delete_position'])) {
    $PosPermissionModel  = new PosPermission();
    $PositionModel = new Position();
    $deletePosPer = $PosPermissionModel->delete($_POST['id_position']);
    $flag = true;
    if (!$deletePosPer)
        $flag = false;

    $deletePosition = $PositionModel->delete($_POST['id_position']);
    if (!$deletePosition)
        $flag = false;
    if ($flag)
        echo 1;
    else
        echo 0;
}


?>