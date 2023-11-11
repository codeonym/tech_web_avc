<?php
require_once("connect.php");

if(isset($_POST["delete"])){
  $stmt = $pdo->prepare(' DELETE FROM Etudiants_SMI6 WHERE email = :email');

  $email =  filter_var($_POST["delete"], FILTER_SANITIZE_EMAIL);
  $stmt->bindParam(':email', $email);
  
  // execute the statement
  if($stmt->execute()){
    echo $stmt->rowCount();
    if ($stmt->rowCount() > 0) {
      echo htmlspecialchars("user deleted successfully");
  } else {
      echo htmlspecialchars("failed to delete ");
  }
}
}else {
  exit();
}

