<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/LIkeItem.php';
include_once '../models/Connexion.php';



$database = new Database();
$db = $database->connect();

$userId = $_GET['userId'];
$itemId = $_GET['iId'];

$dislike = new Like($db);

$dislike->dislikeItem($itemId, $userId);
