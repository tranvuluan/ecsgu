<?php
if (!isset($_SESSION)) {
    session_start();
}
$path = realpath(dirname(__FILE__));
require_once($path . '/../class/customer.php');
require_once($path . '/../class/account.php');
$AccountModel = new Account();
$CustomerModel = new Customer();
?>


<?php
// * login
if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = $AccountModel->login($username, $password);
    if ($login == false) {
        echo 0;
    } else {
        $id_account = $login->fetch_assoc()['id_account'];
        echo $id_account;
        $customer = $CustomerModel->getCustomerById($id_account);
        var_dump($customer);
        $_SESSION['fullname'] = $customer->fetch_assoc()['fullname'];
        $_SESSION['login'] = true;
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
if (isset($_POST['register']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fullname'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $id_customer = 'CUS' . (int)(microtime(true) * 1000);
    $point = 0;
    $createdate = date('Y-m-d');

    if ($password == $confirmpassword) {
        $addAccount = $AccountModel->insert($id_customer, $username, $password);
        if ($addAccount) {
            $addCustomer = $CustomerModel->insert($id_customer, $id_customer, $fullname, $email, $address, $phone, $createdate, $point);
            if ($addCustomer) {
                echo 1;
            } else {
                echo 0;
            }
        }
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