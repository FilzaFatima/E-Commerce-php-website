<?php
include '../config.php';

$query = mysqli_query($conn, "SELECT * FROM products");

while($row = mysqli_fetch_assoc($query)) {

    echo "<h3>".$row['name']."</h3>";
    echo "<p>$".$row['price']."</p>";
}
?>