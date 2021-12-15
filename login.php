<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/login.css">
    <title>You can log in here</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php
    include "nav.php";
    ?>
    <!-- NAVBAR_END -->
    <h1 class="form-header">Please sign in here.</h1>
    <div class="form-container">
        <form action="includes/login.inc.php" method="post" class="form" onsubmit="return validator()">
            <?php
            if (isset($_GET['error'])) {
                echo '<label for="error" class="error" style="color: red;">Incorrect email or password.</label>';
            }
            ?>
            <label for="email">Email</label>
            <input type="text" name="email" class="email-input">
            <label for="password">Password</label>
            <input type="password" name="pwd" class="pass-input" autocomplete="off">
            <button type="submit" name="submit" class="submit-btn">Log in</button>
        </form>
    </div>
    <p class="para">Don't have a account? Sign up <a href="<?php echo URL_ROOT ?>/signup.php">here!</a></p>
    <!-- FOOTER -->
    <?php
    include "footer.php";
    ?>
    <!-- FOOTER_END -->
    <script src="public/js/login.js"></script>
</body>

</html>