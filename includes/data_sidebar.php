<?php
$data_list = (array)($data_collection->findOne($app_query)->data);


//var_dump($claims);


echo "<form action=\"./view.php\">
    <input id=\"new-$shortNameLower-button\" type=\"submit\" value=\"New $shortName\" />
</form><br /><br />";


foreach (array_reverse($data_list) as $key => $data) {
    echo '<a id="'.$shortNameLower.'-link-' . $data->id . '" href="./view.php?i=' . $data->id . '">'.$shortName.' ' . ($data->id) . "<a/><br>";
    if ($key > 10)
        break;
}

echo '<br>---<br><br><a id="claim-link-list" href="./list.php">All '.$shortNamePlural.'<a/><br>';