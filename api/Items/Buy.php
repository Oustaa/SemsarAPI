<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Items.php';


$database = new Database();
$db = $database->connect();


$post = new House($db);
$id = (isset($_GET["userId"]) && !empty(($_GET["userId"]))) ?  $_GET["userId"] : 0;

$result = $post->readBuy($id);

$num = $result->rowCount();

if ($num > 0) {
 $houseRent = [];

 while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  array_push($houseRent, $row);
 }

 echo json_encode($houseRent);
} else {
 echo "No post Found";
}
