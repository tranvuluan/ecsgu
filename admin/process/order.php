<?php
$path = dirname(__FILE__);
require_once $path . '/../../class/order.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/orderItem.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/customer.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/product.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/configurable_product.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/brand.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/categoryChild.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/productSale.php';
$path = dirname(__FILE__);
require_once $path . '/../../class/LibClass.php';
$path = dirname(__FILE__);
require_once $path . '/../../lib/callAPI.php';
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
                        <div class="row">
                            <div class="col-md-1"></div>
                            <?php
                            if ($order['status'] == 0) {
                            ?>
                                <div class="col-md-3" id="elementButton">
                                    <button onclick="orderProcess('<?php print $order['id_order'] ?>')" class="btn btn-primary">Xử lý</button>
                                </div>
                                <div class="col-md-8">
                                    <button class="btn btn-danger" onclick="cancelOrder('<?php print $order['id_order'] ?>')">Hủy đơn hàng</button>
                                    <div class="col-md-12" id="OrderRemove">
                                        <br>
                                        <label for="">Lý do hủy</label>
                                        <input type="text" class="form-control" value="" id="txtReason">
                                    </div>
                                </div>

                            <?php
                            } else if ($order['status'] == 1) {
                            ?>
                                <div class="col-md-3" id="elementButton">
                                    <button onclick="orderComplete('<?php print $order['id_order'] ?>')" class="btn btn-primary">Hoàn tất</button>
                                </div>
                                <div class="col-md-8">
                                    <button class="btn btn-danger" onclick="cancelOrder('<?php print $order['id_order'] ?>')">Hủy đơn hàng</button>
                                    <div class="col-md-12" id="OrderRemove">
                                        <br>
                                        <label for="">Lý do hủy</label>
                                        <input type="text" class="form-control" value="Đơn hàng bị hoàn trả" id="txtReason">
                                    </div>
                                </div>
                            <?php
                            } else if ($order['status'] == -1) {
                            ?>
                                <div class="col-md-1"></div>
                                <div class="col-md-8" id="OrderRemove">
                                    <br>
                                    <label for="">Lý do hủy</label>
                                    <input type="text" class="form-control" value="<?php echo $order['reason'] ?>" id="txtReason">
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <br>
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
            <input type="text" class="form-control" id="orderId" value="<?php echo $order['id_order'] ?>" readonly>
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
        if ($rowProduct) {
            $productSaleModel = new ProductSale();
            $getProductSale = $productSaleModel->getProductSaleByProductId($rowProduct['id_product']);
            if ($getProductSale) {
                $rowProductSale = $getProductSale->fetch_assoc();
        ?>
                <div class="col-md-6">
                    <label for="validationDiscount" class="form-label">Khyến mãi</label>
                    <div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">%</span>
                        <input type="text" class="form-control" name="discount" id="validationDiscount" value="<?php echo $rowProductSale['salepercent'] ?>" readonly>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="col-md-6">
                    <label for="validationDiscount" class="form-label">Khyến mãi</label>
                    <div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">%</span>
                        <input type="text" class="form-control" name="discount" id="validationDiscount" value="0" readonly>
                    </div>
                </div>
        <?php
            }
        }
        ?>
        <div class="col-md-6">
            <label for="validationCustom02" class="form-label">Tổng tiền (đ)</label>
            <input type="text" class="form-control" id="validationCustom02" value="<?php echo $orderItem['price'] ?>" readonly>
        </div>
    </form>
<?php
}
?>

