<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Connexion.php';

session_start();

$database = new Database();
$db = $database->connect();



$connexion = new Connexion($db);
$connect = $connexion->LogOut();

echo 'logedOut';
