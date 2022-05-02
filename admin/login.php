<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- head html -->
    <?php
    $path = dirname(__FILE__);
    require_once $path . '/includes/headhtml.php';
    ?>
    <!-- end header html -->

    <title>Blackdash - Bootstrap5 Admin Template</title>
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