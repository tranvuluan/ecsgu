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

    <title>EC Shop</title>
</head>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form onsubmit="login()">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="username" placeholder="name@example.com" />
                                            <label for="inputEmail">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" >Login</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <?php
    $path = dirname(__FILE__);
    require_once $path . '/includes/scripts.php';
    ?>


    <script>
        function login() {
            event.preventDefault();
            var username = $('#inputEmail').val();
            var password = $('#inputPassword').val();
            $.ajax({
                url: 'process/loginprocess.php',
                type: 'POST',
                data: {
                    username: username,
                    password: password,
                    login: true
                },
                success: function(response) {
                    if (response == 1) {
                        window.location.href = './index.php';
                    } else {
                        alert("Thông tin đăng nhập không hợp lệ!");
                        console.log(response);
                    }
                }
            });
        }
    </script>

</body>

</html>