<?php
include '../config.php';

if(isset($_POST['add'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    mysqli_query($conn,
    "INSERT INTO products(name,description,price)
    VALUES('$name','$description','$price')");

    echo "Product Added";
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Product Name">

    <input type="text" name="description" placeholder="Description">

    <input type="number" step="0.01" name="price" placeholder="Price">

    <button name="add">Add Product</button>
</form>