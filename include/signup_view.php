<?php

function signup_input()
{

    if (isset($_SESSION["errorSignup"]["username_email_taken"])) {
        echo '<input type="text" name="username" placeholder="Username" />';
        echo '<input type="password" name="password" placeholder="Password" />';
        echo '<input type="text" name="email" placeholder="Email" />';
        return;
    }

    if (isset($_SESSION["signupData"]["username"]) && !isset($_SESSION["errorSignup"]["username_taken"])) {

        echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION["signupData"]['username'] . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Username" />';
    }
    echo '<input type="password" name="password" placeholder="Password" />';

    if (isset($_SESSION["signupData"]["email"]) && !isset($_SESSION["errorSignup"]["email_taken"]) && !isset($_SESSION["errorSignup"]["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="Email" value="' . $_SESSION["signupData"]['email'] . '">';
    } else {
        echo '<input type="text" name="email" placeholder="Email" />';
    }
}


function check_signup_error()
{
    if (isset($_SESSION["errorSignup"])) {
        $error = $_SESSION["errorSignup"];
        foreach ($error as  $value) {
            echo '<p class="error">' . $value . '</p>';
        }

        unset($_SESSION["errorSignup"]);
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<p class="success">Signup successful</p>';
        header("Location: index2.php");
        exit();
    }
}
