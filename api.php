<?php
include "./includes/connect.php";

$data_list = (array)($data_collection->findOne($app_query)->data);

$json = file_get_contents("php://input");
$body = json_decode($json, true);

$newId = (($data_list[(count($data_list) - 1)]->id) + 1);

$newArray = [];

if (isset($_GET['key'])) {
    if ($_GET['key'] == $apiKey) {
        switch ($_GET['action']) {
            case "create":
                if (count((array)$body) > 0) {
                    foreach ($body as $field => $value) {
                        if (in_array($field, $fields) && $field !== "id")
                            $newArray[$field] = $value;
                    }
                    if (count($newArray) > 0) {
                        $newArray["id"] = $newArray;
                        $data_list[] = $newArray;
                        $updateDocument = $data_collection->updateOne(
                            $app_query,
                            ['$set' => ['data' => $data_list]]
                        );
                        echo json_encode($data_list, JSON_PRETTY_PRINT);
                    }
                }
                break;
            case "update":

                break;
            case "read": //api.php?key=1234&action=read&id=4021
                if (isset($_GET['id'])) {
                    foreach (array_reverse($data_list) as $key => $data)
                        if ($data->id == $_GET['id'])
                            echo json_encode($data, JSON_PRETTY_PRINT);
                } else {
                    echo json_encode($data_list, JSON_PRETTY_PRINT);
                }
                break;
        }
    }
}
