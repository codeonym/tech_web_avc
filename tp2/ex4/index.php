<?php

// V1
$stat=false;
$var=77;
while(!$stat){
  $rn=rand(0,1000);
  if($rn % $var ===0){
    $stat=true;
  }
}
echo "V1<br> the multiplier of ".$var." is ".$rn;
// V2
do {
  $rn=rand(0,1000);
}while($rn % $var !==0);
echo "<br>V2<br> the multiplier of ".$var." is ".$rn;
