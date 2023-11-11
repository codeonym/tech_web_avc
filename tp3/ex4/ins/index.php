<?php
// ini_set("display_errors","off");
// Ecrire un script PHP qui va afficher les noms des répertoire de votre disque C :/ et
// c:/easyphp/www/.
// Créer dans www un dossier /images, puis copiez des images au JPG dans ce répertoire
// Ecrire un script Php qui affichera tous les images de ce dossier.

if(isset($_GET["submit"])){
  if(!empty($_GET["email"])){
    $keyword = filter_var(trim($_GET["email"]), FILTER_VALIDATE_EMAIL) !== false? str_replace(["@","."],["[AT]","[DOT]"],$_GET["email"]) : "";
    if(!empty($keyword)){
      header("Location:app.php/?keyword=".$keyword);
    }else {
      $error="Something Went Wrong : Invalid Keyword";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>DIR</title>
  <script>onload=()=>{
  document.getElementById("search").focus();

  let alert=document.querySelector(".alert.error") || "";
  let alertBtn=document.querySelector(".alert button");
  if(alert !== ""){
    alert.style.cssText=`transform:translate(-50%, -50%);`;
    alertBtn.onclick=(function(){
      alert.style.cssText=`transform:translate(-500%, -50%);`;
    })
  }
}</script>
</head>
<body class="flx">
  <?php 
  if(isset($error)){
    ?>
  <div class="alert error flx">
    <h3><?php echo $error; ?></h3>
    <button></button>
  </div>
  <?php
  } ?>
  <div class="container flx">
  <form class="flx">
  <input type="search" id="search" name="email" placeholder="search here...">
  <button type="submit" name="submit" value="list">search</button>
  </form>
  </div>
  <?php require '../nav.php'?>
</body>
</html>