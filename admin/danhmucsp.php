<?php
$path = dirname(__FILE__);
require_once $path . '/../class/category.php';
$path = dirname(__FILE__);
require_once $path . '/../class/categoryChild.php';
?>

<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- head html -->
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
    <?php
    $categoryModal = new Category();
    $categoryChildModal = new CategoryChild();
    ?>
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


                <div class="row">
                    <!-- begin danh mục mẹ-->
                    <div class="col-md-5">
                        <h6 class="mb-0 text-uppercase">Danh mục mẹ</h6>
                        <hr />
                        <button onclick="viewToAdd()" type="button" class="btn btn-primary btn-lg">
                            Thêm danh mục mẹ
                        </button>
                        <hr />

                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0">Danh sách danh mục mẹ</h6>
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
                                    <table class="table align-middle mb-0 table-hover" id="id_category">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Mã danh mục</th>
                                                <th>Tên danh mục</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $categoryList = $categoryModal->getCategories();
                                            if ($categoryList) {
                                                while ($row = $categoryList->fetch_assoc()) {
                                            ?>
                                                    <tr onclick="getCategoryChild('<?php print($row['id_category']) ?>')" >
                                                        <td><?php echo $row['id_category'] ?></td>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                                <a href="javascript:;" class="text-dark" onclick="viewToUpdate('<?php print($row['id_category']) ?>')">
                                                                    <ion-icon name="pencil-sharp"></ion-icon>
                                                                </a>
                                                                <a onclick=" confirm('Xoa khong?') ? deleteCategory('<?php print($row['id_category']) ?>') : event.preventDefault() " href="javascript:;" class="text-dark">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End danh mục mẹ -->

                    <!-- begin danh mục con -->
                    <div class="col-md-7 ">
                        <h6 class="mb-0 text-uppercase">Danh mục con</h6>
                        <hr />
                        <button onclick="viewToAddChild()" type="button" class="btn btn-primary btn-lg" >
                            Thêm danh mục con
                        </button>
                        <hr />

                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0">Danh sách danh mục con</h6>
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
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Mã danh mục con</th>
                                                <th>Mã danh mục</th>
                                                <th>Tên danh mục con</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_categorychild">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- begin danh mục con -->
                    <!-- end page content-->


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


                <!-- start modal thêm danh mục con -->
                <!-- <div class="modal fade" id="addSubModalId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content ">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="mb-0">Thông tin danh mục con</h6>
                                    <div class="p-4 border rounded">
                                        <form class="row g-3 needs-validation" novalidate>
                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Mã danh mục</label>
                                                <input type="text" class="form-control" id="validationCustom01" value="" placeholder="MPN001" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom02" class="form-label">Tên danh mục</label>
                                                <input type="text" class="form-control" id="validationCustom02" value="" required>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit">Thêm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- end modal thêm danh mục con -->

                <!-- start modal sửa danh mục con -->
                <!-- <div class="modal fade" id="updateSubModalId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content ">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="mb-0">Thông tin danh mục con</h6>
                                    <div class="p-4 border rounded">
                                        <form class="row g-3 needs-validation" novalidate>
                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Mã danh mục</label>
                                                <input type="text" class="form-control" id="validationCustom01" value="" placeholder="MPN001" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom02" class="form-label">Tên danh mục</label>
                                                <input type="text" class="form-control" id="validationCustom02" value="" required>
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
                </div> -->
                <!-- end modal sửa danh mục con -->
                <!-- Scripts-->
                <div id="switchModal"></div>

                <?php
                $path = dirname(__FILE__);
                require_once $path . '/includes/scripts.php';
                ?>

                <script src="./assets/js/category.js"></script>
                <!-- END Scripts -->


</body>

</html>