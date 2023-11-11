<?php
// ini_set("display_errors","off");

// 2
function checkdatevalidity($y,$m,$d){
if(checkdate($m,$d,$y) === false){
  return $y."-".$m."-".$d." is invalid";
}else{
  return $y."-".$m."-".$d." is valid";
}
}
// $error=checkdatevalidity(2010,02,29);

// 3
// Rédigez le script qui teste si le 1 Mai 2016 est un vendredi ou un lundi, si oui il
// affiche « Week-end prolongé !».
function getDayOfTheDate($datestr){
  $date=date("l",strtotime($datestr));
  if($date ==="Friday" || $date ==="Monday"){
    return "weekend prolonge";
  }
}
// $error=getDayOfTheDate("01-04-2016");


// 4
// Calculer le temps d’exécution d'un script et la taille de la mémoire.
// pour mesurer le temps d'exécution d'un script PHP avec la fonction microtime() ?
// <?php
// _______p1
function getExTime(){
  $before = microtime(true);
  $i=0;
  while($i<1_000_000_000){
    $i++;
  }
  $after = microtime(true);
  return $after - $before;
}
// $error="execution time : " .getExTime();
// ________p2
function getMimo(){
  $avant = memory_get_usage(true);
  $i=0;
  while($i<10_000_000){
    $foo ="hi";
    $bar = &$foo;
    $bar .=" world";
    $foo.=$bar;
    $i++;
  }
  $après = memory_get_usage(true);
  return $après - $avant;
  // return intval($après) - intval($avant); // en octets
}
$error ="Total memory usage :". getMimo();
// 1
if(isset($_GET["submit"])){
  if(!empty($_GET["date"])){
    try {
      $stat=1;
      $birthDate = date_create($_GET["date"]);
      if(Date("Y") - intval((new DateTime($_GET["date"]))->format("Y")) < 0){
        $stat=0;
      }else{
        $currentDate= date_create((new DateTime())->format('Y-m-d'));
        $ageVals=date_diff($birthDate,$currentDate);
        $age=$ageVals->y."y ".$ageVals->m."m ".$ageVals->d."d";
      }
    if($stat===0){
      throw new Exception("invalid date");
    }
    }catch(Exception $e){
      $error =  $e->getMessage();
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
  <title>AGE</title>
  <script>onload=()=>{
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
  <input type="date" id="search" name="date">
  <button type="submit" name="submit" value="calc">GET AGE</button>
  </form>
  <?php if(isset($age)){?>
  <div class="results flx">
    <h2>Your birth date : <br><?php echo $_GET["date"];?></h2>
    <h3>Your Age : <span><?php echo $age;?></span></h3>
  <?php };?>
  </div>
  </div>
</body>
</html>