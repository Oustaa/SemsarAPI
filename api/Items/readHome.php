<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Items.php';


$database = new Database();
$db = $database->connect();

if($_SERVER['REQUEST_METHOD'] == "GET"){
  $Houses = new House($db);
  $id = (isset($_GET["userId"]) && !empty(($_GET["userId"]))) ?  $_GET["userId"] : 0;

  $result = $Houses->readHome($id);

  echo json_encode($result);
} else{
 echo json_encode(array("message" => "Access denied"));
}
