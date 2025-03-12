<?php 

function is_input_empty(string $username,string $password){
    if(empty($username) || empty($password)){
        return true;
    }else{
        return false;
    }
}