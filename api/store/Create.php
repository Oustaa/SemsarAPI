<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Stores.php';

$database = new Database();
$db = $database->connect();

$creatStore = new Store($db);

$result = $creatStore->createStore($_GET);
