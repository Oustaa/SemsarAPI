<?php


class House
{
 private $conn;
 private $table = 'item';
 private $id;

 function __construct($db)
 {
  $this->conn = $db;
 }

 public function read($get)
 {
  $id = (isset($_SESSION['userId'])) ? $_SESSION['userId'] : 0;

  // foreach ($_GET as $key => $value) {
  //  echo $key . "=" . $value;
  // }
  $query = "SELECT r.id, r.title,r.description,r.added_at,r.price,r.Adress,r.id in (SELECT favorite.ItemId FROM favorite  WHERE favorite.userId = $id) as liked, t.label,i.url as img
  FROM item r
  INNER JOIN typs t
  INNER JOIN imgs i
  ON r.id = i.Product_id
  WHERE t.typeid = r.contractId && r.id = i.Product_id
  GROUP BY r.id
  ";
  $stmt = $this->conn->prepare($query);

  $stmt->execute();

  return $stmt;
 }

 public function readSingle($itemId)
 {
  $query = "SELECT * FROM item WHERE id = :id";

  $stmt = $this->conn->prepare($query);

  $stmt->bindParam(":id", $itemId);

  $stmt->execute();

  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return $row;
 }
}
