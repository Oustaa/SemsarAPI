<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/LIkeItem.php';
include_once '../models/Connexion.php';


$database = new Database();
$db = $database->connect();

$itemId = $_GET['iId'];
$userId = $_GET['userId'];


$like = new Like($db);

$like->likeItem($itemId, $userId);
