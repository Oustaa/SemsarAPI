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

 public function read($id)
 {

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
  // Get Info
  $queryItem = "SELECT * FROM item WHERE id = :id";
  $stmt = $this->conn->prepare($queryItem);
  $stmt->bindParam(":id", $itemId);

  $stmt->execute();
  $row['info'] = $stmt->fetch(PDO::FETCH_ASSOC);

  // Get imgs
  $queryimg = "SELECT url,id FROM imgs 
  WHERE Product_id = :id";
  $stmtimg = $this->conn->prepare($queryimg);
  $stmtimg->bindParam(":id", $itemId);
  $stmtimg->execute();
  $row['img'] = $stmtimg->fetchAll(PDO::FETCH_ASSOC);

  $queryItem = "SELECT comments.Text,comments.Comment_Id FROM `comments`
  WHERE Product_id = :id";
  $stmtimg = $this->conn->prepare($queryItem);
  $stmtimg->bindParam(":id", $itemId);
  $stmtimg->execute();
  $row['Comments'] = $stmtimg->fetchAll(PDO::FETCH_ASSOC);

  return $row;
 }
}
