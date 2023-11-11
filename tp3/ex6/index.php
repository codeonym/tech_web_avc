<?php
// 1__________
// Ecrire un script qui vérifie si les cookies sont activés, puis crée un cookie et afficher
// la. Regarder l’url du cookie
session_start();
function script1(){
  echo "<pre>";
if(isset($_COOKIE["test"])){
  echo "The Cookie is set : ".$_COOKIE["test"]."<br>";
  echo "Cookie URl : ".$_SERVER["REQUEST_URI"];
}else {
  echo "The Cookie is  not set ";
  setcookie("test", rand(100,1000));
}
echo "</pre>";

};


// La valeur du cookie est automatiquement encodée en URL lors de l'envoi du cookie et
// automatiquement décodée lors de sa réception (pour empêcher l'encodage d'URL,
// utilisez plutôt setrawcookie() tester cette fonction et comparer la avec la setcookies
// fonction.
// function script2(){
// // setcookie("test","",time() -100);
// // setcookie("testraw","", time() -100);
// if(isset($_COOKIE["test"]) && isset($_COOKIE["testraw"])){
//   echo "The Cookie is set : ".$_COOKIE["test"]."<br>";
//   echo "The raw Cookie is set : ".rawurldecode($_COOKIE["testraw"])."<br>";
// }else {
//   $cookieval="hello this a test for raw cookies";
//   echo "The Cookie is  not set ";
//   setcookie("test",$cookieval);
//   setrawcookie("testraw",rawurlencode($cookieval));
// }
// }

if(isset($_POST["submit"])) {

  $_SESSION["primary"] = isset($_POST["primary"]) ? $_POST["primary"]:"#eee";
  $_SESSION["secondary"] = isset($_POST["secondary"]) ? $_POST["secondary"]:"#00c4";

}
$primary = isset($_SESSION["primary"]) ? $_SESSION["primary"]:"#eee";
$secondary = isset($_SESSION["secondary"]) ? $_SESSION["secondary"]:"#00c4";

/** TESTING
  * script1();
  * script2();
**/

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>preferences</title>
  <style>
    :root {
      --col-primary:<?php echo $primary; ?>;
      --col-secondary:<?php echo $secondary; ?>;
    }
  </style>
  <link rel="stylesheet" href="style.css">
</head>
<body class="flx">
  <form class="flx" action="" method=post>
    <div class="field flx">
    <label for="primary">primary :</label>
    <input type="color" name="primary" value="<?php echo $primary; ?>" id="primary">
    </div>
    <div class="field flx">
    <label for="secondary">secondary :</label>
    <input type="color" name="secondary" value="<?php echo $secondary; ?>" id="secondary">
    </div>
    <input class="field" type="submit" value="save" name="submit">
  </form>
</body>
</html>