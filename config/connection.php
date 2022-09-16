<?php 

function getConnection()
{
    $hostname = "localhost";
    $username = "nhomtk_admin";
    $password = "Admin2022*#";
    $database_name = "nhomtk_ecshop";
    // $hostname = "localhost";
    // $username = "root";
    // $password = "";
    // $database_name = "ecshop";

    $conn = new mysqli($hostname, $username, $password, $database_name);

    if($conn){
        return $conn;
    } 
    else{
        die("$conn->connect_error");
    }
}

?>