<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "mini_ecommerce";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>