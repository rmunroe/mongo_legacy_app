<?php

$creds = getenv('CREDS');

$client = new MongoDB\Client(
    'mongodb+srv://'.$creds.'@cluster0.dg109.mongodb.net/legacy_apps?retryWrites=true&w=majority');

$db = $client->test;

echo $db;

?>