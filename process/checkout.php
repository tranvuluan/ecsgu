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
    $total = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $total += $value['price'] * $value['quantity'];
    }

    $insertOrder = $OrderModel->insert($id_order, $id_customer, $total, null, date('Y-m-d H:i:s'));
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
            "customer"        => $user['User']['customer_id'],
            "payment"         => array(
                  "number"         => $this->request->data['account'],
                  "routing"        => $this->request->data['routing'],
                  "method"         => $this->request->data['method']
            ),
      );
      $make_call = callAPI('POST', 'https://api.example.com/post_url/', json_encode($data_array));
      $response = json_decode($make_call, true);
      $errors   = $response['response']['errors'];
      $data     = $response['response']['data'][0];
    }
    echo $flag;
}
?>
<br>