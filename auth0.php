<?php

require 'vendor/autoload.php';

use Auth0\\SDK\\Auth0;

$auth0 = new Auth0([
    'domain' => 'YOUR_DOMAIN',
    'clientId' => 'YOUR_CLIENT_ID',
    'clientSecret' => 'YOUR_CLIENT_SECRET',
    'cookieSecret' => 'RANDOM_SECRET',
    'redirectUri' => 'http://localhost/mini-ecommerce/callback.php'
]);
?>