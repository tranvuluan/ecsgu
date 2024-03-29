<?php
$path = dirname(__FILE__);
require_once $path . '/../class/permission.php';
$path = dirname(__FILE__);
require_once $path . '/../class/LibClass.php';

?>

<!doctype html>
<html lang="en" class="semi-dark">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- loader-->
<link href="assets/css/pace.min.css" rel="stylesheet" />
<script src="assets/js/pace.min.js"></script>

<!--plugins-->
<!-- <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" /> -->
<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

<!-- CSS Files -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-extended.css" rel="stylesheet">

<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!--Theme Styles-->
<link href="assets/css/dark-theme.css" rel="stylesheet" />
<link href="assets/css/semi-dark.css" rel="stylesheet" />
<link href="assets/css/header-colors.css" rel="stylesheet" />

<!-- date pick -->

<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
<link href="assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
<link href="assets/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
<link href="assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- <link href="assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" /> -->
<!-- <link href="assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" /> -->



    <!-- end header html -->

    <title>EC Shop - Admin</title>
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

                <!-- <h6 class="mb-0 text-uppercase">Thống kê doanh thu</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div id="chart1"></div>
                    </div>
                </div>
                <h6 class="mb-0 text-uppercase">Thống kê sản phẩm</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div id="chart5"></div>
                    </div>
                </div> -->
                <!--end page content wrapper-->

                
    <div class="container">
        <div class="row">
            <div class="col-md-2" id="elementButton">
                <button onclick="ProductHot()" class="btn btn-primary">Sản phẩm bán chạy</button>
            </div>
            <div class="col-md-2" id="elementButton">
                <button onclick="ProductNearlySoldOut()" class="btn btn-primary">Sản phẩm sắp hết</button>
            </div>
            <div class="col-md-2" id="elementButton">
                <button onclick="ProductSoldOut()" class="btn btn-primary">Sản phẩm đã hết</button>
            </div>
        </div>
        <br><br><br>
        <div id="StatisticalTable"> 
            <h6 class="mb-0 text-uppercase">Sản phẩm bán chạy</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" id="StatisticalTable">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Mã sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $LibClassModel = new LibClass();
                                $getProductHot = $LibClassModel->getProductHot();
                                if ($getProductHot) {
                                    while ($row = $getProductHot->fetch_assoc()) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['id_product'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td>Không có sản phẩm nào</td>
                                    </tr>
                                <?php
                                }
                                ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

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


            <!-- Scripts-->
            <?php
            $path = dirname(__FILE__);
            require_once $path . '/includes/scripts.php';
            ?>

            <script src="./assets/js/statistical.js"></script>
            <!-- END Scripts -->

            <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
            <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
            <script src="assets/plugins/apexcharts-bundle/js/apex-custom.js"></script>
</body>

</html>