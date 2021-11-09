<?php

require 'vendor/autoload.php';

$creds = getenv('CREDS');
$url = getenv('URL');
$app_id= getenv('APP');

$client = new MongoDB\Client(
    'mongodb+srv://'.$creds.'@'.$url);


$config_collection = $client->legacy_apps->app_config;
$config_collection = $client->legacy_apps->data;
$config_collection = $client->legacy_apps->default_data;

$app_query = ['app_id' => $app_id];

$config = $config_collection;

var_dump($config);



//echo $app_id;

?>