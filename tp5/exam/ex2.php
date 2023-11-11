<?php
session_start();
$filename = "visiteurs.txt";
$user_status = $_SESSION['is_online'] ?? false;

if($user_status === false):
if(!($file  = fopen($filename,"a+"))):
  die("cant find file");
  else : 
    $line = fgets($file);
    $line = !empty($line) ? $line : "totalVisitors:0";
    $line = explode(":",$line);
    $line[1] = +$line[1] + 1;
    $line = implode(":",$line);
    ftruncate($file,0);
    rewind($file);
    fwrite($file,$line);
    fclose($file);
    $_SESSION['is_online'] = true;
endif;
endif;
