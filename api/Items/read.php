<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Items.php';

session_start();
$_SESSION['userId'] = 3;


$database = new Database();
$db = $database->connect();


$post = new House($db);

$result = $post->read($_GET);

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
