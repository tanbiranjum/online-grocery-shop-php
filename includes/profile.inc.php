<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/IP' . "/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/user.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/order.class.php";


$user = new User();
$result = $user->getUser($_SESSION['user']);

$userName = $result[1];
$userNumber = $result[2];
$userEmail = $result[3];
$userId = $result[0];
//  "update value" || "1"
// if click update name =>
// if (isset($_POST[""]))

// if click update phone =>
// $user->updateUser($_POST["update-number"], 2);
// if click update email =>
// $user->updateUser($_POST["update-email"], 3);


if (isset($_POST["submit"])) {
    echo "Hello";
    if (isset($_POST["userName"])) {
        updateValue("userName", 1);
    } elseif (isset($_POST["userNumber"])) {
        updateValue("userNumber", 2);
    } elseif (isset($_POST["userEmail"])) {
        updateValue("userEmail", 3);
    } elseif (isset($_POST['old-password']) && isset($_POST['new-password']) || isset($_POST['confirm-password'])) {
        if ($user->loginUser($_SESSION['user'], $_POST['old-password'])) {
            if ($user->checkIfPwdSame($_POST['new-password'], $_POST['confirm-password'])) {
                updateValue($_POST['new-password'], 4);
                require("../includes/logout.inc.php");
            }
        }
    }
}



function updateValue($value, $i)
{
    $user = new User();
    $result = $user->getUser($_SESSION['user']);
    $user->updateUser($_POST[$value], $i);
    if (isset($_POST['new-password'])) {
        header("Location: " . URL_ROOT . '?status=logout');
        return;
    }
    header("Location: " . URL_ROOT . "/profile.php" . '?update=success');
}


function getOrderInformation($userId)
{
    $order = new Order();
    $results = $order->getOrderDetails($userId);
    if ($results) {
        $orderInformation = $order->getOrderInformation($userId);
        $pendingStatus = $orderInformation[4];
        $orderPrice = $orderInformation[5];
        echo "<div class=\"order-information\">";
        foreach ($results as $result) {
            echo "<p class=\"o-information-para\">$result[1] X 1 $result[0]</p>";
        }
        echo "<p class=\"o-information-price\">$orderPrice<span class=\"price\"> TK</span></p></div>";
        echo "<div><p class=\"order-status-heading\">STATUS</p><p class=\"order-status\">Pending</p></div>";
    } else {
        echo "<div>You don't have any order!</div>";
    }
}


                // <p class="order-status">Pending</p>
// "<p class=\"o-information-para\">6 X 1 Mango</p>
//                 <p class=\"o-information-para\">7 X 1 Apple</p>
//                 <p class=\"o-information-para\">2 X 1 Jackfruit</p>
//                 <p class=\"o-information-price\">270<span class=\"price\"> TK</span></p>
//                 "