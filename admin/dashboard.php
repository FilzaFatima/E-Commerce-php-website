<?php

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}

$user = $_SESSION['user'];

$roles = $user['https://mini-ecommerce.com/roles'];

if(!in_array('Admin', $roles)) {
    header('Location: ../unauthorized.php');
    exit;
}

echo "Welcome Admin";
?>