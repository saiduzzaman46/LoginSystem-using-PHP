<?php

function check_login_error()
{
    if (isset($_SESSION["errorLogin"])) {
        $error = $_SESSION["errorLogin"];
        foreach ($error as  $value) {
            echo '<p class="error">' . $value . '</p>';
        }

        unset($_SESSION["errorLogin"]);
    } elseif (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo '<p class="success">Login successful</p>';
    }
}
