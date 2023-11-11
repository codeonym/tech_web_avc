<?php
  require_once("connect.php");

  if(isset($_POST["fetch"])){
    $query="SELECT * FROM $tablename;";
    $stmt=$pdo->prepare($query);
    if($stmt->execute()){
      echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
  }else {
  header("Location: index.php");
  exit();
}
