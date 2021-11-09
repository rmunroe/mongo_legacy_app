<?php

require 'vendor/autoload.php';

$creds = getenv('CREDS');
$url = getenv('URL');
$app_id= getenv('APP');

$client = new MongoDB\Client(
    'mongodb+srv://'.$creds.'@'.$url);

//$db = $client->selectDB('legacy_apps');

$config_collection = $client->legacy_apps->app_config;
/*= new MongoCollection($db, 'app_config');
$config_collection = new MongoCollection($db, 'data');
$config_collection = new MongoCollection($db, 'default_data');
*/
$app_query = array('app_id' => $app_id);

$config = $config_collection->find($app_query);

var_dump($config->data);



//echo $app_id;

?>