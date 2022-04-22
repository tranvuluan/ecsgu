<?php
$path = dirname(__FILE__);
require_once($path . '/../../class/position.php');
$path = dirname(__FILE__);
require_once($path . '/../../class/posPermission.php');

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
                                <label for="validationCustom03" class="form-label">Mã chức vụ</label>
                                <input type="text" class="form-control" id="validationCustom01" name="add_id_position">
                                <label for="validationCustom01" class="form-label">Tên chức vụ</label>
                                <input type="text" class="form-control" id="validationCustom01" name="add_name_position" >
                                <br><br>
                                <button class="btn btn-primary"  type="submit">Thêm</button>
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
                                            <label class="form-check-label">  <?php echo $row['name'] ?> </label>
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
    $id_position = uniqid(); // id_position
    $insertPosition = $PositionModel->insert($id_position, $_POST['name_position']);
    if (!$insertPosition) {
        $flag = false;
    }
    for ($i=0; $i < count($_POST['permissions']); $i++) { 
        $insertPermission = $PosPermissionModel->insert($_POST['permissions'][$i]['id_permission'] ,$id_position, $_POST['permissions'][$i]['isChecked']);
        if (!$insertPermission) $flag = false;
    }

    if ($flag ) {
        echo 1;
    } else {
        echo 0;
    }
}
?>