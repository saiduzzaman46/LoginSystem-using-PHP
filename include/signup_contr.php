<?php 

function is_input_empty(string $username,string $password,string $email){
    if(empty($username) || empty($password) || empty($email)){
        return true;
    }else{
        return false;
    }
}

function is_valid_email(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function is_username_taken(object $conn,string $username){
    if(get_username($conn,$username)){
        return true;
    }else{
        return false;
    }
}

function is_email_taken(object $conn,string $email){
    if(get_email($conn,$email)){
        return true;
    }else{
        return false;
    }
}

function create_user(object $conn,string $username,string $password,string $email){
    insert_user($conn,$username,$password,$email);
}