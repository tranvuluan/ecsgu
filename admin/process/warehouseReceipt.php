<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/product.php';
require_once $path . '/../class/categoryChild.php';
require_once $path . '/../class/brand.php';
require_once $path . '/../class/configurable_product.php';
?>

<?php
if (isset($_POST['viewToAdd'])) {
    // $id = 'PR1640619150209';
    $productModel = new Product();
    $categoryChildModel = new CategoryChild();
    $brandModel = new Brand();
    $configurableProductModel = new ConfigurableProduct();
    $viewProduct = $productModel->getProducts()->fetch_assoc();
    if ($viewProduct) {
?>
        <!-- Modal xem thông tin phiếu nhập -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thêm phiếu nhập</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Mã sản phẩm</label>
                                                <input type="text" class="form-control" id="validationCustom01" name="ProductId" value="<?php echo $viewProduct['id_product'] ?>" name="voucherId" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                                <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $viewProduct['name'] ?>" name="voucherId" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Danh mục</label>
                                                <?php
                                                $getNameCategoryChild = $categoryChildModel->getCategoryChildByIds($viewProduct['id_categorychild'])->fetch_assoc();
                                                if ($getNameCategoryChild) {
                                                ?>
                                                    <input type="text" class="form-control" id="validationCustom01" name="CategoryChild" value="<?php echo $getNameCategoryChild['name'] ?>" name="voucherId" required>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Thương hiệu</label>
                                                <?php
                                                $getNameBrand = $brandModel->getBrandById($viewProduct['id_brand'])->fetch_assoc();
                                                if ($getNameBrand) {
                                                ?>
                                                    <input type="text" class="form-control" id="validationCustom01" name="BrandName" value="<?php echo $getNameBrand['name'] ?>" name="voucherId" required>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="validationCustom02" class="form-label">Giá nhập ( đồng )</label>
                                                <input type="text" class="form-control" id="validationCustom02" value="" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="validationCustom04" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="validationCustom03" required>
                                            </div>
                                            <div class="col-md-12">
                                                <br>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                                    <input type="file" class="form-control" id="inputGroupFile01">
                                                </div>
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
                                                                        <th>Hình ảnh</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <style>
                                                                        input {
                                                                            width: 100%;
                                                                        }
                                                                    </style>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td><input class="form-control" type="text" value="PR9999_S"></td>
                                                                        <td><input class="form-control" type="text" value="S"></td>
                                                                        <td><input class="form-control" type="text"></td>
                                                                        <td>
                                                                            <div class="badge bg-primary">Còn hàng</div>
                                                                        </td>
                                                                        <td>abc</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td><input class="form-control" type="text" value="PR9999_M"></td>
                                                                        <td><input class="form-control" type="text" value="M"></td>
                                                                        <td><input class="form-control" type="text"></td>
                                                                        <td>
                                                                            <div class="badge bg-primary">Còn hàng</div>
                                                                        </td>
                                                                        <td>abc</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td><input class="form-control" type="text" value="PR9999_X"></td>
                                                                        <td><input class="form-control" type="text" value="X"></td>
                                                                        <td><input class="form-control" type="text"></td>
                                                                        <td>
                                                                            <div class="badge bg-primary">Còn hàng</div>
                                                                        </td>
                                                                        <td>abc</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><input type="checkbox"></td>
                                                                        <td><input class="form-control" type="text" value="PR9999_XL"></td>
                                                                        <td><input class="form-control" type="text" value="XL"></td>
                                                                        <td><input class="form-control" type="text"></td>
                                                                        <td>
                                                                            <div class="badge bg-primary">Còn hàng</div>
                                                                        </td>
                                                                        <td>abc</td>
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
                                                        <input type="text" class="form-control" id="validationCustom01" value="#99999" placeholder="" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="validationCustom01" class="form-label">Tổng tiền</label>
                                                        <input type="text" class="form-control" id="validationCustom01" value="$216" placeholder="" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="validationCustom03" class="form-label">Nhà cung cấp</label>
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option value="1">Nhà máy á châu</option>
                                                            <option value="2">Nhà máy thượng hải</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="validationCustom02" class="form-label">Mã nhân viên</label>
                                                        <input type="text" class="form-control" id="validationCustom02" value="#88888" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="validationCustom04" class="form-label">Ngày nhập</label>
                                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo date('Y-m-d') ?>" required>
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
                                                                <table class="table align-middle mb-0">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>Mã SP</th>
                                                                            <th>Tên SP</th>
                                                                            <th>Số lượng</th>
                                                                            <th>Giá nhập</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>#89742</td>
                                                                            <td>#89742</td>
                                                                            <td>50</td>
                                                                            <td>$214</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
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
        <!-- END Modal xem thông tin phiếu nhập -->
<?php
    }
}
?>
<?php
if (isset($_POST['view'])) {
    $id = $_POST['id'];
    $productModel = new Product();
    $categoryChildModel = new CategoryChild();
    $brandModel = new Brand();
    $configurableProductModel = new ConfigurableProduct();
    $viewProduct = $productModel->getProducts()->fetch_assoc();
    if ($viewProduct) {
?>
        <!-- Modal xem thông tin phiếu nhập -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thông tin phiếu nhập</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-5">
                                    <label for="validationCustom01" class="form-label">Mã phiếu nhập</label>
                                    <input type="text" class="form-control" id="validationCustom01" value="#99999" placeholder="" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="validationCustom01" class="form-label">Tổng tiền</label>
                                    <input type="text" class="form-control" id="validationCustom01" value="$216" placeholder="" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="validationCustom03" class="form-label">Nhà cung cấp</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">Nhà máy á châu</option>
                                        <option value="2">Nhà máy thượng hải</option>

                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="validationCustom02" class="form-label">Mã nhân viên</label>
                                    <input type="text" class="form-control" id="validationCustom02" value="#88888" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom04" class="form-label">Ngày nhập</label>
                                    <input type="text" class="form-control" id="validationCustom03" value="<?php echo date('Y-m-d') ?>" required>
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
if (isset($_POST['viewDetail'])) {
    $id = 'PR1640619150209';
    $productModel = new Product();
    $categoryChildModel = new CategoryChild();
    $brandModel = new Brand();
    $configurableProductModel = new ConfigurableProduct();
    $viewProduct = $productModel->getProducts()->fetch_assoc();
    if ($viewProduct) {
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
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductId" value="<?php echo $viewProduct['id_product'] ?>" name="voucherId" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $viewProduct['name'] ?>" name="voucherId" required>
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Danh mục</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="" value="Ao' Thun" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Giá nhập</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="" value="$200" name="voucherId" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Thương hiệu</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="BrandName" value="Cool" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Hình ảnh</label>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="product-box border" style="width:10%">
                                            <img src="<?php echo $viewProduct['image'] ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
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