<?php
if (isset($_POST['process']) && $_POST['id_order']) {
    $LibClass = new LibClass();
    $orderModel = new Order();
    $configurableProductModel = new ConfigurableProduct();
    $OrderItemModel = new OrderItem();
    $getListOrderItem = $OrderItemModel->getOrderItemById($_POST['id_order']);
    $flag = 1;
    while ($row = $getListOrderItem->fetch_assoc()) {
        $sku = $row['sku'];
        $checkStock = $configurableProductModel->checkStock($sku, $row['quantity']);
        if (!$checkStock) {
            $flag = 0;
            break;
        }
    }
    if ($flag != 1) {
        echo $flag;
        return;
    }
    $getListOrderItem = $OrderItemModel->getOrderItemById($_POST['id_order']);
    while ($row = $getListOrderItem->fetch_assoc()) {
        $sku = $row['sku'];
        $decStock = $configurableProductModel->decStock($sku, $row['quantity']);
        if (!$checkStock) {
            $flag = 0;
            break;
        }
    }
    if ($flag != 1) {
        echo $flag;
        return;
    }
    $status = 1;
    $items_send = [];

    // check stock;


    $changeStatus = $orderModel->changeStatus($_POST['id_order'], $status);
    if (!$changeStatus)
        $flag = 0;
    $getAllInfoOrder = $LibClass->getFullInfoOrder($_POST['id_order']);
    $fullOrder = $getAllInfoOrder->fetch_assoc();
    $fullnameCustomer = $fullOrder['fullname'];
    $emailCustomer = $fullOrder['email'];
    $phoneCustomer = $fullOrder['phone'];
    $addressCustomer = $fullOrder['address'];
    $totalprice = $fullOrder['totalprice'];
    $item['name'] = $fullOrder['name'];
    $item['quantity'] = $fullOrder['quantity'];
    $item['price'] = $fullOrder['price'];
    array_push($items_send, $item);
    while ($value = $getAllInfoOrder->fetch_assoc()) {
        $item['name'] = $value['name'];
        $item['quantity'] = $value['quantity'];
        $item['price'] = $value['price'];
        array_push($items_send, $item);
    }
    $data_array =  array(
        "customer"        => array(
            "fullname" => $fullnameCustomer,
            "email"    => $emailCustomer,
            "phone"    => $phoneCustomer,
            "address"  => $addressCustomer,
        ),
        "order"           => array(
            "order_id" => $_POST['id_order'],
            "total"    => $totalprice,
            "items" => json_encode($items_send)
        ),

    );
    $make_call = callAPI('POST', 'http://14.225.192.186:5555/api/order/delivering', json_encode($data_array));
    $response = json_decode($make_call, true);
    if ($response['message'] != 'Successfully') {
        $flag = -1;
    }
    echo $flag;
}
?>

<?php
if (isset($_POST['complete']) && isset($_POST['id_order'])) {
    $items_send = [];
    $orderModel = new Order();
    $LibClass = new LibClass();
    $OrderItemModel = new OrderItem();
    $configurableProductModel  = new ConfigurableProduct();
    $flag = 1;
    $getListOrderItem = $OrderItemModel->getOrderItemById($_POST['id_order']);
    $changeStatus = $orderModel->changeStatus($_POST['id_order'], 2);
    if (!$changeStatus) {
        $flag = 0;
        echo $flag;
        return;
    }

    // increase quantity sold
    while ($row = $getListOrderItem->fetch_assoc()) {
        $sku = $row['sku'];
        $increaseQuantitySold = $configurableProductModel->incQuantitySold($sku, $row['quantity']);
        if (!$increaseQuantitySold) {
            $flag = 0;
            break;
        }
    }

    if ($flag == 0) {
        echo $flag;
        return;
    }

    $getAllInfoOrder = $LibClass->getFullInfoOrder($_POST['id_order']);
    $fullOrder = $getAllInfoOrder->fetch_assoc();
    $fullnameCustomer = $fullOrder['fullname'];
    $emailCustomer = $fullOrder['email'];
    $phoneCustomer = $fullOrder['phone'];
    $addressCustomer = $fullOrder['address'];
    $totalprice = $fullOrder['totalprice'];
    $item['name'] = $fullOrder['name'];
    $item['quantity'] = $fullOrder['quantity'];
    $item['price'] = $fullOrder['price'];
    array_push($items_send, $item);
    while ($value = $getAllInfoOrder->fetch_assoc()) {
        $item['name'] = $value['name'];
        $item['quantity'] = $value['quantity'];
        $item['price'] = $value['price'];
        array_push($items_send, $item);
    }
    $data_array =  array(
        "customer"        => array(
            "fullname" => $fullnameCustomer,
            "email"    => $emailCustomer,
            "phone"    => $phoneCustomer,
            "address"  => $addressCustomer,
        ),
        "order"           => array(
            "order_id" => $_POST['id_order'],
            "total"    => $totalprice,
            "items" => json_encode($items_send)
        ),

    );
    $make_call = callAPI('POST', 'http://14.225.192.186:5555/api/order/completed', json_encode($data_array));
    $response = json_decode($make_call, true);
    if ($response['message'] != 'Successfully') {
        $flag = -1;
    }
    echo $flag;
}
?>

<?php
if (isset($_POST['cancelOrder']) && isset($_POST['id'])) {
    $orderModel = new Order();
    $id_order = $_POST['id'];
    $reason = $_POST['reason'];
    $status = '-1';
    $cancelOrder = $orderModel->setReasonCancel($id_order, $reason, $status);
    if ($cancelOrder) {
        echo 1;
    } else {
        echo 0;
    }
}
?>