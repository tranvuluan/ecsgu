<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/product.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/productSale.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/categoryChild.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/brand.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/configurable_product.php';
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
                            <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="activeSellProduct()">
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Mã sản phẩm</label>
                                    <input type="text" class="form-control" id="id_product" name="ProductId" value="<?php echo $viewProduct['id_product'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $viewProduct['name'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Danh mục</label>
                                    <select name="id_categorychild" id="" class="form-select">
                                        <?php
                                        $getNameCategoryChild = $categoryChildModel->getCategoryChilds();
                                        if ($getNameCategoryChild) {
                                            while ($viewRowCategoryChild = $getNameCategoryChild->fetch_assoc()) {
                                                if ($viewProduct['id_categorychild'] == $viewRowCategoryChild['id_categorychild']) {
                                        ?>
                                                    <option value="<?php echo $viewRowCategoryChild['id_categorychild'] ?>" selected><?php echo $viewRowCategoryChild['name'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo $viewRowCategoryChild['id_categorychild'] ?>"><?php echo $viewRowCategoryChild['name'] ?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Giá bán (đ)</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="Price" value="<?php echo $viewProduct['price'] ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Thương hiệu</label>
                                    <select name="id_brand" id="" class="form-select">
                                        <?php
                                        $getNameBrand = $brandModel->getBrands();
                                        if ($getNameBrand) {
                                            while ($viewRowBrand = $getNameBrand->fetch_assoc()) {
                                                if ($viewProduct['id_brand'] == $viewRowBrand['id_brand']) {
                                        ?>
                                                    <option value="<?php echo $viewRowBrand['id_brand'] ?>" selected><?php echo $viewRowBrand['name'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo $viewRowBrand['id_brand'] ?>"><?php echo $viewRowBrand['name'] ?></option>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
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
                                                <th>SKU</th>
                                                <th>Chọn kích cỡ</th>
                                                <th>Trạng thái</th>
                                                <th>Số lượng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $getConfigurableProduct = $configurableProductModel->getConfigurableProductById($id);
                                            if ($getConfigurableProduct) {
                                                while ($rowCheck = $getConfigurableProduct->fetch_assoc()) {
                                            ?>

                                                    <tr>
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
                                                    </tr>

                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
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
if (isset($_POST['viewToUpdate']) && $_POST['id']) {
    $id = $_POST['id'];
    $productModel = new Product();
    $productSaleModel = new ProductSale();
    $categoryChildModel = new CategoryChild();
    $brandModel = new Brand();
    $configurableProductModel = new ConfigurableProduct();
    $viewProduct = $productModel->getProductById($id)->fetch_assoc();
    $viewProductSale = $productSaleModel->getProductSales();

    if (!$productSaleModel->getProductSaleByProductId($viewProduct['id_product'])) {
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
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductId" value="<?php echo $viewProduct['id_product'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $viewProduct['name'] ?>" name="voucherId">
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
                                    <label for="validationCustom01" class="form-label">Giá bán (đ)</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="price" value="<?php echo $viewProduct['price'] ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Trạng thái</label>
                                    <?php
                                    if ($viewProduct['status'] == 1) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="status" value="1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">Mở bán</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="status" value="2">
                                            <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                                        </div>
                                    <?php
                                    } else if ($viewProduct['status'] == 2) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="status" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">Mở bán</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="status" value="2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="checkVoucher()" id="CheckVoucher">
                                        <label class="form-check-label" for="CheckVoucher">Khuyến mãi</label>
                                    </div>
                                    <div id="voucher" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="validationCustomUsername" class="form-label">Discount percent</label>
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend">%</span>
                                                    <input type="text" class="form-control" id="validationDiscount" name="Discount">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Start Date</label>
                                                <input type="date" class="form-control" name="StartDate" value="">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">End Date</label>
                                                <input type="date" class="form-control" name="EndDate" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                        <input type="file" class="form-control" id="fileImageProductInAddWarehouse" onchange="changeProductImage()">
                                    </div>
                                </div>
 
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Hình ảnh</label>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="spinner-border d-none" id="loadingImage" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <div class="product-box border" style="width:10%">
                                            <img id="imageProduct" src="<?php echo $viewProduct['image'] ?>" alt="">
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
                                                <th>SKU</th>
                                                <th>Chọn kích cỡ</th>
                                                <th>Trạng thái</th>
                                                <th>Số lượng</th>
                                                <th>Đã bán</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $getConfigurableProduct = $configurableProductModel->getConfigurableProductById($id);
                                        if ($getConfigurableProduct) {
                                            while ($rowCheck = $getConfigurableProduct->fetch_assoc()) {
                                        ?>
                                                <tbody>
                                                    <tr>
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
    } else {
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
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductId" value="<?php echo $viewProduct['id_product'] ?>" readonly>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $viewProduct['name'] ?>" name="voucherId">
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
                                    <label for="validationCustom01" class="form-label">Giá bán (đ)</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="price" value="<?php echo $viewProduct['price'] ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Trạng thái</label>
                                    <?php
                                    if ($viewProduct['status'] == 1) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="status" value="1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">Mở bán</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="status" value="2">
                                            <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                                        </div>
                                    <?php
                                    } else if ($viewProduct['status'] == 2) {
                                    ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault1" name="status" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">Mở bán</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="flexRadioDefault2" name="status" value="2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">Khóa</label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="checkVoucher()" id="CheckVoucher" checked>
                                        <label class="form-check-label" for="CheckVoucher">Khuyến mãi</label>
                                    </div>
                                    <?php
                                    $viewRowProductSale = $productSaleModel->getProductSaleByProductId($viewProduct['id_product'])->fetch_assoc();
                                    if ($viewRowProductSale) {
                                    ?>
                                        <div id="voucher">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="validationCustomUsername" class="form-label">Discount percent</label>
                                                    <div class="input-group has-validation">
                                                        <span class="input-group-text" id="inputGroupPrepend">%</span>
                                                        <input type="text" class="form-control" id="validationDiscount" name="Discount" value="<?php echo $viewRowProductSale['salepercent'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">Start date</label>
                                                    <input type="date" class="form-control" name="StartDate" value="<?php echo $viewRowProductSale['startdate'] ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="form-label">End date</label>
                                                    <input type="date" class="form-control" name="EndDate" value="<?php echo $viewRowProductSale['enddate'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationCustom01" class="form-label">Hình ảnh</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                        <input type="file" class="form-control" id="fileImageProductInAddWarehouse" onchange="changeProductImage()">
                                    </div>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="spinner-border d-none" id="loadingImage" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <div class="product-box border" style="width:10%">
                                            <img id="imageProduct" src="<?php echo $viewProduct['image'] ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <div class="col-md-12"></div>
                                <br>
                                <div class="table-responsive mt-2">
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>SKU</th>
                                                <th>Chọn kích cỡ</th>
                                                <th>Trạng thái</th>
                                                <th>Số lượng</th>
                                                <th>Đã bán</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $getConfigurableProduct = $configurableProductModel->getConfigurableProductById($id);
                                        if ($getConfigurableProduct) {
                                            while ($rowCheck = $getConfigurableProduct->fetch_assoc()) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $rowCheck['sku'] ?></td>
                                                        <td><?php echo $rowCheck['option'] ?></td>
                                                        <td>
                                                            <?php
                                                            $getStatus = $configurableProductModel->getConfigurableProductById($rowCheck['id_product']);
                                                            if ($getStatus) {
                                                                $rowStatus = $getStatus->fetch_assoc();
                                                                if ($rowStatus['inventory_status'] == 'available') {
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
if (isset($_POST['activeSellProduct']) && $_POST['id_product']) {
    $id_product = $_POST['id_product'];
    $price = $_POST['sell_price'];
    $id_categorychild = $_POST['id_categorychild'];
    $id_brand = $_POST['id_brand'];
    $productModel = new Product();
    $activeSellProduct = $productModel->activeSellProduct($id_product, $price, $id_categorychild, $id_brand);
    if ($activeSellProduct) {
        echo "1";
    } else {
        echo "0";
    }
}
?>

<?php
if (isset($_POST['update'])) {
    $id_product = $_POST['id_product'];
    $id_brand = $_POST['id_brand'];
    $id_categorychild = $_POST['id_categorychild'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $status = $_POST['status'];

    $salepercent = $_POST['salepercent'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

    
    $productModel = new Product();
    $productSaleModel = new ProductSale();
    $updateProduct = $productModel->update($id_product, $id_brand, $id_categorychild, $name, $price, $image, $status);
    if ($updateProduct) {
        if ($salepercent == "" || $startdate == "" || $enddate == "") {
            $deleteProductSale = $productSaleModel->delete($id_product);
            echo "5";
        } else {
            $showProductSale = $productSaleModel->getProductSales();
            if ($showProductSale) {
                while ($rowProductSale = $showProductSale->fetch_assoc()) {
                    if ($rowProductSale['id_product'] == $id_product) {
                        $updateProductSale = $productSaleModel->update($id_product, $salepercent, $startdate, $enddate);
                        echo "4";
                    } else {
                        $insertProductSale = $productSaleModel->insert($id_product, $salepercent, $startdate, $enddate);
                        echo "3";
                    }
                }
            } else {
                $insertProductSale = $productSaleModel->insert($id_product, $salepercent, $startdate, $enddate);
                echo "2";
            }
            echo "1";
        }
        echo "1";
    } else {
        echo "0";
    }
}

?>