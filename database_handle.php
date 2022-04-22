<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "wdt_assignment";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
} 
else{
    
}

?>