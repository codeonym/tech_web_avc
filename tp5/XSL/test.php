<?php
// $x = array_fill(3,4,"widad");
// /*
// Array(
//   [3] => "Widad",
//   [4] => "Widad",
//   [5] => "Widad",
//   [6] => "Widad",
// )
// */ 
// $y = array_fill(0,1,"Taraji");
// /*
// Array(
//   [0]=>"Taraji"
// )
// */ 
// print($x);
// // warning array to string conversion
// //Array
// echo "<br>";
// print($y);
// // warning array to string conversion
// //Array
// echo "<pre>";
// print_r($x);
// echo "=======";
// print_r($y);
// echo "</pre>";



// $couleur= "rouge";
// print "les roses sont $couleur";
// // les roses sont rouge
// print "<br>";
// print 'les roses sont $couleur';
// // les roses sont $couleur
// print "<br>";
// $a=array("Roses"=>"3");
// print "il y'a " . $a['Roses'] . " $couleur.";
// // il ya 3 rouge.


// define("SALUTAION","Bonjour SMIS6!",true);
// echo SaLUTAION;

$titres = Array(
  [
    "Titre" => "Les dix petits negres ",
    "CLE_auteur" => 1,
    "Nb_pages" => 254 
  ],
  [
    "Titre" => "Champolion l'Egyptien",
    "CLE_auteur" => 2,
    "Nb_pages" => 389
  ],
  [
    "Titre" => "La femme sage",
    "CLE_auteur" => 2,
    "Nb_pages" => 439 
  ],
  [
    "Titre" => "La cinquième montagne",
    "CLE_auteur" => 3,
    "Nb_pages" => 297 
  ],
  [
    "Titre" => "Le démon et Mademoise",
    "CLE_auteur" => 3,
    "Nb_pages" => 332 
  ],
  [
    "Titre" => "L'ile mystèrieuse",
    "CLE_auteur" => 4,
    "Nb_pages" => 642 
  ],
  [
    "Titre" => "Les Confessions",
    "CLE_auteur" => 5,
    "Nb_pages" => 589 
  ],
  [
    "Titre" => "Lettres",
    "CLE_auteur" => 6,
    "Nb_pages" => 432 
  ],
  [
    "Titre" => "Le mystère de la chambre jaune ",
    "CLE_auteur" => null,
    "Nb_pages" => 412 
  ],
);

$auteurs = Array(
  [
    "CLE_auteur" => 1 ,
    "Auteur" => "Agata Christie"
  ],
  [
    "CLE_auteur" => 2 ,
    "Auteur" => "Christian Jacq"
  ],
  [
    "CLE_auteur" => 3 ,
    "Auteur" => "Paulo Coelho"
  ],
  [
    "CLE_auteur" => 4 ,
    "Auteur" => "Jules Verne"
  ],
  [
    "CLE_auteur" => 5 ,
    "Auteur" => "Jean-Jacques Rousseau"
  ],
  [
    "CLE_auteur" => 6 ,
    "Auteur" => "Madame de Sévigné"
  ],
);
echo "
<table border=1 cellspacing=0 cellpadding=20>
  <thead>
    <tr>
      <th>N°</th>
      <th>Titre</th>
      <th>Auteur</th>
    </tr>
  </thead>
  <tbody>
";
function getAuteur(int $cle):?string{
  global $auteurs;
  foreach($auteurs as $auteur ):
    if($auteur["CLE_auteur"] === $cle):
      return $auteur['Auteur'];
    endif;
  endforeach;
  return null;
}
$totalRows = 0;
foreach($titres as $titre): 
  if($titre["CLE_auteur"] && $auteur = getAuteur($titre["CLE_auteur"])):
    $totalRows ++;
    echo "
    <tr>
      <td>{$totalRows}</td>
      <td>{$titre['Titre']}</td>
      <td>{$auteur}</td>
    </tr>
    ";
  endif;
endforeach;
echo "
    </tbody>
</table>
Nombre de lignes retournées : {$totalRows}
    ";
    ?>

  <table border=1 cellspacing=0 cellpadding=20>
  <thead>
    <th>N°</th>
    <th>Auteur</th>
    <th>Nb titres</th>
  </thead>
    <tbody>
      <?php
      $totalTitres = static function(int $cle):int {
        $total = 0;
        global $titres;
        foreach ($titres as $titre):
          if($cle === $titre["CLE_auteur"]):
            $total ++;
          endif;
        endforeach;
        return $total;
      };
      usort($auteurs,static fn($a,$b)=>strcmp($a['Auteur'],$b['Auteur']));
      foreach($auteurs as $key => $auteur): ?>
        <tr>
        <td><?php echo ($key + 1) ?></td>
        <td><?php echo $auteur["Auteur"] ?></td>
        <td><?php echo $totalTitres($auteur['CLE_auteur']) ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>