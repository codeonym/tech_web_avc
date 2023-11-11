<?php

$server="localhost";
  $dbname="SMIS6-2023";
  $username="root";
  $password="root";
  $tablename="Etudiants_SMI6";
  try{
    $pdo=new PDO('mysql:host='.$server.';dbname='.$dbname,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  
    
  }catch(PDOException $e){
    echo "Error: ".$e->getMessage();
    exit;
  }
  