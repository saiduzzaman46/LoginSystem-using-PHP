<?php

function get_user(object $conn,string $username)
{
    $query = "SELECT username FROM `user` WHERE username = '$username';";
    $result = $conn->query($query);
    
    if($result->num_rows > 0){
        return true;
    }else{
        return false;
    }
}

function verify_user_password(object $conn, string $username, string $password)
{
    $query = "SELECT password FROM `user` WHERE username = '$username';";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $hash = $row["password"];
    if(password_verify($password,$hash)){
        return true;
    }else{
        return false;
    }
}



