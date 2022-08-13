<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Items.php';



$database = new Database();
$db = $database->connect();


$post = new House($db);

$id = $_GET['Id'];
$result = $post->readSingle($id);

echo json_encode($result);
