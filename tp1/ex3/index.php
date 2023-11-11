<?php
$x="PHP5";
$a[]=&$x;
var_dump($a);
$y=" 5 eme version de PHP";
$z=$y*10;
echo "<br>".$z;
$x.=$y;
echo "<br>".$x;
$y*=$z;
echo "<br>".$y;
$a[0]="MySQL";
var_dump($a);