<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/LIkeItem.php';
include_once '../models/Connexion.php';

session_start();
$_SESSION['userId'] = 3;

$database = new Database();
$db = $database->connect();

$connect = new Connexion($db);

$userId = $connect->isConnected("return")['id'];

$itemId = $_GET['iId'];

$test = new Like($db);

$test->dislikeItem($itemId, $userId);
