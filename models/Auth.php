<?php

class Connexion
{

 function __construct($db)
 {
  $this->conn = $db;
 }

 public function logIn($username, $password)
 {
  $query = "SELECT id, username FROM users WHERE username = ? AND password = ?";

  $stmt = $this->conn->prepare($query);

  $stmt->execute([$username, $password]);

  if ($stmt->rowCount() != 0) {
   $result = $stmt->fetch(PDO::FETCH_ASSOC);

   return $result;
  } else {
   return '';
  }
 }


 public function SingIn($data)
 {
  $query = "CALL insertUser(?,?,?,?,?,?,?)";

  $stmt = $this->conn->prepare($query);

  $stmt->execute(array_values($data));

  return $stmt;
 }
}
