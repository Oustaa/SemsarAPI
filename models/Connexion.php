<?php

class Connexion
{

 function __construct($db)
 {
  $this->conn = $db;
 }

 public function isConnected()
 {
  $data = [];

  if (isset($_SESSION['userId']) && !empty($_SESSION['userId'])) {
   $data['username'] = $this->getUserName($_SESSION['userId']);
   $data['id'] = $_SESSION['userId'];
  }

  return $data;
 }

 public function connect($username, $password)
 {
  $query = "SELECT * FROM users WHERE username = ? AND password = ?";

  $stmt = $this->conn->prepare($query);

  $stmt->execute([$username, $password]);

  if ($stmt->rowCount() != 0) {
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
   $_SESSION['userId'] = $result['id'];
   return $result['id'];
  } else {
   return '';
  }
 }

 public function getUserName($id)
 {
  $query = "SELECT username from users WHERE id = ?";

  $stmt = $this->conn->prepare($query);

  $stmt->execute([$id]);

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return $result['username'];
 }

 public function LogOut()
 {
  unset($_SESSION['userId']);
  session_destroy();
 }
}
