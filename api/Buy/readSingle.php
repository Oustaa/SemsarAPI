<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Buy.php';


$database = new Database();
$db = $database->connect();


$house = new House($db);

$house->id = isset($_GET['id']) ? $_GET['id'] : -1;

$result = $house->readSingle();

echo json_encode($result);
