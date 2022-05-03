<?php 
if (!isset($_SESSION)) {
    session_start();
}
$path = dirname(__FILE__);
require_once $path.'/../../class/account.php';
$path = dirname(__FILE__);
require_once $path.'/../../class/employee.php';


if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $AccountModel = new Account();
    $login = $AccountModel->login($username, md5($password));
    if ($login) {
        $id_account = $login->fetch_assoc()['id_account'];
        $EmployeeModel = new Employee();
        $getEmployee = $EmployeeModel->getEmployeeById($id_account);
        if ($getEmployee) {
            $employee = $getEmployee->fetch_assoc();
            $id_employee = $employee['id_employee'];
            $_SESSION['login'] = true;
            $_SESSION['id_position'] = $employee['id_position'];
            $_SESSION['id_employee'] = $employee['id_employee'];
            $_SESSION['id_account'] = $id_account;
            $_SESISON['fullname'] = $employee['fullname'];
            echo 1;
        }
    } else {
        echo 0;
    }
}

?>