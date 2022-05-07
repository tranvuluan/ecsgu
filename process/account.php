<?php
$path = dirname(__FILE__);
require_once $path . '/../class/customer.php';
$path = dirname(__FILE__);
require_once $path . '/../class/orderItem.php';
$path = dirname(__FILE__);
require_once $path . '/../class/order.php';
$path = dirname(__FILE__);
require_once $path . '/../class/product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/brand.php';
$path = dirname(__FILE__);
require_once $path . '/../class/categoryChild.php';
$path = dirname(__FILE__);
require_once $path . '/../class/productSale.php';
$path = dirname(__FILE__);
require_once $path . '/../class/productEvaluate.php';
$path = dirname(__FILE__);
require_once $path . '/../class/configurable_product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/LibClass.php';
$path = dirname(__FILE__);
require_once $path . '/../lib/callAPI.php';
?>

<?php
if (isset($_POST['viewOrderDetail']) && isset($_POST['id_order'])) {
    echo 'chay cho ni';
    $id_order = $_POST['id_order'];
    $customerModel = new Customer();
    $orderModel = new Order();
    $orderItemModel = new OrderItem();
    $order = $orderModel->getOrderById($id_order)->fetch_assoc();
    if ($order) {
?>

        <!-- start modal xem chi tiết hóa đơn -->
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <!-- start table ds sản phâm trong chi tiết hóa đơn -->
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
                                        <th>Actions</th>
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
                                                <td><?php echo 'Choose' ?></td>
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
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Mã hóa đơn</label>
                    <input type="text" class="form-control" id="orderId" value="<?php echo $order['id_order'] ?>" readonly>
                </div>
                <?php
                $productModel = new Product();
                $configurableProductModel = new ConfigurableProduct();
                $configurableProduct = $configurableProductModel->getConfigurableProductBySKU($sku)->fetch_assoc()['id_product'];
                $rowProduct = $productModel->getProductById($configurableProduct)->fetch_assoc();
                ?>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $rowProduct['name'] ?>" readonly>
                </div>
                <?php
                ?>
                <div class="col-md-12">
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
                <div class="col-md-12">
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
                <div class="col-md-12">
                    <label class="form-label">Hình ảnh</label>
                    <img src="<?php echo $rowProduct['image'] ?>" alt="" width="100%">
                </div>
            </div>
            <div class="col-md-4">
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Ngày lập</label>
                    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $order['date'] ?>" readonly>
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
                        <div class="col-md-12">
                            <label for="validationDiscount" class="form-label">Khyến mãi</label>
                            <div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">%</span>
                                <input type="text" class="form-control" name="discount" id="validationDiscount" value="<?php echo $rowProductSale['salepercent'] ?>" readonly>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-md-12">
                            <label for="validationDiscount" class="form-label">Khyến mãi</label>
                            <div class="input-group has-validation"> <span class="input-group-text" id="inputGroupPrepend">%</span>
                                <input type="text" class="form-control" name="discount" id="validationDiscount" value="0" readonly>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Số lượng</label>
                    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $orderItem['quantity'] ?>" readonly>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Tổng tiền (đ)</label>
                    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $orderItem['price'] ?>" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                if ($order['status'] == 2) {
                ?>
                    <div class="col-md-12">
                        <div class="ratting-form-wrapper pl-50">
                            <h5>Add a Review</h5>
                            <div class="ratting-form">
                                <form action="#">
                                    <div class="star-box">
                                        <span>Your rating:</span>
                                        <div class="rate">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="rating-form-style form-submit">
                                        <textarea class="form-control" id="rateProduct" placeholder="Message"></textarea>
                                        <br>
                                        <div class="your-order-area">
                                            <div class="Place-order mt-25" style="margin-top: 0!important;">
                                                <a class="btn-hover" onclick="rateProduct('<?php print $sku ?>')" href="javascript:;">Evaluate</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                } else if ($order['status'] == 1) {
                ?>
                    <div class="col-md-12">
                        <label class="form-label">Tình trạng đơn hàng</label>
                        <p style="font-size: 14px;"><b><i>(Đơn hàng của bạn đã được xử lý)</i></b></p>
                    </div>
                <?php
                } else if ($order['status'] == 0) {
                ?>
                    <div class="col-md-12">
                        <label class="form-label">Lý do hủy đơn hàng</label>
                        <div class="rating-form-style form-submit">
                            <select class="form-select" id="reasonCancel">
                                <option value="" selected>Choose...</option>
                                <option value="Muốn thay đổi địa chỉ giao hàng">Muốn thay đổi địa chỉ giao hàng</option>
                                <option value="Người bán không trả lời thắc mắc / yêu cầu của tôi">Người bán không trả lời thắc mắc / yêu cầu của tôi</option>
                                <option value="Đổi ý không muốn mua nữa / Khác">Đổi ý không muốn mua nữa / Khác</option>
                            </select>
                            <br>
                            <div class="your-order-area">
                                <div class="Place-order mt-25" id="elementButton" style="margin-top: 0!important;">
                                    <a class="btn-hover" onclick="cancelOrder('<?php print $order['id_order'] ?>')" href="javascript:;">Cancel Order</a>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                    ?>
                    </div>
            </div>

    </form>
<?php
}
?>

<?php
if (isset($_POST['viewToUpdate']) && isset($_POST['id_customer'])) {
    $customer = new Customer();
    $id_customer = $_POST['id_customer'];
    $showCustomer = $customer->getCustomerByIdCustomer($id_customer)->fetch_assoc();
?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <div class="card-body">
                    <h3>Account details </h3>
                    <div class="p-4 border rounded">
                        <form class="row g-3" action="#" method="POST" onsubmit="update()">
                            <div class="col-md-3 default-form-box mb-20">
                                <label class="form-label ">ID Customer</label>
                                <input class="form-control" type="text" name="id_customer" value="<?php echo $showCustomer['id_customer'] ?>" readonly>
                            </div>
                            <div class="col-md-3 default-form-box mb-20">
                                <label class="form-label ">ID Account</label>
                                <input class="form-control" type="text" name="id_account" value="<?php echo $showCustomer['id_account'] ?>" readonly>
                            </div>
                            <div class="col-md-3 default-form-box mb-20">
                                <label class="form-label ">Created date</label>
                                <input class="form-control" type="text" name="create-date" value="<?php echo $showCustomer['createdate'] ?>" readonly>
                            </div>
                            <div class="col-md-3 default-form-box mb-20">
                                <label class="form-label ">Point</label>
                                <input class="form-control" type="text" name="point" value="<?php echo $showCustomer['point'] ?>" readonly>
                            </div>
                            <div class="col-md-6 default-form-box mb-20">
                                <label class="form-label ">Full Name</label>
                                <input class="form-control" type="text" name="full-name" value="<?php echo $showCustomer['fullname'] ?>" require>
                            </div>
                            <div class="col-md-6 default-form-box mb-20">
                                <label class="form-label ">Address</label>
                                <input class="form-control" type="text" name="address" value="<?php echo $showCustomer['address'] ?>" require>
                            </div>
                            <div class="col-md-6 default-form-box mb-20">
                                <label class="form-label ">Email</label>
                                <input class="form-control" type="text" name="email" value="<?php echo $showCustomer['email'] ?>" require>
                            </div>
                            <div class="col-md-6 default-form-box mb-20">
                                <label class="form-label ">Phone</label>
                                <input class="form-control" type="text" name="phone" value="<?php echo $showCustomer['phone'] ?>" require>
                            </div>
                            <div class="save_button mt-3">
                                <button class="btn btn-primary" type="submit">Save</button>
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
if (isset($_POST['update']) && isset($_POST['id_customer'])) {
    $id_customer = $_POST['id_customer'];
    $id_acccount = $_POST['id_account'];
    $createDate = $_POST['createDate'];
    $point = $_POST['point'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $customer = new Customer();
    $result = $customer->update($id_customer, $id_acccount, $name, $email, $address, $phone, $createDate, $point);
    if ($result) {
        echo 1;
    } else
        echo 0;
}
?>


<?php
if (isset($_POST['cancelOrder']) && isset($_POST['id_order'])) {
    $id_order = $_POST['id_order'];
    $reason = $_POST['reason'];
    $status = -1;
    $orderModel = new Order();
    $result = $orderModel->setReasonCancel($id_order, $reason, $status);
    $flag = 1;
    if (!$result){
        $flag = 0;
    }

    if ($flag == 0) {
        echo 0;
        return;
    }
    ////////////////////////////////
    $items_send = [];
    $LibClass = new LibClass();
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
        "reason" =>  $reason

    );

    $make_call = callAPI('POST', 'http://14.225.192.186:5555/api/order/cancel', json_encode($data_array));
    $response = json_decode($make_call, true);
    if ($response['message'] != 'Successfully') {
        $flag = -1;
        
    }
    if ($flag == -1) {
        echo $flag;
        return;
    }
    echo $flag;
    

}
?>

<?php
if (isset($_POST['rate']) && isset($_POST['sku'])) {

    $sku = $_POST['sku'];
    $evaluate = $_POST['rateProduct'];
    $rating = $_POST['star'];
    $flag = 1;
    $configurableProductModel = new ConfigurableProduct();
    $configurableProduct = $configurableProductModel->getConfigurableProductBySKU($sku)->fetch_assoc();
    $orderItemModel = new OrderItem();
    $orderItem = $orderItemModel->getOrderItemBySKU($sku)->fetch_assoc();
    $orderModel = new Order();
    $order = $orderModel->getOrderById($orderItem['id_order'])->fetch_assoc();
    $productModel = new Product();
    $product = $productModel->getProductById($configurableProduct['id_product'])->fetch_assoc();

    $id_product = $product['id_product'];
    $id_customer = $order['id_customer'];

    $productEvaluateModel = new ProductEvaluate();
    $insertEvaluateProduct = $productEvaluateModel->insertEvaluate($id_product, $id_customer, $rating, $evaluate);
   
   
    if (!$insertEvaluateProduct) {
        $flag = 0;
    }

    echo $flag;
}
?>