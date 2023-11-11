<?php

// $_SERVER['PHP_SELF'] Renvoie le nom de fichier du script en cours d'exécution
// $_SERVER['SERVER_ADDR'] Renvoie l'adresse IP du serveur hôte
// $_SERVER['SERVER_NAME'] Renvoie le nom du serveur hôte (tel que www.w3schools.com)
// $_SERVER['SERVER_SOFTWARE'] Renvoie la chaîne d'identification du serveur (comme
// Apache/2.2.24)
// $_SERVER['SERVER_PROTOCOL'] Renvoie le nom et la révision du protocole d'information (tel que
// HTTP/1.1)
// $_SERVER['HTTP_HOST'] Renvoie l'en-tête Host de la requête en cours
// $_SERVER['HTTP_REFERER'] Renvoie l'URL complète de la page en cours (non fiable car tous les useragents ne la supportent pas)
// $_SERVER['REMOTE_ADDR'] Renvoie l'adresse IP à partir de laquelle l'utilisateur visualise la page
// cours
// $_SERVER['REMOTE_HOST'] Renvoie le nom de l'hôte à partir duquel l'utilisateur visualise la page
// $_SERVER['REMOTE_PORT'] Renvoie le port utilisé sur la machine de l'utilisateur pour communiquer
// avec le serveur Web
// $_SERVER['SCRIPT_FILENAME'] Renvoie le chemin absolu du script en cours d'exécution
// $_SERVER['SERVER_PORT'] Renvoie le port sur la machine serveur utilisé par le serveur Web pour la
// communication (tel que 80)
// $_SERVER['SERVER_SIGNATURE'] Renvoie la version du serveur et le nom de l'hôte virtuel qui sont
// ajoutés aux pages générées par le serveur
// $_SERVER['PATH_TRANSLATED'] Renvoie le chemin basé sur le système de fichiers vers le script actu
// $_SERVER['SCRIPT_NAME'] Renvoie le chemin du script courant
// $_SERVER['SCRIPT_URI'] Renvoie l'URI de la page en cours.

//######TABLEAU###########
echo "<table style='text-align:center;border-color:transparent;width:80%;border:2px solid #000;color:#555;background:#eee;margin:100px auto;'>";
echo "
<tr style='background:#f05454;color#fff;padding:20px 50px;margin:5px'>
  <td style='padding:20px 50px;margin:5px'>keys</td>
  <td>vals</td>
</tr>";
foreach($_SERVER as $key => $val){
  echo "
  <tr>
    <td>$key</td>
    <td>$val</td>
  </tr>
  ";
}

echo "</table>";

echo "<br>#############################################################<br>";
echo "Aujourd’hui nous sommes " . date("Y/m/d") . "<br>";
echo " Aujourd’hui nous sommes " . date("Y.m.d") . "<br>";
echo " Aujourd’hui nous sommes " . date("Y-m-d") . "<br>";
echo " Aujourd’hui nous sommes " . date("l");
echo "<br>temps " . date("h:i:sa");
$startDate = strtotime("saturday");
$endDate = strtotime("+6 weeks", $startDate);
while ($startDate < $endDate) {
echo date("M d", $startDate) . "<br>";
$startDate = strtotime("+1 week", $startDate);
}