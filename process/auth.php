<?php
if (!isset($_SESSION)) {
    session_start();
}
$path = realpath(dirname(__FILE__));
require_once($path . '/../class/customer.php');
$path = realpath(dirname(__FILE__));
require_once($path . '/../class/account.php');
$AccountModel = new Account();
$CustomerModel = new Customer();
?>



<?php
// * login
if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = $AccountModel->login($username, md5($password));
    if ($login == false) {
        echo 0;
    } else {
        echo 1;
        $id_account = $login->fetch_assoc()['id_account'];
        if (substr($id_account, 0, 3) == 'CUS') {
            $customer = $CustomerModel->getCustomerByIdAccount($id_account);
            $row = $customer->fetch_assoc();
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['id_customer'] = $row['id_customer'];
            $_SESSION['login'] = true;
        } else {
            echo 2;
        }
    }
}
?>

<?php
// checklogin
function checkLogin()
{
    if (!isset($_SESSION['login'])) {
        header('Location: ./index.php');
    }
}
?>


<?php
// * logout
if (isset($_POST['logout'])) {
    session_destroy();
    echo 1;
}
?>

<?php
if (isset($_POST['register']) && isset($_POST['username']) && isset($_POST['respassword']) && isset($_POST['fullname'])) {
    $username = $_POST['username'];
    $password = $_POST['respassword'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $id_customer = 'CUS' . (int)(microtime(true) * 1000);
    $point = 0;
    $createdate = date('Y-m-d');

    $addAccount = $AccountModel->insert($id_customer, $username, $password);
    if ($addAccount) {
        $addCustomer = $CustomerModel->insert($id_customer, $id_customer, $fullname, $email, $address, $phone, $createdate, $point);
        if ($addCustomer) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
}
?>