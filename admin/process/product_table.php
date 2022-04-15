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
    $viewProduct = $productModel->getProducts()->fetch_assoc();
    if ($viewProduct) {
?>
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0">Thông tin sản phẩm</h6>
                        <div class="p-4 border rounded">
                            <form class="row g-3 needs-validation" id="updateForm" method="POST" onsubmit="add()">
                                <div class="col-md-5">
                                    <label for="validationCustom01" class="form-label">Mã sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductId" value="<?php echo $viewProduct['id_product'] ?>" name="voucherId" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="validationCustom01" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $viewProduct['name'] ?>" name="voucherId" required>
                                </div>
                                <div class="col-md-5">
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
                                <div class="col-md-5">
                                    <label for="validationCustom01" class="form-label">Giá</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="ProductName" value="<?php echo $viewProduct['price'] ?>" name="voucherId" required>
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
                            </form>
                            <br><br><br>
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
                                    $getConfigurableProduct = $configurableProductModel->getConfigurableProductById($id)->fetch_assoc();
                                    if ($getConfigurableProduct) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td><?php echo $getConfigurableProduct['sku'] ?></td>
                                                <td><?php echo $getConfigurableProduct['option'] ?></td>
                                                <td >
                                                            <?php
                                                            $getStatus = $configurableProductModel->getConfigurableProductById($getConfigurableProduct['id_product']);
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
                                                <td><?php echo $getConfigurableProduct['stock'] ?></td>
                                                <td><?php echo $getConfigurableProduct['quantity_sold'] ?></td>
                                                <td>abc</td>
                                            </tr>
                                        </tbody>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>