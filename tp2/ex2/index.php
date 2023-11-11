<?php
$x;
$y;
$z;
do {
  $x=rand(0,1000);
  if($x % 2 ===0){
    $y=rand(0,1000);
    if($y % 2 !==0){
      $z=rand(0,1000);
      if($z %2 !== 0){
        echo "la suite est :".$x." ".$y." ".$z;
        break;
      }
    }
}
}while(true);