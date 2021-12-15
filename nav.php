<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/IP' . "/config.php";
?>

<nav class="nav">
    <h1 class="nav-header">Online Grocery Shop</h1>
    <?php
    if (isset($_SESSION['user'])) {
        echo '<h2 class="nav-user">' . 'Welcome ' . $_COOKIE['username'] . '!' . '</h2>';
    }
    ?>
    <ul class="nav-list">
        <li class="nav-link"><a href="<?php echo URL_ROOT ?>">Home</a></li>
        <?php
        if (isset($_SESSION['user'])) {
            echo '<li class="nav-link"><a href="' . URL_ROOT . '/profile.php">Profile</a></li>';
            echo '<li class="nav-link"><a href="' . URL_ROOT . '/cart.php">Your cart</a></li>';
            echo '<li class="nav-link"><a href="' . URL_ROOT . '/includes/logout.inc.php">Log out</a></li>';
        } else {
            echo '<li class="nav-link"><a href="' . URL_ROOT . '/login.php">Sign in</a></li>';
        }
        ?>
    </ul>
</nav>