<?php
  require_once("connect.php");
if(isset($_POST["submit"])){
  // var_dump(filter_var("nn/;.", FILTER_VALIDATE_EMAIL));

  

  $firstname=trim($_POST["firstName"]);
  $lastname=trim($_POST["lastName"]);
  $email=trim(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
  $stmt=$pdo->prepare("SELECT  * FROM $tablename WHERE ( email=:email ) OR ( firstname=:firstname && lastname=:lastname ); ");
  $stmt->bindParam(":firstname",$firstname);
  $stmt->bindParam(":lastname",$lastname);
  $stmt->bindParam(":email",$email);
  if($stmt->execute()){
    if($stmt->rowcount()>0){
      die("already  exists");
    };
  };	
  $stmt=$pdo->prepare("INSERT INTO  $tablename (firstname,lastname,email) values(:firstname,:lastname,:email)");
  $stmt->bindParam(":firstname",$firstname);
  $stmt->bindParam(":lastname",$lastname);
  $stmt->bindParam(":email",$email);
  if($stmt->execute()){
    echo "saved to db";
  } ;
  $stmt=$pdo->prepare("SELECT * FROM $tablename;");
if($stmt->execute()) {
  $datas=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data</title>
  <link rel="stylesheet" href="traitement.css">
</head>
<body class=flx>
  <div class="card flex">
  <div class=" card-ti flx">
  <img src="./address-card.svg" alt="">
    <h1>INSCRIPTION <br> ETUDIANTS<br> 2022-2023 | SMIS6</h1>
  </div>
  <div class="table">
  <table border=0 cellspacing=0>
    <tr>
      <td>Nom</td> 
      <td>Prénom</td>
      <td>Email</td>
      <td>Date reg</td>
    </tr>
    <?php if($stmt->rowCount() > 0){
      foreach($datas as $data){ ?>
    <tr>
      <td><?php echo $data["firstname"]?></td>
      <td><?php echo $data["lastname"]?></td>
      <td><?php echo $data["email"]?></td>
      <td><?php echo $data["reg_date"]?></td>
    </tr>
    <?php }}?>
  </table>
  </div>
  </div>
  <?php }} else {?>
    <div class="error-container flx">
      <div class="error flx">
        <h1>Page Not Found</h1>
        <p>This Page Is Curently Unavailable.<span> Please try Again later .</span></p>
      </div>
    </div>
    <?php }?>
</body>
</html>