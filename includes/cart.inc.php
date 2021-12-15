<?php
// session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/IP' . "/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/product.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/user.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/order.class.php";


$item = new Product();
if (isset($_SESSION['cart'])) {
    $carts = $_SESSION['cart'];
    for ($i = 0; $i < count($carts); $i++) {
        $result = $item->getProduct($_SESSION['cart'][$i]["product_id"]);
        echo
            "<div class=\"card\">
            <div class=\"card-para\">
                <p class=\"card-name\">$result[1]</p>
                <p class=\"card-quantity\">Quantity: 1 x <span class=\"quantity\">1</span></p>
                <p class=\"card-price\"><span class=\"price\">$result[3]</span> tk</p>
                <input type=\"hidden\" value=\"$result[0]\" name=\"id[]\">
                <input type=\"hidden\" value=\"$result[1]\" name=\"name[]\">
                <input class=\"card-quantity-h\" type=\"hidden\" value=\"1\" name=\"quantity[]\">
                <input class=\"card-money-h\" type=\"hidden\" value=\"$result[3]\" name=\"price[]\">
            </div>
            <div class=\"button-group\">
                <button class=\"btn card-btn-del\" type=\"button\"><i class=\"fa fa-trash\"></i></button>
                <button class=\"btn btn-plus\" type=\"button\">+</button>
                <button class=\"btn btn-minus\" type=\"button\">-</button>
            </div>
        </div>";
    }
} else {
    echo "<b>Sorry you don't have any products in your cart!</b> <br>
    <b>Please add item to your cart<b/>
    ";
}

$order = new Order();
// USER
$user = new User();

$result = $user->getUser($_SESSION['user']);
$userId = $result[0];
$userNumber = $result[2];
$date = date('Y-m-d');
$city = $result[4];

// GET EACH PRODUCT NAME QUANTITY PRICE VALUE FROM
// CREATE CUSTOMER_ORDER
// SET EVERY PRODUCT TO ORDER DETAILS ONE BY ONE
if (isset($_POST['checkout'])) {
    $orderDetails = $_POST['details'];
    $order->initOrder($userId, $date, $userNumber, $orderDetails, $_POST['totalPrice'], $city);
    if ($order->createOrder($userId)) {
        $order_id = $order->getOrder($userId);
        $names = $_POST['name'];
        $prices = $_POST['price'];
        $quantity = $_POST['quantity'];
        $count = count($_POST['name']);
        var_dump($order->getOrder(1));
        for ($i = 0; $i < $count; $i++) {
            $order->insertPDetails($order_id, $names[$i], $quantity[$i], $prices[$i]);
        }
        echo "<script>alert('You order has been recieved!')</script>";
        echo "<script>window.location = 'cart.php'</script>";
    } else {
        echo "<script>alert('You already have an order!')</script>";
        echo "<script>window.location = 'cart.php'</script>";
    }
}
