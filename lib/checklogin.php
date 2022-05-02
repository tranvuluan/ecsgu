<?php

if (!isset($_SESSION)) session_start();
function checkUserLogin()
{
    $path = dirname(__FILE__);
    var_dump($_SESSION);
    if (!isset($_SESSION['login'])) {
        echo '<script>alert("Bạn chưa đăng nhập!");</script>';
        header(`Location: $path.'/../login.php'`);
    }
}
?>

<br>