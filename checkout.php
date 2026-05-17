<?php
include 'config.php';

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
}

$user_id = $_SESSION['user'];
$total = 0;

if(isset($_COOKIE['cart'])) {

    $cart = json_decode($_COOKIE['cart'], true);

    foreach($cart as $id => $qty) {

        $result = mysqli_query($conn,
        "SELECT * FROM products WHERE id=$id");

        $product = mysqli_fetch_assoc($result);

        $subtotal = $product['price'] * $qty;
        $total += $subtotal;
    }

    mysqli_query($conn,
    "INSERT INTO orders(user_id,total_amount)
    VALUES('$user_id','$total')");

    $order_id = mysqli_insert_id($conn);

    foreach($cart as $id => $qty) {

        $result = mysqli_query($conn,
        "SELECT * FROM products WHERE id=$id");

        $product = mysqli_fetch_assoc($result);

        mysqli_query($conn,
        "INSERT INTO order_items(order_id,product_id,quantity,price)
        VALUES('$order_id','$id','$qty','".$product['price']."')");
    }

    setcookie('cart', '', time() - 3600, '/');

    echo "Order Placed Successfully";
}
?>
<?php

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];

$permissions = $user['permissions'];

if(!in_array('purchase:product', $permissions)) {

    die('No Permission');
}

echo "Checkout Allowed";
?>