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
        }


        if ($error) {
            $_SESSION["errorLogin"] = $error;
            $loginData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["loginData"] = $signupData;

            header("Location: ../index2.php");
            die();
        }

        unset($_SESSION["loginSignup"]);
        unset($_SESSION["loginData"]);

        header("Location: ../index2.php?login=success");
        $conn->close();
        die();
    } catch (Exception $e) {
        die($e->getMessage());
    }
}else{
    header("Location: ../index2.php");
    die();
}

