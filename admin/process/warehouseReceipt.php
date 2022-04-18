<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/warehouseReceipt.php';
require_once $path . '/../class/warehouseReceiptDetail.php';
require_once $path . '/../class/supplier.php';
require_once $path . '/../class/product.php';
require_once $path . '/../class/categoryChild.php';
require_once $path . '/../class/brand.php';
require_once $path . '/../class/configurable_product.php';
?>
<?php
if (isset($_GET['getWarehouseReceiptDetail']) && isset($_GET['id_warehousereceipt'])) {
    $id_warehousereceipt = $_GET['id_warehousereceipt'];
    $warehouseReceiptDetailModel = new WarehouseReceiptDetail();
    $result = $warehouseReceiptDetailModel->getWarehouseReceiptDetailById($id_warehousereceipt);
    if ($result) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
?>
            <tr>
                <td><?php echo $row['id_warehousereceipt'] ?></td>
                <td><?php echo $row['id_product'] ?></td>
                <td><?php echo $row['amount'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td>
                    <div class="d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-dark" onclick="viewDetail('<?php print $row['id_product'] ?>')">
                            <ion-icon name="eye-sharp"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-dark" data-toggle="modal" data-target="#updateModalId">
                            <ion-icon name="pencil-sharp"></ion-icon>
                        </a>
                        <a href="javascript:;" class="text-dark">
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
    $supplierModel = new Supplier();
?>
    <!-- Modal xem thông tin phiếu nhập -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">Thêm phiếu nhập</h6>
                    <div class="p-4 border rounded">
                        <form class="row g-3 needs-validation" method="POST" onsubmit="add()" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Mã sản phẩm</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="ProductId" value="PR<?php echo (int) (microtime(true) * 1000) ?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Danh mục</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="CategoryChildName" value="" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Thương hiệu</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="BrandName" value="" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom02" class="form-label">Giá nhập ( đồng )</label>
                                            <input type="text" class="form-control" id="validationCustom02" name="price" value="" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom04" class="form-label">Description</label>
                                            <input type="text" class="form-control" id="validationCustom03" name="description" required>
                                        </div>
                                        <div class="col-md-12">
                                            <br>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                                <input type="file" class="form-control" id="fileImageProductInAddWarehouse">
                                            </div>
                                            <img id="imageProductInAddWarehouse" src="https://via.placeholder.com/300/09f/fff.png" alt="" style="width:200px">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card radius-10 w-100">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center ">
                                                        <h6 class="mb-0 text-uppercase">Chi tiết sản phẩm</h6>
                                                        <div class="fs-5 ms-auto dropdown">
                                                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider">
                                                                </li>
                                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-2">
                                                        <table class="table align-middle mb-0 table-hover">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>Chọn</th>
                                                                    <th>SKU</th>
                                                                    <th>Kích cỡ</th>
                                                                    <th>Số lượng</th>
                                                                    <th>Trạng thái</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><input name="productCheckbox_S"  type="checkbox"></td>
                                                                    <td><input class="form-control" type="text" name="sku_S" value="SKU_PR<?php echo (int) (microtime(true) * 1000) ?>_S"></td>
                                                                    <td style="width:10%"><input class="form-control" type="text" name="option_S" value="S"></td>
                                                                    <td style="width:10%"><input class="form-control" type="text" name="stock_S" value=""></td>
                                                                    <td>
                                                                        <select class="form-select" name="inventory_status_S" id="">
                                                                            <option value="available">
                                                                                <div class="badge bg-primary">Còn hàng</div>
                                                                            </option>
                                                                            <option value="unavailable">
                                                                                <div class="badge bg-primary">Hết hàng</div>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input name="productCheckbox_M" type="checkbox"></td>
                                                                    <td><input class="form-control" type="text" name="sku_M" value="SKU_PR<?php echo (int) (microtime(true) * 1000) ?>_M"></td>
                                                                    <td><input class="form-control" type="text" name="option_M" value="M"></td>
                                                                    <td><input class="form-control" type="text" name="stock_M" value=""></td>
                                                                    <td>
                                                                        <select class="form-select" name="inventory_status_M" id="">
                                                                            <option value="available">
                                                                                <div class="badge bg-primary">Còn hàng</div>
                                                                            </option>
                                                                            <option value="unavailable">
                                                                                <div class="badge bg-primary">Hết hàng</div>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input name="productCheckbox_X"  type="checkbox"></td>
                                                                    <td><input class="form-control" type="text" name="sku_X" value="SKU_PR<?php echo (int) (microtime(true) * 1000) ?>_X"></td>
                                                                    <td><input class="form-control" type="text" name="option_X" value="X"></td>
                                                                    <td><input class="form-control" type="text" name="stock_X" value=""></td>
                                                                    <td>
                                                                        <select class="form-select" name="inventory_status_X" id="">
                                                                            <option value="available">
                                                                                <div class="badge bg-primary">Còn hàng</div>
                                                                            </option>
                                                                            <option value="unavailable">
                                                                                <div class="badge bg-primary">Hết hàng</div>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input name="productCheckbox_XL"  type="checkbox"></td>
                                                                    <td><input class="form-control" type="text" name="sku_XL" value="SKU_PR<?php echo (int) (microtime(true) * 1000) ?>_XL"></td>
                                                                    <td><input class="form-control" type="text" name="option_XL" value="XL"></td>
                                                                    <td><input class="form-control" type="text" name="stock_XL" value=""></td>
                                                                    <td>
                                                                        <select class="form-select" name="inventory_status_XL" id="">
                                                                            <option value="available">
                                                                                <div class="badge bg-primary">Còn hàng</div>
                                                                            </option>
                                                                            <option value="unavailable">
                                                                                <div class="badge bg-primary">Hết hàng</div>
                                                                            </option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="validationCustom01" class="form-label">Mã phiếu nhập</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="warehouseReceiptId"  value="WA<?php echo (int) (microtime(true) * 1000) ?>"  readonly placeholder="" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom01" class="form-label">Tổng tiền</label>
                                            <input type="text" class="form-control" id="totalPrice" name="totalprice" value="" placeholder="" readonly required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom03" class="form-label">Nhà cung cấp</label>
                                            <select class="form-select" name="suplier" aria-label="Default select example">
                                                <?php
                                                $getSupplier = $supplierModel->getSuppliers();
                                                if ($getSupplier) {
                                                    while ($row = $getSupplier->fetch_assoc()) {
                                                ?>
                                                        <option value="<?php echo $row['id_supplier'] ?>"><?php echo $row['name'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom02" class="form-label">Mã nhân viên</label>
                                            <input type="text" class="form-control" id="validationCustom02" name="EmployeeId" value="EM01" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="validationCustom04" class="form-label">Ngày nhập</label>
                                            <input type="text" class="form-control" id="validationCustom03" name="date" value="<?php echo date('Y-m-d') ?>" required>
                                        </div>
                                        <br><br><br>
                                        <div class="card radius-10 w-100">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center ">
                                                    <h6 class="mb-0 text-uppercase">Chi tiết phiếu nhập</h6>
                                                    <div class="fs-5 ms-auto dropdown">
                                                        <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="table-responsive mt-2">
                                                    <table class="table align-middle mb-0 table-hover">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Mã SP</th>
                                                                <th>Tên SP</th>
                                                                <th>Xóa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_warehouseDetailTable">
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" >Thêm vào chi tiết phiếu nhập</button>
                            </div>
                        </form>
                    </div>
                    <button class="btn btn-primary" onclick="addWarehouseReceipt()" >Lưu phiếu nhập</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal xem thông tin phiếu nhập -->
<?php
}
?>

<?php
if(isset($_POST['add'])){
    $WarehouseReceiptModel = new WarehouseReceipt();
    $WarehouseReceiptDetailModel = new WarehouseReceiptDetail();
    $ProductModel = new Product();
    $ConfigurableProductModel = new ConfigurableProduct();

    // insert WarehouseReceiptent into db
    $insertWarehouseReceipt = $WarehouseReceiptModel->insert($_POST['id_warehousereceipt'], $_POST['id_suplier'], $_POST['id_employee'], $_POST['date'], $_POST['totalprice']);
    if (!$insertWarehouseReceipt) {
        echo 0;
        return;
    }

    foreach ($_POST['warehouseDetail'] as $key => $value) {
        // insert WarehouseReceipient details  into db
        $insertWarehouseReceiptDetail = $WarehouseReceiptDetailModel->insert($_POST['id_warehousereceipt'], $value['id_product'], $value['price']);
        // insert product into db
        if (!$insertWarehouseReceiptDetail)  {
            echo 0;
            return;
        }
            # code...
        $insertProduct = $ProductModel->insert($value['id_product'], $value['id_brand'], $value['id_categorychild'], $value['name_product'], $value['images'], '0');
        foreach ($value['configurable_products'] as $keyConfig => $valueConfig) {
                // insert configurable_product  into db
                $insertConfigurableProduct = $ConfigurableProductModel->insert($valueConfig['sku'], $value['id_product'], $valueConfig['stock'], $valueConfig['inventory_status'], $valueConfig['option']);
                if (!$insertConfigurableProduct) {
                    echo 0;
                    return;
                }
        }
    }
    echo 1;

}
?>

<?php
if (isset($_POST['view'])) {
    $id = $_POST['id'];
    $warehouseReceiptModel = new WarehouseReceipt();
    $supplierModel = new Supplier();
    $getWarehouseReceipt = $warehouseReceiptModel->getWarehouseReceiptById($id)->fetch_assoc();
    if ($getWarehouseReceipt) {
?>
        <!-- Modal xem thông tin phiếu nhập -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thông tin phiếu nhập</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Mã phiếu nhập</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="warehousereceiptId" value="<?php echo $getWarehouseReceipt['id_warehousereceipt'] ?>" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">Tổng tiền</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="totalprice" value="<?php echo $getWarehouseReceipt['totalprice'] ?>" placeholder="" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">Nhà cung cấp</label>
                                    <?php
                                    $getnameSupplier = $supplierModel->getSupplierById($getWarehouseReceipt['id_supplier'])->fetch_assoc();
                                    if ($getnameSupplier) {
                                    ?>
                                        <input type="text" class="form-control" id="validationCustom01" name="supplierName" value="<?php echo $getnameSupplier['name'] ?>" placeholder="" required>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">Mã nhân viên</label>
                                    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $getWarehouseReceipt['id_employee'] ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Ngày nhập</label>
                                    <input type="text" class="form-control" id="validationCustom03" value="<?php echo $getWarehouseReceipt['date'] ?>" required>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal xem thông tin phiếu nhập -->
<?php
    }
}
?>

<?php
if (isset($_POST['viewDetail']) && isset($_POST['id'])) {
    $id = $_POST['id'];
    $warehouseReceiptDetailModel = new WarehouseReceiptDetail();
    $productModel = new Product();
    $categoryChildModel = new CategoryChild();
    $brandModel = new Brand();
    $getProduct = $productModel->getProductById($id)->fetch_assoc();
    if ($getProduct) {
?>
        <!-- Modal xem thông tin phiếu nhập -->
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thông tin sản phẩm</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="add()">
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Mã sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductId" value="<?php echo $getProduct['id_product'] ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $getProduct['name'] ?>" required>
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Danh mục</label>
                                    <?php
                                    $getCategoryChild = $categoryChildModel->getCategoryChildByIds($getProduct['id_categorychild'])->fetch_assoc();
                                    if ($getCategoryChild) {
                                    ?>
                                        <input type="text" class="form-control" id="validationCustom01" name="CategoryChildName" value="<?php echo $getCategoryChild['name'] ?>" required>
                                    <?php
                                    }
                                    ?>


                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Giá nhập</label>
                                    <?php
                                    $getPrice = $warehouseReceiptDetailModel->getWarehouseReceiptDetailsByProductId($getProduct['id_product'])->fetch_assoc();
                                    ?>
                                    <input type="text" class="form-control" id="validationCustom01" name="price" value="<?php echo $getPrice['price'] ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Thương hiệu</label>
                                    <?php
                                    $getBrand = $brandModel->getBrandById($getProduct['id_brand'])->fetch_assoc();
                                    ?>
                                    <input type="text" class="form-control" id="validationCustom01" name="BrandName" value="<?php echo $getBrand['name'] ?>" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Hình ảnh</label>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="product-box border" style="width:10%">
                                            <img src="<?php echo $getProduct['image'] ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12">
                                    <div class="card radius-10 w-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center ">
                                                <h6 class="mb-0 text-uppercase">Chi tiết sản phẩm</h6>
                                                <div class="fs-5 ms-auto dropdown">
                                                    <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></div>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                        <li>
                                                            <hr class="dropdown-divider">
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="table-responsive mt-2">
                                                <table class="table align-middle mb-0 table-hover">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Chọn</th>
                                                            <th>SKU</th>
                                                            <th>Kích cỡ</th>
                                                            <th>Số lượng</th>
                                                            <th>Trạng thái</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input type="checkbox"></td>
                                                            <td><input class="form-control" type="text" value="PR9999_S"></td>
                                                            <td style="width:10%"><input class="form-control" type="text" value="S"></td>
                                                            <td style="width:10%"><input class="form-control" type="text"></td>
                                                            <td>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">
                                                                        <div class="badge bg-primary">Còn hàng</div>
                                                                    </option>
                                                                    <option value="">
                                                                        <div class="badge bg-primary">Hết hàng</div>
                                                                    </option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox"></td>
                                                            <td><input class="form-control" type="text" value="PR9999_M"></td>
                                                            <td><input class="form-control" type="text" value="M"></td>
                                                            <td><input class="form-control" type="text"></td>
                                                            <td>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">
                                                                        <div class="badge bg-primary">Còn hàng</div>
                                                                    </option>
                                                                    <option value="">
                                                                        <div class="badge bg-primary">Hết hàng</div>
                                                                    </option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox"></td>
                                                            <td><input class="form-control" type="text" value="PR9999_X"></td>
                                                            <td><input class="form-control" type="text" value="X"></td>
                                                            <td><input class="form-control" type="text"></td>
                                                            <td>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">
                                                                        <div class="badge bg-primary">Còn hàng</div>
                                                                    </option>
                                                                    <option value="">
                                                                        <div class="badge bg-primary">Hết hàng</div>
                                                                    </option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox"></td>
                                                            <td><input class="form-control" type="text" value="PR9999_XL"></td>
                                                            <td><input class="form-control" type="text" value="XL"></td>
                                                            <td><input class="form-control" type="text"></td>
                                                            <td>
                                                                <select class="form-select" name="" id="">
                                                                    <option value="">
                                                                        <div class="badge bg-primary">Còn hàng</div>
                                                                    </option>
                                                                    <option value="">
                                                                        <div class="badge bg-primary">Hết hàng</div>
                                                                    </option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal xem thông tin phiếu nhập -->
<?php
    }
}

?>

