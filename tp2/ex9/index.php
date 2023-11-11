<?php
  // header("WWW-Authenticate: Basic realm='private'");

// Donnez un script pour pouvoir détecter l'identité de la personne concernée au moment
// de la saisie du mot de passe. Pour cela on donnera un mot de passe différent à chaque
// utilisateur. écrire un script dans lequel les renseignements sont rangés dans un tableau
// de chaînes de caractères, une chaîne par personne, présentée sous la forme « vrai
// nom/nom d'utilisateur/mot de passe », après une identification réussie le nom de
// l’utilisateur est affiché sur la page résultat.

$authenticatedUsers=
[
  "ayoub/admin/admin",
  "mohammed/user0/user0",
  "said/user1/user1",
  "nabil/user3/user3"
];
if(!isset($_SERVER["PHP_AUTH_USER"])){
  header("WWW-Authenticate: Basic realm='private'");
  header("HTTP/1.0 401 Unauthorized");
    echo "credentials not provided";
    exit;
}else{
  $providedUser=$_SERVER["PHP_AUTH_USER"];
  $providedPassword=$_SERVER["PHP_AUTH_PW"];
  foreach($authenticatedUsers as $str){
    $user=explode("/",$str);
    if (($providedUser==$user[1]) && ($providedPassword==$user[2])) {
      echo "
      <h1 data-cont='BRAVO'>Bravo</h1>
      <h3>identification réussie</h3>
      <h2>Bonjour <span> ".$user[0]."</span></h2>";
    break;
  } else {
    // header("WWW-Authenticate: Basic realm='private'");
}
}
}


// if (($PHP_AUTH_USER=="etudiantSMIS6") && ($PHP_AUTH_PW=="SMIS6")) {
// echo "Bravo, identification réussie.\n";
// } else {
// header("WWW-Authenticate: Basic realm='private'");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Private</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
</body>
</html>