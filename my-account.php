<?php
$path = dirname(__FILE__);
require_once $path . '/class/order.php';
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php
    $path = dirname(__FILE__);
    require_once $path . '/includes/headerhtml.php';
    
    ?>
    
</head>

<body>
    <?php
    $orderTable = new Order();
    ?>
    <!--Top bar, Header Area Start -->
    <?php require_once($path . '/includes/header.php') ?>
    <!--Top bar, Header Area End -->
    <div class="offcanvas-overlay"></div>

    <!-- OffCanvas Wishlist Start -->
    <?php require_once($path . '/includes/offcanvasWishlist.php') ?>
    <!-- OffCanvas Wishlist End -->
    <!-- OffCanvas Cart Start -->
    <?php require_once($path . '/includes/offcanvasCart.php') ?>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <?php require_once($path . '/includes/offcanvasMenu.php') ?>
    <!-- OffCanvas Menu End -->


    <!-- account area start -->
    <div class="account-dashboard pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                            <li><a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>
                            <li><a href="#downloads" data-bs-toggle="tab" class="nav-link">Downloads</a></li>
                            <li><a href="#address" data-bs-toggle="tab" class="nav-link">Addresses</a></li>
                            <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a>
                            </li>
                            <!-- <li><button type="button" onclick="viewAccount()" class="nav-link">Account details</button></li> -->

                            <li><a href="login.html" class="nav-link">logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h4>Dashboard </h4>
                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
                                    orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">Edit your password and account details.</a></p>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h4>Orders</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID Order</th>
                                            <th>ID Customer</th>
                                            <th>ID Voucher</th>
                                            <th>ID Employee</th>
                                            <th>Total Price</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $orderList = $orderTable->getOrders();
                                    if ($orderList) {
                                        while ($row = $orderList->fetch_assoc()) {
                                    ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $row['id_order'] ?></td>
                                                    <td><?php echo $row['id_customer'] ?></td>
                                                    <td><?php echo $row['id_voucher'] ?></td>
                                                    <td><?php echo $row['id_employee'] ?></td>
                                                    <td><?php echo $row['totalprice'] ?></td>
                                                    <td><?php echo $row['date'] ?></td>
                                                    <td>
                                                        <div>
                                                            <a href="javascript:" class="" onclick="getOrderDetail('<?php print($row['id_order']) ?>')">View</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                    <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="downloads">
                            <h4>Downloads</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Downloads</th>
                                            <th>Expires</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shopnovilla - Free Real Estate PSD Template</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="danger">Expired</span></td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Organic - ecommerce html template</td>
                                            <td>Sep 11, 2018</td>
                                            <td>Never</td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <h5 class="billing-address">Billing address</h5>
                            <a href="#" class="view">Edit</a>
                            <p class="mb-2"><strong>Michael M Hoskins</strong></p>
                            <address>
                                <span class="mb-1 d-inline-block"><strong>City:</strong> Seattle</span>,
                                <br>
                                <span class="mb-1 d-inline-block"><strong>State:</strong> Washington(WA)</span>,
                                <br>
                                <span class="mb-1 d-inline-block"><strong>ZIP:</strong> 98101</span>,
                                <br>
                                <span><strong>Country:</strong> USA</span>
                            </address>
                        </div>
                        <div class="tab-pane fade" id="account-details">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Account details </h3>
                                    <div class="p-4 border rounded">
                                        <form class="row g-3" action="#" method="POST" onsubmit="update()">
                                            <div class="col-md-3">
                                                <label class="form-label">ID Customer</label>
                                                <input class="form-control" type="text" name="id_cus" value="<?php echo $order['id_customer'] ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">ID Account</label>
                                                <input class="form-control" type="text" name="id_acc" value="<?php echo $order['id_account'] ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Created date</label>
                                                <input class="form-control" type="text" name="create-date" value="<?php echo $order['createdate'] ?>" readonly>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Point</label>
                                                <input class="form-control" type="text" name="point" value="<?php echo $order['point'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Full Name</label>
                                                <input class="form-control" type="text" name="full-name" value="<?php echo $order['fullname'] ?>" require>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Address</label>
                                                <input class="form-control" type="text" name="address" value="<?php echo $order['address'] ?>" require>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" type="text" name="email" value="<?php echo $order['email'] ?>" require>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Phone</label>
                                                <input class="form-control" type="text" name="phone" value="<?php echo $order['phone'] ?>" require>
                                            </div>


                                            <div class="save_button mt-3">
                                                <button class="btn" type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- account area start -->
    <div class="switchModal"></div>
    <!-- Footer Area Start -->
    <?php require_once($path . '/includes/footer.php') ?>
    <!-- Footer Area End -->

    <!-- Modals -->
    <?php require_once($path . '/includes/modals.php') ?>
    <!-- END Modals -->

    <!-- JavaScripts -->
    <?php require_once($path . '/includes/scripts.php') ?>
    <!-- END JavaScripts -->

    <?php
    $path = dirname(__FILE__);
    require_once $path . '/admin/includes/scripts.php';
    ?>
</body>

</html>