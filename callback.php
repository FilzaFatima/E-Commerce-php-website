<?php

require 'auth0.php';

$auth0->exchange();

$user = $auth0->getCredentials();

$_SESSION['user'] = $user->user;

header('Location: index.php');
exit;
?>