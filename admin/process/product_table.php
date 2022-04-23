<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/product.php';
require_once $path . '/../class/categoryChild.php';
require_once $path . '/../class/brand.php';
require_once $path . '/../class/configurable_product.php';
?>

<?php
if (isset($_POST['view']) && $_POST['id']) {
    $id = $_POST['id'];
    $productModel = new Product();
    $categoryChildModel = new CategoryChild();
    $brandModel = new Brand();
    $configurableProductModel = new ConfigurableProduct();
    $viewProduct = $productModel->getProductById($id)->fetch_assoc();
    if ($viewProduct) {
?>
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thông tin sản phẩm</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="upload()">
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Mã sản phẩm</label>
                                    <input type="text" class="form-control" id="id_product" name="ProductId" value="<?php echo $viewProduct['id_product'] ?>" name="voucherId" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $viewProduct['name'] ?>" name="voucherId" readonly>
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Danh mục</label>
                                    <?php
                                    $getNameCategoryChild = $categoryChildModel->getCategoryChildByIds($viewProduct['id_categorychild'])->fetch_assoc();
                                    if ($getNameCategoryChild) {
                                    ?>
                                        <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $getNameCategoryChild['name'] ?>" name="voucherId" readonly>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Giá</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="Price" value="<?php echo $viewProduct['price'] ?>" name="voucherId" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Thương hiệu</label>
                                    <?php
                                    $getNameBrand = $brandModel->getBrandById($viewProduct['id_brand'])->fetch_assoc();
                                    if ($getNameBrand) {
                                    ?>
                                        <input type="text" class="form-control" id="validationCustom01" name="BrandName" value="<?php echo $getNameBrand['name'] ?>" name="voucherId" readonly>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-12">
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
                                <div class="col-md-12"></div>
                                <div class="table-responsive mt-2">
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Chọn</th>
                                                <th>SKU</th>
                                                <th>Chọn kích cỡ</th>
                                                <th>Trạng thái</th>
                                                <th>Số lượng</th>
                                                <th>Đã bán</th>
                                                <th>Hình ảnh</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $getConfigurableProduct = $configurableProductModel->getConfigurableProductById($id);
                                        if ($getConfigurableProduct) {
                                            while ($rowCheck = $getConfigurableProduct->fetch_assoc()) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td><?php echo $rowCheck['sku'] ?></td>
                                                        <td><?php echo $rowCheck['option'] ?></td>
                                                        <td>
                                                            <?php
                                                            $getStatus = $configurableProductModel->getConfigurableProductById($rowCheck['id_product']);
                                                            if ($getStatus) {
                                                                $rowStatus = $getStatus->fetch_assoc();
                                                                if ($rowStatus['inventory_status'] == 1) {
                                                            ?>
                                                                    <div class="badge bg-primary">Còn hàng</div>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <div class="badge bg-danger">Hết</div>
                                                            <?php
                                                                }
                                                            }
                                                            ?>

                                                        </td>
                                                        <td><?php echo $rowCheck['stock'] ?></td>
                                                        <td><?php echo $rowCheck['quantity_sold'] ?></td>
                                                        <td>abc</td>
                                                    </tr>
                                                </tbody>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </table>
                                </div>

                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary">Đăng Bán</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>

<?php
if (isset($_POST['upload'])) {
    $id_product = $_POST['id_product'];
    $price = $_POST['price'];
    $productModel = new Product();
    $activeProduct = $productModel->active($id_product, $price);
    if ($activeProduct) {
        echo "<script>alert('Đã đăng bán sản phẩm')</script>";
    } else {
        echo 0;
    }
}
?>

<?php
if (isset($_POST['viewToUpdate']) && $_POST['id']) {
    $id = $_POST['id'];
    $productModel = new Product();
    $categoryChildModel = new CategoryChild();
    $brandModel = new Brand();
    $configurableProductModel = new ConfigurableProduct();
    $viewProduct = $productModel->getProductById($id)->fetch_assoc();
    if ($viewProduct) {
?>
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thông tin sản phẩm</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="update()">
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Mã sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductId" value="<?php echo $viewProduct['id_product'] ?>" name="voucherId" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $viewProduct['name'] ?>" name="voucherId" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Thương hiệu</label>
                                    <select name="id_brand" id="" class="form-select">
                                        <?php
                                        $getNameBrand = $brandModel->getBrands();
                                        if ($getNameBrand) {
                                            while ($rowNameBrand = $getNameBrand->fetch_assoc()) {
                                                if ($rowNameBrand['id_brand'] == $viewProduct['id_brand']) {
                                        ?>
                                                    <option value="<?php echo $rowNameBrand['id_brand'] ?>" selected><?php echo $rowNameBrand['name'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo $rowNameBrand['id_brand'] ?>"><?php echo $rowNameBrand['name'] ?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Danh mục</label>
                                    <select name="id_categorychild" id="" class="form-select">
                                        <?php
                                        $getNameCategoryChild = $categoryChildModel->getCategoryChilds();
                                        if ($getNameCategoryChild) {
                                            while ($rowNameCategoryChild = $getNameCategoryChild->fetch_assoc()) {
                                                if ($rowNameCategoryChild['id_categorychild'] == $viewProduct['id_categorychild']) {
                                        ?>
                                                    <option value="<?php echo $rowNameCategoryChild['id_categorychild'] ?>" selected><?php echo $rowNameCategoryChild['name'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo $rowNameCategoryChild['id_categorychild'] ?>"><?php echo $rowNameCategoryChild['name'] ?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Giá</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="price" value="<?php echo $viewProduct['price'] ?>" name="voucherId" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Trạng thái</label>
                                    <?php
                                    if ($viewProduct['status'] == 1) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault1" checked="">
                                            <label class="form-check-label" for="flexRadioDefault1">Đã bán</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">Chưa bán</label>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="1" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">Đã bán</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="0" id="flexRadioDefault2" checked="">
                                            <label class="form-check-label" for="flexRadioDefault2">Chưa bán</label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                        <input type="file" class="form-control" id="fileImageProductInAddWarehouse" onchange="changeAddWarehouseImage()">
                                    </div>
                                    <div class="loading_image">
                                        <img id="imageProductInAddWarehouse" src="" alt="" style="width:200px">
                                        <div class="spinner-border d-none" role="status" id="loadingImage">
                                            <span class="sr-only ">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">

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
                                <div class="col-md-12"></div>
                                <div class="table-responsive mt-2">
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Chọn</th>
                                                <th>SKU</th>
                                                <th>Chọn kích cỡ</th>
                                                <th>Trạng thái</th>
                                                <th>Số lượng</th>
                                                <th>Đã bán</th>
                                                <th>Hình ảnh</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $getConfigurableProduct = $configurableProductModel->getConfigurableProductById($id);
                                        if ($getConfigurableProduct) {
                                            while ($rowCheck = $getConfigurableProduct->fetch_assoc()) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td><?php echo $rowCheck['sku'] ?></td>
                                                        <td><?php echo $rowCheck['option'] ?></td>
                                                        <td>
                                                            <?php
                                                            $getStatus = $configurableProductModel->getConfigurableProductById($rowCheck['id_product']);
                                                            if ($getStatus) {
                                                                $rowStatus = $getStatus->fetch_assoc();
                                                                if ($rowStatus['inventory_status'] == 1) {
                                                            ?>
                                                                    <div class="badge bg-primary">Còn hàng</div>
                                                                <?php

                                                                } else {
                                                                ?>
                                                                    <div class="badge bg-danger">Hết</div>
                                                            <?php
                                                                }
                                                            }
                                                            ?>

                                                        </td>
                                                        <td><?php echo $rowCheck['stock'] ?></td>
                                                        <td><?php echo $rowCheck['quantity_sold'] ?></td>
                                                        <td>abc</td>
                                                    </tr>
                                                </tbody>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </table>
                                </div>

                                <div class="col-md-12">
                                    <div class="col-md-2">
                                        <button class="btn btn-primary">Sửa</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>

<?php
if (isset($_POST['update']) && $_POST['id_product']) {
    $id_product = $_POST['id_product'];
    $name = $_POST['name'];
    $id_brand = $_POST['id_brand'];
    $id_categorychild = $_POST['id_categorychild'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    $productModel = new Product();
    $updateProduct = $productModel->update($id_product, $id_brand, $id_categorychild, $name, $price, $image, $status);
    if ($updateProduct) {
        echo "1";
    } else {
        echo "0";
    }
}
?>