<?php
$x="Oracle" ;
$y= "MySQL";
$z=$x;
$x="PHP 5";
$y=$x;
$var1 =10 ;
$var2=&$var1;
$var3=$var1;
echo "x=".$x."<br>y=".$y."<br>z=".$z."<br>var1=".$var1."<br>var2=".$var2."<br>var3=".$var3;
echo "<br>###############<br>";
print("x=".$x."<br>y=".$y."<br>z=".$z."<br>var1=".$var1."<br>var2=".$var2."<br>var3=".$var3);