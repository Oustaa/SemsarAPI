<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');


include_once '../../config/Database.php';
include_once '../../models/Stores.php';
include_once '../../models/Items.php';

$database = new Database();
$db = $database->connect();

if (isset($_GET["storeId"]) and !empty($_GET["storeId"])) {
 $storeId = $_GET["storeId"];
}
if (isset($_GET["userId"]) and !empty($_GET["userId"])) {
 $userId = $_GET["userId"];
} else {
 $userId = 0;
}


$readStore = new Store($db);
$result = $readStore->StoreInfo($storeId);


$house = new House($db);
$hosesData = $house->readItems($storeId, $userId);
$result["storeItems"] = $hosesData->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
