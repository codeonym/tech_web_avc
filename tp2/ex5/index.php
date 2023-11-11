<?php
$tab=[];
for($i=0;$i<63;$i++)$tab[$i]=$i+1;
// echo "<pre>";
// var_dump($tab);
// echo "</pre>";


// echo "#############################";
$tabClone=[];
foreach($tab as $key=>$entry) $tabClone[$key]=$key/10;
// echo "<pre>";
// print_r($tabClone);
// echo "</pre>";


// echo "##############################";
$assocTab=[];
foreach($tabClone as $entry) $assocTab["$entry"] = sin($entry);
// echo "<pre>";
// print_r($assocTab);
// echo "</pre>";

//######TABLEAU###########
echo "<table style='text-align:center;border-color:transparent;width:80%;border:2px solid #000;color:#777;background:#eee;margin:100px auto;'>";
echo "
<tr style='background:#f05454;color#fff;padding:20px 50px;margin:5px'>
  <td style='padding:20px 50px;margin:5px'>keys</td>
  <td>vals</td>
</tr>
";
foreach($assocTab as $key => $entry){
  echo "
  <tr>
    <td>$key</td>
    <td>$entry</td>
  </tr>
  ";
}
echo "</table>";


// part 2

$assocTabNew=[
  "Mercedes"=>"C220",
"Dacia"=>"Sandero",
"Fiat"=>"127" ,"BMW"=>"X5",
];
echo array_key_exists("Fiat",$assocTabNew)? "existe":"non existe";