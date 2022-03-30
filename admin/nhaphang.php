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


        <!-- Form nhập hàng -->
        <div class="row">
          <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Quảng lý phiếu nhập</h6>
            <hr />
            <div class="card">
              <div class="card-body">
                <div class="p-4 border rounded">
                  <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-4">
                      <label for="validationCustom01" class="form-label">Mã phiếu nhập</label>
                      <input type="text" class="form-control" id="validationCustom01" value="" placeholder="MPN001" required>
                    </div>
                    <div class="col-md-4">
                      <label for="validationCustom02" class="form-label">Tổng (triệu đ)</label>
                      <input type="text" class="form-control" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-4">
                      <label for="validationCustom03" class="form-label">Chọn Nhà cung cấp</label>
                      <select class="form-select" aria-label="Default select example">
                        <option value="1">Nhà máy Á Châu</option>
                        <option value="2">Nhà máy Thượng Hải</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="validationCustom04" class="form-label">Mã nhân viên</label>
                      <input type="text" class="form-control" id="validationCustom03" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Ngày nhập</label>
                      <input type="text" class="form-control datepicker" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <hr />
            <!-- End Form nhập hàng -->

            <div class="card radius-10 w-100">
              <div class="card-body">
                <div class="d-flex align-items-center ">
                  <div class="p-2 mb-0">
                    <h6>Danh sách phiếu nhập</h6>
                  </div>
                  <div class="ms-auto p-2">
                    <a href="addwarehouse-receipt.php" class="btn btn-primary">Thêm phiếu nhập</a>
                  </div>
                  <div class="fs-5 p-2 dropdown">
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
                        <th>Mã phiếu nhập</th>
                        <th>Tổng tiền</th>
                        <th>Nhà cung cấp</th>
                        <th>Mã nhân viên</th>
                        <th>Ngày nhâp</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>#89742</td>
                        <td>
                          <div class="d-flex align-items-center gap-3">
                            <div class="product-box border">
                              <img src="https://via.placeholder.com/110X110/212529/fff" alt="">
                            </div>
                            <div class="product-info">
                              <h6 class="product-name mb-1">Smart Mobile Phone</h6>
                            </div>
                          </div>
                        </td>
                        <td>2</td>
                        <td>$214</td>
                        <td>Apr 8, 2021</td>
                        <td>
                          <div class="d-flex align-items-center gap-3 fs-6">
                            <a href="javascript:;" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views">
                              <ion-icon name="eye-sharp"></ion-icon>
                            </a>
                            <a href="javascript:;" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit">
                              <ion-icon name="pencil-sharp"></ion-icon>
                            </a>
                            <a href="javascript:;" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete">
                              <ion-icon name="trash-sharp"></ion-icon>
                            </a>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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


      <!-- Scripts-->
      <?php
      $path = dirname(__FILE__);
      require_once $path . '/includes/scripts.php';
      ?>
      <!-- END Scripts -->


</body>

</html>