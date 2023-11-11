<?php

// V1
$rayon=20;
$hauteur=60;
$volume = $rayon * $rayon * 3.14 * $hauteur * (1/3) ;
echo $volume;
// V2
function getVolum($r,$h){
  return $r*$r*3.14*$h*(1/3);
}

echo "<br>".getVolum(20,60);