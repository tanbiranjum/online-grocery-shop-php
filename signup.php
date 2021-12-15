<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/signup.css">
    <title>You can sign up here</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    include_once "nav.php";
    ?>
    <!-- NAVBAR_END -->
    <h1 class="form-header">Please sign up here.</h1>
    <div class="form-container">
        <form action="includes/signup.inc.php" method="POST" class="form" onsubmit="return validator()">
            <label for="name">Name</label>
            <input type="text" name="name" class="name-input">
            <label for="mobile">Number</label>
            <input type="text" name="number" class="num-input">
            <label for="email">Email</label>
            <input type="email" name="email" class="email-input">
            <label for="division">Select Your city</label>
            <select id="division" class="select-css" name="address">
                <option value="Dhaka">Dhaka</option>
                <option value="Chittagong">Chittagong</option>
            </select>
            <!-- <label for="place">Select Your place</label>
            <select id="Place" class="select-css">
                <option value="Dhaka">Dhaka</option>
                <option value="Chittagong">Chittagong</option>
            </select> -->
            <label for="password">Password</label>
            <input type="password" name="pwd" class="pass-input">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="repeatPwd" class="cpass-input">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>
    <p class="para">Already have an account? Log in <a href="./login.html">here!</a></p>
    <!-- FOOTER -->
    <?php
    include "footer.php";
    ?>
    <!-- FOOTER_END -->
    <script src="pubjs/signup.js"></script>
</body>

</html>