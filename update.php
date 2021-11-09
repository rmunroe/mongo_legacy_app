
<?php

include "./includes/connect.php";

if (!$webhook_enabled)
    die("no webhook is enabled");

if (isset($_POST["action"])) {

    $data_list = (array)($data_collection->findOne($app_query)->data);

    echo "Please hold...<br><br>$webhook_processPageDescription...";

    $index = null;

    foreach ($data_list as $key => $data) {
        if ($data->id == $_POST["id"]) {

            $data_back = json_encode($data);
            $index = $key;
            break;
        }
    }

    if (isset($index)) {


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$webhook_url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$webhook_key:");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_back);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        foreach (json_decode($output) as $field => $value) {
            $data_list[$key]->$field = $value;
        }

        $updateDocument = $data_collection->updateOne(
            $app_query,
            ['$set' => ['data' => $data_list]]
        );


        echo "<script>
            setTimeout(function() {
            window.location.href = \"./view.php?i=" . $_POST["id"] . "\";}, 3000);
            </script>";
    } else {
        echo "ERROR: ID " . $_POST["id"] . " NOT FOUND";
    }
}

?>