<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {

        include_once "connection.php";
        include_once "signup_model.php";
        include_once "signup_contr.php";

        $error = [];

        if (is_input_empty($username, $password, $email)) {
            $error["empty_input"] = "Please fill in all fields";
        } else {
            if (is_valid_email($email)) {
                $error["invalid_email"] = "Please enter a valid email";
            } else {
                $usernameTaken = is_username_taken($conn, $username);
                $emailTaken = is_email_taken($conn, $email);

                if ($usernameTaken && $emailTaken) {
                    $error["username_email_taken"] = "Username and Email are already taken";
                } else {
                    if ($usernameTaken) {
                        $error["username_taken"] = "Username is already taken";
                    }
                    if ($emailTaken) {
                        $error["email_taken"] = "Email is already taken";
                    }
                }
            }
        }
        if ($error) {
            $_SESSION["errorSignup"] = $error;
            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signupData"] = $signupData;

            header("Location: ../index.php");
            die();
        }

        create_user($conn, $username, $password, $email);


        unset($_SESSION["signupData"]);
        unset($_SESSION["errorSignup"]);

        header("Location: ../index.php?signup=success");
        $conn->close();
        die();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
?>