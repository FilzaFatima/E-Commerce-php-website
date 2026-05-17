<?php
include 'config.php';
include 'header.php';

$total = 0;

if(isset($_COOKIE['cart'])) {
    $cart = json_decode($_COOKIE['cart'], true);

    foreach($cart as $id => $qty) {
        $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        $product = mysqli_fetch_assoc($result);

        $subtotal = $product['price'] * $qty;
        $total += $subtotal;
?>

<div class="product">
    <h2><?php echo $product['name']; ?></h2>
    <p>Quantity: <?php echo $qty; ?></p>
    <p>Subtotal: $<?php echo $subtotal; ?></p>
</div>

<?php
    }
}
?>

<h2>Total: $<?php echo $total; ?></h2>

<?php if(isset($_SESSION['user'])) { ?>
    <a href="checkout.php"><button>Checkout</button></a>
<?php } else { ?>
    <a href="login.php"><button>Login To Purchase</button></a>
<?php } ?>

<?php include 'footer.php'; ?>