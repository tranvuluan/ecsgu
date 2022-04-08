<?php 
    $path = dirname(__FILE__);
    require_once $path . '/../class/customer.php';
    require_once $path . '/../class/account.php';
?>

<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- head html -->
    <?php
    $path = dirname(__FILE__);
    require_once $path . '/includes/sidebar.php';
    ?>
    <?php
    $path = dirname(__FILE__);
    require_once $path . '/includes/headhtml.php';
    ?>
    <!-- end header html -->
    >
    <title>Blackdash - Bootstrap5 Admin Template</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">

        <!--start sidebar -->
        <?php
        $path = dirname(__FILE__);
        require_once $path . '/includes/sidebar.php';
        ?>
        <!--end sidebar -->

        <!--start top header-->
        <?php
        $path = dirname(__FILE__);
        require_once $path . '/includes/header.php';
        ?>
        <!--end top header-->

        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">

                <!--start breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Dashboard</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0 align-items-center">
                                <li class="breadcrumb-item"><a href="javascript:;">
                                        <ion-icon name="home-outline"></ion-icon>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">eCommerce</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-dark">Settings</button>
                            <button type="button" class="btn btn-outline-dark split-bg-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->


                <!-- Form khách hàng -->
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <h4 class="mb-0 text-uppercase">Quản lý khách hàng</h4>
                        <hr />
                        <button type="button" onclick="viewToAdd()" class="btn btn-primary btn-lg">
                            Thêm khách hàng
                        </button>
                        <hr />
                        <!-- End Form khách hàng -->

                        <!-- table khách hàng -->
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0">Danh sách khách hàng</h6>
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
                                                <th>Mã khách hàng</th>
                                                <th>Tên khách hàng</th>
                                                <th>Email</th>
                                                <th>Địa chỉ</th>
                                                <th>Điểm</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $customerModel = new Customer();
                                        $customerList = $customerModel->getCustomers();
                                        if ($customerList) {
                                            while ($row = $customerList->fetch_assoc()) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $row['id_customer'] ?></td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <div class="product-info">
                                                                    <h6 class="product-name mb-1"><?php echo $row['fullname'] ?></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $row['email'] ?></td>
                                                        <td><?php echo $row['address'] ?></td>
                                                        <td><?php echo $row['point'] ?></td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                                <a href="javascript:;" class="text-dark" onclick="getDetail('<?php print $row['id_customer'] ?>')">
                                                                    <ion-icon name="eye-sharp"></ion-icon>
                                                                </a>
                                                                <a href="javascript:;" class="text-dark" data-toggle="modal" data-target="#updateModalId">
                                                                    <ion-icon name="pencil-sharp"></ion-icon>
                                                                </a>
                                                                <a href="javascript:;" class="text-dark">
                                                                    <ion-icon name="trash-sharp"></ion-icon>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                        <?php
                                            }
                                        }
                                        ?>

                                    </table>
                                    <!-- end table khách hàng -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page content-->
                </div>
                <!--end page content wrapper-->

                <!--start footer-->
                <?php
                $path = dirname(__FILE__);
                require_once $path . '/includes/footer.php';
                ?>
                <!--end footer-->

                <!--start switcher-->
                <div class="switcher-body">
                    <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                        <div class="offcanvas-header border-bottom">
                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                        </div>
                        <div class="offcanvas-body">
                            <h6 class="mb-0">Theme Variation</h6>
                            <hr>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
                                <label class="form-check-label" for="LightTheme">Light</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark" value="option1" checked>
                                <label class="form-check-label" for="SemiDark">Semi Dark</label>
                            </div>
                            <hr />
                            <h6 class="mb-0">Header Colors</h6>
                            <hr />
                            <div class="header-colors-indigators">
                                <div class="row row-cols-auto g-3">
                                    <div class="col">
                                        <div class="indigator headercolor1" id="headercolor1"></div>
                                    </div>
                                    <div class="col">
                                        <div class="indigator headercolor2" id="headercolor2"></div>
                                    </div>
                                    <div class="col">
                                        <div class="indigator headercolor3" id="headercolor3"></div>
                                    </div>
                                    <div class="col">
                                        <div class="indigator headercolor4" id="headercolor4"></div>
                                    </div>
                                    <div class="col">
                                        <div class="indigator headercolor5" id="headercolor5"></div>
                                    </div>
                                    <div class="col">
                                        <div class="indigator headercolor6" id="headercolor6"></div>
                                    </div>
                                    <div class="col">
                                        <div class="indigator headercolor7" id="headercolor7"></div>
                                    </div>
                                    <div class="col">
                                        <div class="indigator headercolor8" id="headercolor8"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--end switcher-->

                <!--start overlay-->
                <div class="overlay nav-toggle-icon"></div>
                <!--end overlay-->

            </div>
            <!--end wrapper-->

            <!-- start modal sửa khách hàng -->
            <div class="modal fade" id="updateModalId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content ">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0">Thông tin khách hàng</h6>
                                <div class="p-4 border rounded">
                                    <form class="row g-3 needs-validation" novalidate>
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">Mã khách hàng</label>
                                            <input type="text" class="form-control" id="validationCustom01" value="" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Số điện thoại</label>
                                            <input type="text" class="form-control" id="validationCustom03" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Ngày tạo</label>
                                            <input type="text" class="form-control datepicker" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom02" class="form-label">Tên khách hàng</label>
                                            <input type="text" class="form-control" id="validationCustom02" value="" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom04" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="validationCustom03" required>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="validationCustom04" class="form-label">Địa chỉ</label>
                                            <input type="text" class="form-control" id="validationCustom03" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom04" class="form-label">Điểm</label>
                                            <input type="text" class="form-control" id="validationCustom03" required>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Sửa</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal sửa khách hàng -->
            <div class="switch_modal"></div>

            <!-- Scripts-->
            <?php
            $path = dirname(__FILE__);
            require_once $path . '/includes/scripts.php';
            ?>

            <script src="./assets/js/customer.js"></script>
            <!-- END Scripts -->


</body>

</html>