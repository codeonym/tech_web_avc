<?php

$decimal=fopen("decimal.txt","r");
if($decimal === null){
  exit("file not found");
}else {
  $binaire=fopen("binaire.txt","w");
  if($binaire === null){
    exit("failed to create file");
  }else {
    while(!feof($decimal)){
      $line=fgets($decimal);
      $arr=explode(" ",$line);
      $newArr=[];
      foreach($arr as $num){
        $newArr[]= base_convert($num,10,2);
      };
      $newLine=implode(" ",$newArr);
      fwrite($binaire,$newLine ."\n");
    }
    fclose($binaire);
    fclose($decimal);
  }
}