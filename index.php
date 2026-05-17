<?php
include 'config.php';
include 'header.php';

$query = mysqli_query($conn, "SELECT * FROM products");

while($row = mysqli_fetch_assoc($query)) {
?>

<div class="product">
    <h2><?php echo $row['name']; ?></h2>
    <p><?php echo $row['description']; ?></p>
    <h3>$<?php echo $row['price']; ?></h3>

    <form method="POST" action="add_to_cart.php">
        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
        <button type="submit">Add To Cart</button>
    </form>
</div>

<?php
}

include 'footer.php';
?>