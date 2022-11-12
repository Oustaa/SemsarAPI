<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Auth.php';

$database = new Database();
$db = $database->connect();


$connexion = new Connexion($db);
$result  = $connexion->SingIn($_GET);

$data = $result->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);
