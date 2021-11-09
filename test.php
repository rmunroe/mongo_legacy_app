<?php

require 'vendor/autoload.php';

$creds = getenv('CREDS');
$url = getenv('URL');
$app_id= getenv('APP');

$database = (new MongoDB\Client('mongodb+srv://'.$creds.'@'.$url))->legacy_apps;


$config_collection = $database->app_config;
$data_collection = $database->data;
$default_collection = $database->default_data;

$app_query = ['app_id' => $app_id];

$config = $config_collection->findOne($app_query);

var_dump($config->config);



//echo $app_id;

?>