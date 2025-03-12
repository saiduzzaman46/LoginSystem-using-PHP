<?php

function get_user($username)
{
    global $conn;
    $sql = "SELECT * FROM `user` WHERE = '$username';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}