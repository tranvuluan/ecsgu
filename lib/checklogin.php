<?php

if (!isset($_SESSION)) session_start();

function checkUserLogin()
{
    if (!isset($_SESSION['login']) && !isset($_SESSION['id_customer'])) {
        header('Location: ./login.php');
    }
}


function checkEmployeeLogin() {

    if (!isset($_SESSION['login']) && !isset($_SESSION['id_employee'])) {
        header('Location: ./login.php');
    }
}


?>

<br>