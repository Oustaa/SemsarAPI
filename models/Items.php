<?php
class House
{
 private $conn;

 function __construct($db)
 {
  $this->conn = $db;
 }

 public function readHome($id)
 {
  $data = [];

  $data['rent'] = $this->readRent($id)->fetchAll(PDO::FETCH_ASSOC);

  $data['buy'] = $this->readBuy($id)->fetchAll(PDO::FETCH_ASSOC);

  return $data;
 }

 public function readRent($id)
 {

  $query = "call readRentData($id)";

  $stmt = $this->conn->prepare($query);

  $stmt->execute();

  return $stmt;
 }

 public function readBuy($id)
 {
  $query = "call readBuyData($id)";

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

 public function readItems($storeId, $userID)
 {
  $query = "CALL readSotreItem(?,?)";
  $stmt = $this->conn->prepare($query);

  $stmt->execute([$storeId, $userID]);

  return $stmt;
 }
}
