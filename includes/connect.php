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

$config = $config_collection->findOne($app_query)->config;

$appname = $config["app_settings"]["appname"];
$domain = $config["app_settings"]["domain"];
$copyright = $config["app_settings"]["copyright"];
$recordName = $config["app_settings"]["recordName"];
$shortName = $config["app_settings"]["shortName"];
$shortNameLower = strtolower($shortName);
$shortNamePlural = $config["app_settings"]["shortNamePlural"];
$lineItemRecordName = $config["app_settings"]["lineItemRecordName"];
$lineItemRecordNamePlural = $config["app_settings"]["lineItemRecordNamePlural"];

$fields = $config["fields"];

$displayName = $config["friendlyFieldNameOverrides"];

$summaryFields = (array)$config["summaryFields"];


$webhook_enabled = strlen($config["app_settings"]["webhook"]["key"]) > 1 ? true : false;
$webhook_url = $config["app_settings"]["webhook"]["url"];
$webhook_key = $config["app_settings"]["webhook"]["key"];
$webhook_tetherField = $config["app_settings"]["webhook"]["enabledWhenBlankTetherField"];
$webhook_actionDescription = $config["app_settings"]["webhook"]["actionDescription"];
$webhook_processPageDescription = $config["app_settings"]["webhook"]["processPageDescription"];