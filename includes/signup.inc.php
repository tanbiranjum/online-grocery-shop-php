<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/IP' . "/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/user.class.php";
// require "./class/user.class.php";

if (isset($_POST['submit'])) {
    echo "I am here";
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pwd = $_POST['pwd'];
    $repeatPwd = $_POST['repeatPwd'];

    // echo $name . ' ' . $number . ' ' . $email . ' ' . $address . ' ' . $pwd . ' ' . $repeatPwd;
    $user = new User();
    $user->initProp($name, $number, $email, $address, $pwd, $repeatPwd);
    $user->registerUser();
    header("Location: " . URL_ROOT . '?login=success');
} else {
    header("Location: " . URL_ROOT . '/signup.php?error=submission');
}
