<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/cart.css">
    <title>Your cart</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    include "nav.php"
    ?>
    <!-- NAVBAR_END -->
    <main class="cart-container">
        <h3 class="cart-heading">Your cart</h3>
        <form method="post">
            <?php
            require './includes/cart.inc.php';
            ?>
            <p class="para">Your total price: <span class="totalPrice">1250</span> tk</p>
            <input class="total-h" type="hidden" value="0" name="totalPrice">
            <div class="form">
                <label for="address" class="label-address">Address</label>
                <textarea id="ta" cols="30" rows="10" name="details"></textarea>
                <button type="submit" class="btn-check" name="checkout">Checkout!</button>
            </div>
        </form>
    </main>
    <!-- FOOTER -->
    <?php
    include "footer.php"
    ?>
    <!-- FOOTER_END -->
    <script src="public/js/cart.js"></script>
</body>

</html>