<!DOCTYPE html>
<html>
<head>
    <title>Mini E-Commerce</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Mini E-Commerce</h1>

    <nav>
        <a href="index.php">Home</a>
        <a href="cart.php">Cart</a>

        <?php if(isset($_SESSION['user'])) { ?>
            <a href="checkout.php">Checkout</a>
            <a href="logout.php">Logout</a>
        <?php } else { ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php } ?>
    </nav>
</header>
<div class="container">