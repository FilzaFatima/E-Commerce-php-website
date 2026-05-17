<?php
include 'config.php';

if(isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'");

    $user = mysqli_fetch_assoc($query);

    if($user && password_verify($password, $user['password'])) {

        $_SESSION['user'] = $user['id'];

        header('Location: checkout.php');
    }
    else {
        echo "Invalid Login";
    }
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button name="login">Login</button>
</form>
<?php
require 'auth0.php';

header("Location: " . $auth0->login());
exit;
?>