<?php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('298593531702-bho5si03pq2ff2fj100q9ounodckc8aj.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://rpc.instantjob.org/profile');

//
$google_client->addScope('email');

$google_client->addScope('profile');



?>