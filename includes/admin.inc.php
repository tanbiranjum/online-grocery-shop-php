<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/IP' . "/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/product.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/user.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/order.class.php";


function loadOrderComponent()
{
    $order = new Order();
    $user = new User();
    $result = $order->getAllOrder();
    for ($i = 0; $i < count($result); $i++) {
        $orderStatus = $result[$i][6];
        $user_id = $result[$i][1];
        $orderId = $result[$i][0];
        $product = $order->getOrderDetails($user_id);
        $customer = $user->getUserById($user_id);
        $customerName = $customer[1];
        $productPrice = $result[$i][4];
        echo "<form action=\"includes/admin.inc.php\" method=\"POST\" class=\"col-sm-12\">
                <div class=\"card\">
                    <div class=\"card-header\">
                    Name: $customerName Id: $user_id
                    </div>
                    <div class=\"card-body\">
                        <table class=\"table table-bordered\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">#</th>
                                    <th scope=\"col\">Name</th>
                                    <th scope=\"col\">Quantity</th>
                                    <th scope=\"col\">Price</th>
                                </tr>
                            </thead>
                            <tbody>";
        for ($j = 0; $j < count($product); $j++) {
            $itemName = $product[$j][0];
            $itemQuantity = $product[$j][1];
            $itemPrice = $product[$j][2];
            echo "<tr>
                        <th scope=\"row\">$j</th>
                        <td>$itemName</td>
                        <td>$itemQuantity</td>
                        <td>$itemPrice</td>
                        </tr>";
        }

        echo "<tr>
                    <th scope=\"row\">$</th>
                    <td colspan=\"2\">Total Price</td>
                    <td>$productPrice</td>
                </tr>
            </tbody>
        </table>
        <input type=\"hidden\" name=\"order_id\" value=\"$orderId\">
        ";

        if ($orderStatus === 'Pending') {
            echo "<button class=\"btn btn-primary\" type=\"submit\" name=\"approve\">Approve</button>
        <button class=\"btn btn-danger\">Reject</button>
                    </div>
                </div>
            </form>";
        } else {
            echo "<button type=\"button\" class=\"btn btn-success\">$orderStatus</button>
        <button class=\"btn btn-danger\">Delete</button>
                    </div>
                </div>
            </form>";
        }
    }
}


// GET ALL ORDER DETAILS
// FOR EACH RESULT GET FULL ORDER DETAILS
if (isset($_POST['approve'])) {
    $user_id = $_POST['order_id'];
    $order = new Order();
    if ($order->changeOrderStatus($user_id)) {
        header("Location: " . URL_ROOT . "/admin.php?status=" . $user_id);
    } else {
        header("Location: " . URL_ROOT . "/admin.php?status=false");
    }
}



// for ($j = 0; $j < count($product); $j++) {
//     for ($k = 0; $k < count($product[$j]); $k++) {
//         $itemId = $product[$k][2];
//         $itemName = $product[$k][2];
//         $itemQuantity = $product[$k][3];
//         $itemPrice = $product[$k][4];
//         echo "<tr>
//             <th scope=\"row\">$j</th>
//             <td>row</td>
//             <td>$itemName</td>
//             <td>$itemQuantity</td>
//             <td>$itemPrice</td>
//         </tr>";
//     }
// }
