<?php
include "./includes/connect.php";

$data_list = (array)($data_collection->findOne($app_query)->data);

if (isset($_GET['key'])) {
    if ($_GET['key'] == $apiKey) {
        switch ($_GET['action']) {
            case "create":

                break;
            case "update":

                break;
            case "read":
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
