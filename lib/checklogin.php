<?php
    session_start();

    $path = realpath(dirname(__FILE__));

    require_once($path . '/../class/customer.php');

    $customerModel = new Customer();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $checkLogin = $customerModel -> checkLogin($username, $password);
    if($checkLogin == false){
        echo 0;
    }
    else {
        echo 1;
        $_SESSION['login'] = true;
        $rs = $checkLogin->fetch_assoc();
        $_SESSION['fullname'] = $rs['fullname'];
        $_SESSION['id_customer'] = $rs['id_customer'];
        echo $rs['id_customer'];
        echo $rs['fullname'];
    }
?>