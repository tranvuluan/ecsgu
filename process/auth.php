<?php
    if (!isset($_SESSION)) {
        session_start();
        echo 'Khong co session';
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
        $login = $AccountModel -> login($username, $password);
        if($login == false){
            echo 0;
        }
        else {
            $id_account = $login->fetch_assoc()['id_account'];
            $customer = $CustomerModel -> getCustomerById($id_account);
            $_SESSION['fullname'] = $customer->fetch_assoc()['fullname'];
            $_SESSION['login'] = true;
        }
    }
?>

<?php 
    // checklogin
    function checkLogin(){
        if(isset($_SESSION['login'])){
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