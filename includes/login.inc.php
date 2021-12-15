<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/IP' . "/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT_NAME . "/class/user.class.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // echo $email . ' ' . $pwd;
    $user = new User();
    $result = $user->loginUser($email, $pwd);
    if ($user->loginUser($email, $pwd)) {
        header("Location:" . URL_ROOT . '?login=success' . $result);
        session_start();
        $_SESSION['user'] = $email;
    } else {
        header("Location:" . URL_ROOT . '/login.php?error=incorrect' . $result);
    }
}
