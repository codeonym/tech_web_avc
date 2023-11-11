<?php
// 1
// Rédigez un script PHP qui permet de tester si une chaîne ne contient que de lettres.
// utiliser la fonction ctype_alpha qui vérifie si une chaîne est alphabétique ou non.
function checkAlphaType($str){
  return ctype_alpha($str) === true ? "alpha chars":"mixed chars";
};
$result=0;
$result=checkAlphaType("hellothereisevErythingokey");

// 2
// Ecrire un script qui teste si une chaîne de caractères contient le caractère '@' (le cas
// d'une adresse e-mail). Tester avec email : tecweb@gmail.com puis avec
// tecwebgmail.com@ quelle est votre remarque pour ce test simple?
function mailValidation($str){
  $testRes=false;
  for($i=0;$i<strlen($str);$i++){
    if($str[$i] === '@'){
      $testRes=true;
      break;
    }
  }
  return $testRes===true? "contains \"@\"":"doesn't contains \"@\"";
}
// $result=mailValidation("tecweb@gmail.com");
// $result=mailValidation("tecwebgmail.com@");

// 3
// Réécrire ce script (qui est insuffisant pour une adresse email) maintenant avec la
// fonction strpos qui renvoie la position de la première occurrence d'une sous-chaîne
// dans une chaîne et renvoie false si elle ne trouve aucune occurrence.
function strContains($str,$substr){
  // return strpos($str,$substr); // prototyping
  $j=0;
  $pos= Array();
  for($i=0;$i<strlen($str);$i++){
    if(count($pos) === strlen($substr)) break;
    if($str[$i] === $substr[$j]){
      $pos[$j] = $i ;
      $j++;
    }else{
      $j=0;
      $pos=[];
    }
  }
  return empty($pos)===false?$pos['0']:"";
}
// $result=strContains("hiya to yall","to");

// 4
// Utiliser les expressions régulières pour vérifier si une chaîne de caractères correspond
// à:
// 4-1
// • Un numéro de téléphone qui contient tous les numéros sous la forme : 00 00
// 00 00 00 ou 06-61-00-00-00
function phoneVerification( $number){
  $regExpr1= "/^[0-9][0-9](\-[0-9][0-9]){3}\-[0-9][0-9]$/i";
  $regExpr2= "/^[0-9][0-9](\s[0-9][0-9]){3}\s[0-9][0-9]$/i";
  return preg_match($regExpr1,$number) == "1"  || preg_match($regExpr2,$number) == "1"? "pattern matches":"pattern does not match";
}
// $result=phoneVerification( "06-27-04-92-64");
// $result=phoneVerification( "06 27 04 92 64");

// 4-2
// Un code de la CIN qui commence par 3 lettres et se termine par 5 chiffres
// (exemple "abc87057").
function cinVerification($cin){
  $regExpr= "/^[a-zA-Z]{3}[0-9]{5}$/i";
  return preg_match($regExpr,$cin) == "1"? "pattern matches":"pattern does not match";
}
// $result=cinVerification("FCC12135");


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TESTINGS</title>
  <style>
    * {
      padding:0;
      margin:0;
      box-sizing:border-box;
    }
    body {
      color:indianred;
      min-height:100vh;
      background-color: #333;
      color:#f5f5f5;
      display:flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      background-image:linear-gradient(to bottom,transparent 50%, #fff 50%);
    }
    .container {
      display:flex;
      position:relative;
      align-items: center;
      justify-content: center;
      gap:20px;
      text-transform:uppercase;
      font-size:1.5rem;
      background:#00b5f9;
      padding: 3rem 10rem;
      outline:5px solid #00b5f9;
      outline-offset:10px;
      font-weight:900;
    }

  </style>
</head>
<body>
  <div class="container">
    <div>
      YOUR ESTIMATED RESULT IS :
    </div>
    <div><?php echo $result?></div>
  </div>
</body>
</html>
