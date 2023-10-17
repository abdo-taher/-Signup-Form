<?php

$mysqli = "CREATE DATABASE IF NOT EXISTS gate";

$conn= new mysqli('localhost','root','');

if (mysqli_query($conn,$mysqli)) {

    $host = 'localhost';
    $dbname = 'gate';
    $username = 'root';
    $password = '';


    $conn= new mysqli($host,$username,$password,$dbname);

    if (!$conn){
        die('Connection error' .$conn->connect_error);
    }

}else {

    echo "Found error creating database";
}


return $conn;