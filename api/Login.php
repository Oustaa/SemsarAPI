<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Auth.php';


$database = new Database();
$db = $database->connect();

$username = $_GET['unm'];
$password = $_GET['psw'];

$connexion = new Connexion($db);
$result   = $connexion->logIn($username, $password);



echo json_encode($result);
