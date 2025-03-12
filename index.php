<?php
session_start();
require_once "include/signup_view.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <link rel="stylesheet" href="style.css" />

    <script>
        window.onload = function() {
            document.querySelector('form').reset();
        };
    </script>

</head>

<body>
    <form action="include/signup.php" method="POST">
        <h2>Signup</h2>
        <?php
        signup_input();
        ?>
        <?php
        check_signup_error();
        ?>
        <button type="submit">Signup</button>
    </form>
</body>

</html>