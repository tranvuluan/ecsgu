<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/order.php';
require_once $path . '/../class/orderItem.php';
require_once $path . '/../class/customer.php';
require_once $path . '/../class/product.php';
require_once $path . '/../class/configurable_product.php';
require_once $path . '/../class/brand.php';
require_once $path . '/../class/categoryChild.php';
require_once $path . '/../class/productSale.php';
?>

<?php
if (isset($_POST['view']) && isset($_POST['id'])) {
    $id_order = $_POST['id'];
    $customerModel = new Customer();
    $orderModel = new Order();
    $orderItemModel = new OrderItem();
    $order = $orderModel->getOrderById($id_order)->fetch_assoc();
    if ($order) {
?>
        <!-- start modal xem chi tiết hóa đơn -->
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="row">
                    <!-- start view chi tiết hóa đơn -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0">Thông tin khách hàng</h6>
                                <div class="p-4 border rounded">
                                    <form class="row g-3 needs-validation" novalidate>
                                        <?php
                                        $getDetailCustomer = $customerModel->getCustomerByIdCustomer($order['id_customer'])->fetch_assoc();
                                        if ($getDetailCustomer) {
                                        ?>
                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Mã khách hàng</label>
                                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $getDetailCustomer['id_customer'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom02" class="form-label">Tên khách hàng</label>
                                                <input type="text" class="form-control" id="validationCustom02" name="customerName" value="<?php echo $getDetailCustomer['fullname'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                                <input type="text" class="form-control" id="validationCustom03" name="phone" value="<?php echo $getDetailCustomer['phone'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Ngày tạo</label>
                                                <input type="text" class="form-control datepicker" name="createDate" value="<?php echo $getDetailCustomer['createdate'] ?>" readonly />
                                            </div>
                                            <div class="col-md-12">
                                                <label for="validationCustom04" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="validationCustom03" name="email" value="<?php echo $getDetailCustomer['email'] ?>" readonly>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="validationCustom04" class="form-label">Địa chỉ</label>
                                                <input type="text" class="form-control" id="validationCustom03" name="address" value="<?php echo $getDetailCustomer['address'] ?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom04" class="form-label">Điểm</label>
                                                <input type="text" class="form-control" id="validationCustom03" name="point" value="<?php echo $getDetailCustomer['point'] ?>" readonly>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- start view chi tiết hóa đơn -->

                    <!-- start table ds sản phâm trong chi tiết hóa đơn -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0">Chi tiết hóa đơn</h6>
                                <div class="p-4 border rounded" id="viewOrderItem">

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <label for="validationCustom01" class="form-label">Danh sách sản phẩm trong hóa đơn</label>
                                <div class="p-4 border rounded">
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>SKU</th>
                                                <th>Tên SP</th>
                                                <th>Số lượng</th>
                                                <th>Giá tiền(đ)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $listOrderItem = $orderItemModel->getOrderItemById($id_order);
                                            $productModel = new Product();
                                            $configurableProductModel = new ConfigurableProduct();
                                            if ($listOrderItem) {
                                                while ($rowOrderItem = $listOrderItem->fetch_assoc()) {
                                            ?>
                                                    <tr onclick="getDetailOrderItem('<?php print $rowOrderItem['sku'] ?>')">
                                                        <td><?php echo $rowOrderItem['sku'] ?></td>
                                                        <?php
                                                        $configurableProduct = $configurableProductModel->getConfigurableProductBySKU($rowOrderItem['sku'])->fetch_assoc()['id_product'];
                                                        $nameProduct = $productModel->getProductById($configurableProduct)->fetch_assoc();
                                                        ?>
                                                        <td><?php echo $nameProduct['name'] ?></td>
                                                        <?php
                                                        ?>
                                                        <td><?php echo $rowOrderItem['quantity'] ?></td>
                                                        <td><?php echo $rowOrderItem['price'] ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- start modal xem chi tiết hóa đơn -->
<?php
    }
}
?>

<?php
if (isset($_POST['viewOrderItem']) && isset($_POST['id'])) {
    $sku = $_POST['id'];
    $orderItemModel = new OrderItem();
    $orderModel = new Order();
    $orderItem = $orderItemModel->getOrderItemBySKU($sku)->fetch_assoc();
    $order = $orderModel->getOrderById($orderItem['id_order'])->fetch_assoc();
?>
    <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-6">
            <label for="validationCustom01" class="form-label">Mã hóa đơn</label>
            <input type="text" class="form-control" id="validationCustom01" value="<?php echo $order['id_order'] ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="validationCustom02" class="form-label">Ngày lập</label>
            <input type="text" class="form-control" id="validationCustom02" value="<?php echo $order['date'] ?>" readonly>
        </div>
        <?php
        $productModel = new Product();
        $configurableProductModel = new ConfigurableProduct();
        $configurableProduct = $configurableProductModel->getConfigurableProductBySKU($sku)->fetch_assoc()['id_product'];
        $rowProduct = $productModel->getProductById($configurableProduct)->fetch_assoc();
        ?>
        <div class="col-md-6">
            <label for="validationCustom02" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="validationCustom02" value="<?php echo $rowProduct['name'] ?>" readonly>
        </div>
        <?php
        ?>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Thương hiệu</label>
            <?php
            $productModel = new Product();
            $configurableProductModel = new ConfigurableProduct();
            $configurableProduct = $configurableProductModel->getConfigurableProductBySKU($sku)->fetch_assoc()['id_product'];
            $rowProduct = $productModel->getProductById($configurableProduct)->fetch_assoc();
            $brandModel = new Brand();
            $getNameBrand = $brandModel->getBrandById($rowProduct['id_brand'])->fetch_assoc();
            ?>
            <input type="text" class="form-control" id="validationCustom01" value="<?php echo $getNameBrand['name'] ?>" readonly>
            <?php
            ?>

        </div>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Danh mục</label>
            <?php
            $productModel = new Product();
            $configurableProductModel = new ConfigurableProduct();
            $configurableProduct = $configurableProductModel->getConfigurableProductBySKU($sku)->fetch_assoc()['id_product'];
            $rowProduct = $productModel->getProductById($configurableProduct)->fetch_assoc();
            $categoryChildModel = new CategoryChild();
            $getNameCategoryChild = $categoryChildModel->getCategoryChildByIds($rowProduct['id_categorychild'])->fetch_assoc();
            ?>
            <input type="text" class="form-control" id="validationCustom01" value="<?php echo $getNameCategoryChild['name'] ?>" readonly>
            <?php
            ?>
        </div>
        <div class="col-md-6">
            <label for="validationCustom02" class="form-label">Số lượng</label>
            <input type="text" class="form-control" id="validationCustom02" value="<?php echo $orderItem['quantity'] ?>" readonly>
        </div>
        <?php
        $productModel = new Product();
        $configurableProductModel = new ConfigurableProduct();
        $configurableProduct = $configurableProductModel->getConfigurableProductBySKU($sku)->fetch_assoc()['id_product'];
        $rowProduct = $productModel->getProductById($configurableProduct)->fetch_assoc();
        $productSaleModel = new ProductSale();
        $getProductSale = $productSaleModel->getProductSaleByProductId($rowProduct['id_product'])->fetch_assoc();
        ?>
        <div class="col-md-6">
            <label for="validationDiscount" class="form-label">Khyến mãi</label>
            <div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">%</span>
                <input type="text" class="form-control" name="discount" id="validationDiscount" value="<?php echo $getProductSale['salepercent'] ?>" readonly>
            </div>
        </div>
        <?php
        ?>
        <div class="col-md-6">
            <label for="validationCustom02" class="form-label">Tổng tiền (đ)</label>
            <input type="text" class="form-control" id="validationCustom02" value="<?php echo $orderItem['price'] ?>" readonly>
        </div>
        <div class="col-md-12"></div>
        <div class="row">
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <button class="btn btn-primary">Xử lý</button>
            </div>
        </div>
    </form>
<?php
}
?>