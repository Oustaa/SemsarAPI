<?php
class Like
{
 private $conn;

 function __construct($db)
 {
  $this->conn = $db;
 }

 public function likeItem($ItemId, $userId)
 {

  $query = "INSERT INTO favorite VALUES(?,?)";

  $stmt = $this->conn->prepare($query);

  $stmt->execute([$userId, $ItemId]);
 }

 public function dislikeItem($ItemId, $userId)
 {
  $query = "DELETE FROM favorite WHERE userId = ? AND ItemId =  ?";

  $stmt = $this->conn->prepare($query);

  // $stmt->bindParam(1, $this->userId);
  // $stmt->bindParam(2, $this->ItemId);

  $stmt->execute([$userId, $ItemId]);
 }
}
