<?php
session_start();
require "includes/profile.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/profile.css">
    <title>Your profile</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    include "nav.php";
    ?>
    <!-- NAVBAR_END -->
    <main class="main">
        <form class="information" method="POST">
            <h3 class="information-para">Name: <span class="name"><?php echo $userName ?></span></h3>
            <div>
                <p style="display: inline;" class="c-para">Change</p>
                <input type="text" class="information-input" name="userName">
                <button type="submit" name="submit" class="information-btn">Update</button>
            </div>
        </form>
        <form class="information" method="POST">
            <h3 class="information-para">Mobile: <span class="name">0<?php echo $userNumber ?></span></h3>
            <div>
                <p style="display: inline;" class="c-para">Change</p>
                <input type="text" class="information-input" name="userPhone">
                <button type="submit" name="submit" class="information-btn">Update</button>
            </div>
        </form>
        <form class="information" method="POST">
            <h3 class="information-para">Email: <span class="email"><?php echo $userEmail ?></span></h3>
            <div>
                <p style="display: inline;" class="c-para">Change</p>
                <input type="text" class="information-input" name="userEmail">
                <button type="submit" name="submit" class="information-btn">Update</button>
            </div>
        </form>
        <h4 class="change-password">Change Password</h4>
        <form method="post" method="POST">
            <label for="old-password">Old Password</label>
            <input type="password" class="input-pass" name="old-password">
            <label for="new-password">New Password</label>
            <input type="password" class="input-pass" name="new-password">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" class="input-pass" class="confirm-password">
            <button type="submit" class="pass-btn" name="submit">Change</button>
        </form>
    </main>
    <section class="order-section">
        <h3 class="order-heading">Your Order</h3>
        <div class="order">
            <?php
            getOrderInformation($userId);
            ?>
        </div>
    </section>
    <!-- FOOTER -->
    <?php
    include "footer.php";
    ?>
    <!-- FOOTER_END -->
</body>

</html>