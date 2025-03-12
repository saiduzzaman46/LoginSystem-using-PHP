<?php
session_start();
require_once "include/login_view.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="login" action="include/login.php" method="POST">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" />
        <input type="password" name="password" placeholder="Password" />
        <a class="forgot-password">Forgot Password?</a>
        <?php
        check_login_error();
        ?>
        <button type="submit">Login</button>

    </form>


</body>

</html>