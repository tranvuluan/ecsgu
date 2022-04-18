<?php
$path = dirname(__FILE__);
require_once $path . '/../class/warehouseReceipt.php';
require_once $path . '/../class/warehouseReceiptDetail.php';
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
  <?php
  $warehouseReceiptModel = new WarehouseReceipt();
  $warehouseReceiptDetailModel = new WarehouseReceiptDetail();
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


        <!-- Form nhập hàng -->
        <div class="row">
          <div class="col-xl-12 mx-auto">
            <h4 class="mb-0 text-uppercase">Quản lý phiếu nhập</h4>
            <hr />
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" onclick="viewToAdd()">
              Thêm phiếu nhập
            </button>
            <hr />
            <div class="row">
              <div class="col-md-7">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center ">
                      <h6 class="mb-0 text-uppercase">Danh sách phiếu nhập</h6>
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
                            <th>Mã PN</th>
                            <th>NCC</th>
                            <th>Mã NV</th>
                            <th>Ngày nhập</th>
                            <th>Tổng tiền</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <?php
                        $listWarehouseReceipt = $warehouseReceiptModel->getWarehouseReceipts();
                        if ($listWarehouseReceipt) {
                          while ($row = $listWarehouseReceipt->fetch_assoc()) {
                        ?>
                            <tbody>
                              <tr onclick="getWarehouseReceiptDetail('<?php print $row['id_warehousereceipt'] ?>')">
                                <td><?php echo $row['id_warehousereceipt'] ?></td>
                                <td><?php echo $row['id_supplier'] ?></td>
                                <td><?php echo $row['id_employee'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['totalprice'] ?></td>
                                <td>
                                  <div class="d-flex align-items-center gap-3 fs-6">
                                    <a href="javascript:;" class="text-dark" onclick="view('<?php print $row['id_warehousereceipt'] ?>')">
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
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="card radius-10 w-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center ">
                      <h6 class="mb-0 text-uppercase">Chi tiết phiếu nhập</h6>
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
                            <th>Mã PN</th>
                            <th>Mã SP</th>
                            <th>Số lượng</th>
                            <th>Giá nhập</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody id="tbody_warehousereceiptDetail">

                        </tbody>
                      </table>
                    </div>
                  </div>
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
      <div id="switchModel"></div>

      <!-- Scripts-->
      <?php
      $path = dirname(__FILE__);
      require_once $path . '/includes/scripts.php';
      ?>
      <!-- END Scripts -->
      <script src="./assets/js/warehouseReceipt.js"></script>


</body>

</html>