<?php


function get_username(object $conn,string $username){

    $query = "SELECT username FROM `user` WHERE username = '$username';";
    $result = $conn->query($query);
    
    if($result->num_rows > 0){
        return true;
    }else{
        return false;
    }

}

function get_email(object $conn,string $email){

    $query = "SELECT email FROM `user` WHERE email = '$email';";
    $result = $conn->query($query);
    
    if($result->num_rows > 0){
        return true;
    }else{
        return false;
    }

}

function insert_user(object $conn, string $username, string $password, string $email) {
    // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO `user` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email');";
    $conn->query($query);
}
