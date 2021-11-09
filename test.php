<?php

require 'vendor/autoload.php';

$creds = getenv('CREDS');
$url = getenv('URL');
$app_id= getenv('APP');

$client = new MongoDB\Client(
    'mongodb+srv://'.$creds.'@'.$url);

$db = $client->test;

echo $app_id;

?>