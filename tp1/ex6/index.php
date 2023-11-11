<?php

// Rédiger une expression conditionnelle pour tester si un nombre est à la fois un multiple de 7 et
// de 5. Testez avec les variable x=35, 7350, 1425.

function isMulti($x){
  return $x % 5 ===0 && $x % 7 ===0 ? "oui":"non";
}

echo "<br>Test Pour  Nombre 35   ".isMulti(35);
echo "<br>Test Pour  Nombre 7350   ".isMulti(7350);
echo "<br>Test Pour  Nombre 1425   ".isMulti(1425);
