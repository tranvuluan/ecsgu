<?php
$path = dirname(__FILE__);
require_once $path . '/../class/customer.php';
$path = dirname(__FILE__);
require_once $path . '/../class/orderItem.php';
$path = dirname(__FILE__);
require_once $path . '/../class/product.php';
$path = dirname(__FILE__);
require_once $path . '/../class/configurable_product.php';
?>

<?php
if (isset($_POST['viewOrderDetail']) && isset($_POST['id_order'])) {
    echo 'chay cho ni';
    $id_order = $_POST['id_order'];
?>

    <div class="modal-dialog" role="document" id="modalOrder">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Orders</h4>
                <div class="table_page table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID Order</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <?php
                        $OrderItem = new OrderItem();
                        $orderList = $OrderItem->getOrderItems();
                        if ($orderList) {
                            while ($row = $orderList->fetch_assoc()) {
                                if ($row['id_order'] == $id_order) {
                        ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['id_order'] ?></td>
                                            <?php
                                            $configurableProductModel = new ConfigurableProduct();
                                            $configurableproduct = $configurableProductModel->getConfigurableProductBySKU($row['sku'])->fetch_assoc()['id_product'];
                                            $productModel = new Product();
                                            $product = $productModel->getProductById($configurableproduct)->fetch_assoc();
                                            ?>
                                            <td><?php echo $product['name'] ?></td>
                                            <?php
                                            ?>
                                            <td><?php echo $row['quantity'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><a style="color: black" onclick="viewDetailOrderProduct('<?php print $row['sku'] ?>')" href="javascript:;">
                                                    <ion-icon name="search-outline" size="large "></ion-icon>
                                                </a></td>
                                        </tr>
                                    </tbody>
                        <?php
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


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
if (isset($_POST['viewDetailOrderProduct']) && isset($_POST['sku'])) {
    $sku = $_POST['sku'];
    $configurableProductModel = new ConfigurableProduct();
    $configurableproduct = $configurableProductModel->getConfigurableProductBySKU($sku)->fetch_assoc();
    $OrderItemModel = new OrderItem();
    $orderItem = $OrderItemModel->getOrderItemBySKU($sku)->fetch_assoc();
    $productModel = new Product();
    $product = $productModel->getProductById($configurableproduct['id_product'])->fetch_assoc();
?>
    <div class="modal-dialog" role="document" id="modalOrder" style="max-width:540px!important">
        <div class="modal-content modal-dialog-centered">
            <div class="modal-body">
                <h3>Product Details </h3>
                <hr style="height:5px; color:#fb5d5d">
                <div class="row" style="text-align: center;">
                    <div class="col-md-12">
                        <h6 for="">Product Name: <?php echo $product['name'] ?></h6>
                        <br>
                    </div>
                    <div class="col-md-12">
                        <img src="<?php echo $product['image'] ?>" width="70%" alt="">

                    </div>
                    <div class="col-md-12">
                        <br>
                        <h6 for="">Size: <?php echo $configurableproduct['option'] ?></h6>
                    </div>
                    <div class="col-md-12">
                        <h6 for="">Quantity: <?php echo $orderItem['quantity'] ?></h6>
                    </div>
                    <div class="col-md-12">
                        <h6 for="">Price: <?php echo $orderItem['price'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

<?php
if (isset($_POST['rateOrderDetail']) && isset($_POST['id_order'])) {
    echo 'chay cho ni';
    $id_order = $_POST['id_order'];
?>

    <div class="modal-dialog" role="document" id="modalOrder">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Orders</h4>
                <div class="table_page table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID Order</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <?php
                        $OrderItem = new OrderItem();
                        $orderList = $OrderItem->getOrderItems();
                        if ($orderList) {
                            while ($row = $orderList->fetch_assoc()) {
                                if ($row['id_order'] == $id_order) {
                        ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['id_order'] ?></td>
                                            <?php
                                            $configurableProductModel = new ConfigurableProduct();
                                            $configurableproduct = $configurableProductModel->getConfigurableProductBySKU($row['sku'])->fetch_assoc()['id_product'];
                                            $productModel = new Product();
                                            $product = $productModel->getProductById($configurableproduct)->fetch_assoc();
                                            ?>
                                            <td><?php echo $product['name'] ?></td>
                                            <?php
                                            ?>
                                            <td><?php echo $row['quantity'] ?></td>
                                            <td><?php echo $row['price'] ?></td>
                                            <td><a onclick="rateDetailOrderProduct('<?php print $row['sku'] ?>')" href="javascript:;">
                                                    <span>Rate</span>
                                                </a></td>
                                        </tr>
                                    </tbody>
                        <?php
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php
}

?>

<?php
if (isset($_POST['rateDetailOrderProduct']) && isset($_POST['sku'])) {
    $sku = $_POST['sku'];
    $configurableProductModel = new ConfigurableProduct();
    $configurableproduct = $configurableProductModel->getConfigurableProductBySKU($sku)->fetch_assoc();
    $OrderItemModel = new OrderItem();
    $orderItem = $OrderItemModel->getOrderItemBySKU($sku)->fetch_assoc();
    $productModel = new Product();
    $product = $productModel->getProductById($configurableproduct['id_product'])->fetch_assoc();
?>
    <div class="modal-dialog" role="document" id="modalOrder" style="max-width:600px!important">
        <div class="modal-content">
            <div class="modal-body">
                <h3>Product Details </h3>
                <hr style="height:5px; color:#fb5d5d">
                <div class="row">
                    <div class="col-md-6">
                        <h6 for="">Product Name: <?php echo $product['name'] ?></h6>
                        <br>
                        <img src="<?php echo $product['image'] ?>" width="100%" alt="">
                        <br><br>
                    </div>
                    <div class="col-md-6">
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
                                    <br>
                                    <div class="rating-form-style form-submit">
                                        <textarea class="form-control" name="Your Review" placeholder="Message"></textarea>
                                        <br>
                                        <button class="btn btn-primary btn-hover-color-primary " type="submit" value="Submit">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php
}
?>