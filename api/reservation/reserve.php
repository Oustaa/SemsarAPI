<?php

header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Stores.php';

// bookReservation
$database = new Database();
$db = $database->connect();

// $,$dateEnd,$itemRes,$userRes

if(isset($_GET["dateStart"]) && !empty($_GET["dateStart"]) && 
   isset($_GET["dateEnd"]) && !empty($_GET["dateEnd"]) &&
   isset($_GET["itemRes"]) && !empty($_GET["itemRes"]) &&
   isset($_GET["userRes"]) && !empty($_GET["userRes"]) 
){
 // echo $_GET["dateStart"] . "" .$_GET["dateEnd"] . "" .$_GET["itemRes"] . "" .$_GET["userRes"] ;

 $store = new Store($db);
 $store->bookReservation($_GET["dateStart"],$_GET["dateEnd"],$_GET["itemRes"],$_GET["userRes"])
;}