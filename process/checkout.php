<?php
$path = dirname(__FILE__);
require $path . '/../class/order.php';
$path = dirname(__FILE__);
require $path . '/../class/orderItem.php';
$path = dirname(__FILE__);
require $path . '/../class/customer.php';
$path = dirname(__FILE__);
require $path . '/../class/configurable_product.php';
$path = dirname(__FILE__);
require $path.'/../lib/callAPI.php';

if (!isset($_SESSION)) session_start();

// if (isset($_SESSION['cart']) && isset($_SESSION['login'])) {
if (isset($_POST['placeOrder'])) {
    $OrderModel = new Order();
    $OrderItemModel = new OrderItem();
    $CustomerModel = new Customer();
    $ConfigurableModel = new ConfigurableProduct();
    $id_order = 'OR' . date('YmdHis');
    $id_customer = $_SESSION['id_customer'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $total = 0;

    // check stock 
    $flag = 1;
    foreach ($_SESSION['cart'] as $key => $value) {
        $checkStock = $ConfigurableModel->checkStock($value['sku'], $value['quantity']);
        if ($checkStock == false) {
            $flag = 0;
            break;
        }
    }
    if ($flag == 0) {
        echo $flag;
        return;
    }

    foreach ($_SESSION['cart'] as $key => $value) {
        $total += $value['price'] * $value['quantity'];
    }

    $insertOrder = $OrderModel->insert($id_order, $id_customer, $fullname, $phone, $email, $address, $country, $total, null, date('Y-m-d H:i:s'));
    $getCustomer = $CustomerModel->getCustomerByIdCustomer($id_customer);
    $customer = $getCustomer->fetch_assoc();
    $plusCustomerPoint = $CustomerModel->plusPoint($id_customer, $total + $customer['point']);
    if ($insertOrder) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $insertOrderItem = $OrderItemModel->insert($id_order, $value['sku'], $value['quantity'], $value['price']);
            // $
            if ($insertOrderItem == false) {
                $flag = 0;
                break;
            }
        }
    } else {
        $flag = 0;
    }

    if ($flag == 1) {
        $items_send = [];
        foreach ($_SESSION['cart'] as $key => $value) {
            $item ['name']= $value['name'];
            $item['quantity'] = $value['quantity'];
            $item['price'] = $value['price'];
            array_push($items_send, $item);
        }

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
                "items" => json_encode($items_send)
            ),
            
      );
      $make_call = callAPI('POST', 'http://14.225.192.186:5555/api/order/processing', json_encode($data_array));
      $response = json_decode($make_call, true);
    //   $errors   = $response['response']['errors'];
    //   $data     = $response['response'];
      if ($response['message'] != 'Successfully')
         $flag = 0;
    }
    echo $flag;
}
?>
