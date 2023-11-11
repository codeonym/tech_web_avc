<?php 

for($i=11;$i<=36;$i++)
{
$tab[$i]=chr(54+$i);
}

// for V
for($i=11;$i<=36;$i++)
{
echo "Elément d'indice $i : $tab[$i] <br />";
}

$y=66;
$t=&$y;
echo "<br>@@@@@@<br>";
printf("%s",$t);
echo "<br>############################<br>";
// foreach V
foreach($tab as $key => $entry){
  echo "Elément d'indice $key: $entry <br />";
}
