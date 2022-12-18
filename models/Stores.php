<?php


class Store
{
 private $conn = null;

 public function __construct($db)
 {
  $this->conn = $db;
 }

 public function createStore($data)
 {
  $query = "CALL Create_Store(?,?)";

  $stmt = $this->conn->prepare($query);

  try {
   $stmt->execute(array_values($data));
   echo ("Store Created..");
  } catch (Exception $e) {
   echo "You cant Create More Than 1 store with one acount";
  }
 }

 public function StoreInfo($storeId)
 {

  $query = "SELECT * FROM stores WHERE Store_Id = ?";
  $stmt = $this->conn->prepare($query);
  $stmt->execute([$storeId]);
  $result['storeInfo'] = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result;
 }

 public function bookReservation ($dateStart,$dateEnd,$itemRes,$userRes) {
  echo $dateStart . " " . $dateEnd . " " . $itemRes . " " .$userRes;

  $query = "call BookReservation(?,?,?,?)";

  $stmt = $this->conn->prepare($query);

  $stmt->execute([$dateStart,$dateEnd,$itemRes,$userRes]);

 }

}
