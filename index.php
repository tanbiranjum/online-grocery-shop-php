<?php
session_start();
include "config.php";

if (isset($_POST["add"])) {
    if (isset($_SESSION['user'])) {
        if (isset($_SESSION["cart"])) {
            $item_array_id = array_column($_SESSION['cart'], 'product_id');
            if (in_array($_POST['product_id'], $item_array_id)) {
                echo "<script>alert('Product is already in cart!')</script>";
                echo "<script>window.location = 'index.php'</script>";
            } else {
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'product_id' => $_POST['product_id']
                );

                $_SESSION['cart'][$count] = $item_array;
            }
        } else {
            $item_array = array(
                'product_id' => $_POST['product_id']
            );
            // create new session variable
            $_SESSION['cart'][0] = $item_array;
        }
    } else {
        echo "<script>alert('You are not logged in! Please log in first!')</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Online Grocerie Shop</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    include "nav.php";
    ?>
    <!-- NAVBAR_END -->
    <main>
        <div class="catagory-container">
            <h2 class="catagory-header">Catagory</h2>
            <form action="#" method="get">
                <ul class="catagory-link-c">
                    <li class="catagory-link fruit active"><a href="#">Fruits & Vegetables</a></li>
                    <li class="catagory-link fish"><a href="#">Meat & Fish</a></li>
                    <li class="catagory-link drink"><a href="#">Drink & Beverages</a></li>
                </ul>
            </form>
        </div>

        <div class="product-container">
            <?php
            // include "product.php";
            ?>
        </div>
    </main>
    <!-- FOOTER -->
    <?php
    include "footer.php";
    ?>
    <script src="public/js/data.js"></script>
    <!-- <script src="public/js/app.js"></script> -->
</body>

</html>

<script>

</script>

<!-- <div class="card">
                <div class="img-container">
                    <img src="public/images/malta.webp" alt="#" class="card-image">
                </div>
                <p class="card-name">Name</p>
                <p class="card-size">Price: <span class="price">1</span></p>
                <p class="card-quantity">Quantity: <span class="quantity">1</span></p>
                <button class="card-button" data-item="0">Add to cart</button>
            </div>
            <div class="card">
                <div class="img-container">
                    <img src="public/images/apple.webp" alt="#" class="card-image">
                </div>
                <p class="card-name">Name</p>
                <p class="card-size">Price: <span class="price">1</span></p>
                <p class="card-quantity">Quantity: <span class="quantity">1</span></p>
                <button class="card-button">Add to cart</button>
            </div>
            <div class="card">
                <div class="img-container">
                    <img src="public/images/malta.webp" alt="#" class="card-image">
                </div>
                <p class="card-name">Name</p>
                <p class="card-size">Size: <span class="size">1</span></p>
                <p class="card-quantity">Quantity: <span class="quantity">1</span></p>
                <button class="card-button">Add to cart</button>
            </div>
            <div class="card">
                <div class="img-container">
                    <img src="public/images/guava.webp" alt="#" class="card-image">
                </div>
                <p class="card-name">Name</p>
                <p class="card-size">Size: <span class="size">1</span></p>
                <p class="card-quantity">Quantity: <span class="quantity">1</span></p>
                <button class="card-button">Add to cart</button>
            </div>
            <div class="card">
                <div class="img-container">
                    <img src="public/images/malta.webp" alt="#" class="card-image">
                </div>
                <p class="card-name">Name</p>
                <p class="card-size">Size: <span class="size">1</span></p>
                <p class="card-quantity">Quantity: <span class="quantity">1</span></p>
                <button class="card-button">Add to cart</button>
            </div>
            <div class="card">
                <div class="img-container">
                    <img src="public/images/apple.webp" alt="#" class="card-image">
                </div>
                <p class="card-name">Name</p>
                <p class="card-size">Size: <span class="size">1</span></p>
                <p class="card-quantity">Quantity: <span class="quantity">1</span></p>
                <button class="card-button">Add to cart</button>
            </div>
            <div class="card">
                <div class="img-container">
                    <img src="public/images/malta.webp" alt="#" class="card-image">
                </div>
                <p class="card-name">Name</p>
                <p class="card-size">Size: <span class="size">1</span></p>
                <p class="card-quantity">Quantity: <span class="quantity">1</span></p>
                <button class="card-button">Add to cart</button>
            </div>
            <div class="card">
                <div class="img-container">
                    <img src="public/images/orange.webp" alt="#" class="card-image">
                </div>
                <p class="card-name">Name</p>
                <p class="card-size">Size: <span class="size">1</span></p>
                <p class="card-quantity">Quantity: <span class="quantity">1</span></p>
                <button class="card-button">Add to cart</button>
            </div> -->