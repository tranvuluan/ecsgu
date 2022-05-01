<?php
$path = dirname(__FILE__);
require $path . '/../class/order.php';
$path = dirname(__FILE__);
require $path . '/../class/orderItem.php';
$path = dirname(__FILE__);
require $path.'/../lib/callAPI.php';

if (!isset($_SESSION)) session_start();

// if (isset($_SESSION['cart']) && isset($_SESSION['login'])) {
if (isset($_POST['placeOrder'])) {
    $OrderModel = new Order();
    $OrderItemModel = new OrderItem();
    $id_order = 'OR' . date('YmdHis');
    $id_customer = $_SESSION['id_customer'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $total = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $total += $value['price'] * $value['quantity'];
    }

    $insertOrder = $OrderModel->insert($id_order, $id_customer, $phone, $email, $address, $country, $total, null, date('Y-m-d H:i:s'));
    $flag = 1;
    if ($insertOrder) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $insertOrderItem = $OrderItemModel->insert($id_order, $value['sku'], $value['quantity'], $value['price']);
            if ($insertOrderItem == false) {
                $flag = 0;
                break;
            }
        }
    } else {
        $flag = 0;
    }

    if ($flag == 1) {
        $data_array =  array(
            "customer"        => array(
                "fullname" => $_POST['fullname'],
                "email"    => $_POST['email'],
                "phone"    => $_POST['phone'],
                "address"  => $_POST['address'],
            ),
            "order"           => array(
                "order_id" => $id_order,
                "total"    => $total,
            ),
            
      );
      $make_call = callAPI('POST', 'http://localhost:5555/api/order/processing', json_encode($data_array));
      $response = json_decode($make_call, true);
    //   $errors   = $response['response']['errors'];
    //   $data     = $response['response'];
      if ($response['message'] != 'Successfully')
         $flag = 0;
    }
    echo $flag;
}
?>
