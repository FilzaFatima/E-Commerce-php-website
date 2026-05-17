<?php
$product_id = $_POST['product_id'];

if(isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true);
} else {
    $cart = [];
}

if(isset($cart[$product_id])) {
    $cart[$product_id]++;
} else {
    $cart[$product_id] = 1;
}

setcookie('cart', json_encode($cart), time() + 86400, '/');

header('Location: cart.php');
?>