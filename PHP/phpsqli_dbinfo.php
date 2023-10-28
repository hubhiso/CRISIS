<?php
$username="root";
$password="hiso";
$database="crisis";
$hostname = "localhost";

$conn = mysqli_connect($hostname, $username, $password, $database);

    if (mysqli_connect_errno()) 
    { 
        echo "Database connection failed."; 
    }
        // Change character set to utf8
     mysqli_set_charset($conn,"utf8");

?>