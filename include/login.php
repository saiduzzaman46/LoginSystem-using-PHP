<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {

        include_once "connection.php";
        include_once "login_model.php";
        include_once "login_control.php";

        $error = [];

        if (is_input_empty($username, $password)) {
            $error["empty_input"] = "Please fill in all fields";
        } elseif (!get_user($conn, $username)) {
            $error["user_not_found"] = "User not found";
        }


        if ($error) {
            $_SESSION["errorLogin"] = $error;
            header("Location: ../index2.php");
            die();
        } else {
            if (verify_user_password($conn, $username, $password)) {
                $_SESSION["username"] = $username;
                header("Location: ../fontPage.php");
                die();
            } else {
                $error["wrong_password"] = "Wrong password";
                $_SESSION["errorLogin"] = $error;
                header("Location: ../index2.php");
                die();
            }
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
} else {
    header("Location: ../index2.php");
    die();
}
