<?php
$path = dirname(__FILE__);
require_once($path . '/process/auth.php');
checkLogin();
?>

<?php
$path = dirname(__FILE__);
require_once($path . '/class/order.php');
checkLogin();
?>
<?php
$path = dirname(__FILE__);
require_once($path . '/class/orderItem.php');
checkLogin();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/headerhtml.php');
    ?>
</head>

<body>

    <?php
    $path = dirname(__FILE__);
    $orderModel = new Order();
    ?>

    <!--Top bar, Header Area Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/header.php');
    ?>

    <!--Top bar, Header Area End -->
    <div class="offcanvas-overlay"></div>

    <!-- OffCanvas Wishlist Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/offcanvasWishlist.php')
    ?>
    <!-- OffCanvas Wishlist End -->
    <!-- OffCanvas Cart Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/offcanvasCart.php') ?>
    <!-- OffCanvas Cart End -->

    <!-- OffCanvas Menu Start -->
    <?php
    $path = realpath(dirname(__FILE__));
    require_once($path . '/includes/offcanvasMenu.php') ?>
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
                            <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>
                            <!-- <li><a href="#downloads" data-bs-toggle="tab" class="nav-link">Downloads</a></li>
                            <li><a href="#address" data-bs-toggle="tab" class="nav-link">Addresses</a></li> -->
                            <li onclick="viewToUpdate('<?php print($_SESSION['id_customer']) ?>')"><a href="#" class="nav-link">Account details</a> </li>
                            <li onclick="logout()"><a href="#" data-bs-toggle="tab" class="nav-link">logout</a> </li>
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
                                            <th>ID Voucher</th>
                                            <th>ID Employee</th>
                                            <th>Total price</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $orderList = $orderModel->getOrders();
                                    $idOrderItem = new OrderItem();
                                    // var_dump($_SESSION);
                                    if ($orderList) {
                                        while ($row = $orderList->fetch_assoc()) {
                                            if ($row['id_customer'] == $_SESSION['id_customer']) {
                                    ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $row['id_order'] ?></td>
                                                        <td><?php echo $row['id_voucher'] ?></td>
                                                        <td><?php echo $row['id_employee'] ?></td>
                                                        <td><?php echo $row['totalprice'] ?></td>
                                                        <td><?php echo $row['date'] ?></td>
                                                        <td>
                                                            <div class="view">
                                                                <span  class="view" onclick="viewOrderDetail('<?php print($row['id_order']) ?>')">View</span>
                                                            </div>
                                                        </td>

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
                            <h3>Account details </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="#">
                                            <p>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginActive">Log in instead!</a></p>
                                            <div class="input-radio">
                                                <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mrs.</span>
                                            </div> <br>
                                            <div class="default-form-box mb-20">
                                                <label>First Name</label>
                                                <input type="text" name="first-name">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Last Name</label>
                                                <input type="text" name="last-name">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Email</label>
                                                <input type="text" name="email-name">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Password</label>
                                                <input type="password" name="user-password">
                                            </div>
                                            <div class="default-form-box mb-20">
                                                <label>Birthdate</label>
                                                <input type="date" name="birthday">
                                            </div>
                                            <span class="example">
                                                (E.g.: 05/31/1970)
                                            </span>
                                            <br>
                                            <label class="checkbox-default" for="offer">
                                                <input type="checkbox" id="offer">
                                                <span>Receive offers from our partners</span>
                                            </label>
                                            <br>
                                            <label class="checkbox-default checkbox-default-more-text" for="newsletter">
                                                <input type="checkbox" id="newsletter">
                                                <span>Sign up for our newsletter<br><em>You may unsubscribe at any
                                                        moment. For that purpose, please find our contact info in the
                                                        legal notice.</em></span>
                                            </label>
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
    
    <!-- Footer Area Start -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/footer.php')
    ?>
    <!-- Footer Area End -->

    <!-- Modals -->
    <?php
    $path = dirname(__FILE__);
    require_once($path . '/includes/modals.php') ?>
    <!-- END Modals -->
    <div id="switchModal"></div>
    <!-- JavaScripts -->
    <?php
    $path = dirname(__FILE__);
    ?>
    <!-- END JavaScripts -->
    <script src="assets/js/account.js"></script>
</body>

</html>