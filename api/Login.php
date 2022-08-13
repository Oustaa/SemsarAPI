<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Connexion.php';

session_start();

$database = new Database();
$db = $database->connect();

$username = $_GET['unm'];
$password = $_GET['psw'];

$connexion = new Connexion($db);
$connect  = $connexion->connect($username, $password);

echo $connect;
