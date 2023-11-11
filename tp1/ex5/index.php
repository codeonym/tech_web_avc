<?php
$x = 2;
// 2
echo "<br>x=".$x;
$y = 3;
//3
echo "<br>y=".$y;
$z = 4;
// 4
echo "<br>z=".$z;
$a = $x + 1;
// 3
echo "<br>a=".$a;
$b = $x + $y;
// 5
echo "<br>b=".$b;
$c = $x - $y;
// -1
echo "<br>c=".$c;
$x = $z += 2 ;
// 6
echo "<br>x=".$x;
$y += $z -= 2;
// 7
echo "<br>y=".$y;
$y /= $z -= 2;
// 3.5
echo "<br>y=".$y;
$a *= 4 + 2;
// 18
echo "<br>a=".$a;
