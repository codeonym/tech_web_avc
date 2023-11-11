<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
function uploadOk($file,$targetFile,$fileType){
  $uploadok=1;

  // check size
  if ($file["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
  // check if the file is really an image
  if(getimagesize($file) !== false ){
    $uploadok=1;
  }
  if(file_exists($targetFile)){
    $uploadok=0;
  }

  // limiting types types
  if($fileType !== 'doc'  && $fileType !== 'pdf'){
    $uploadok=0;
  }

  return $uploadok;
}
  function santizeArray($arr){
      $arr2=[];
      foreach($arr as $entry){
        $arr2[]=trim(filter_var($entry, FILTER_SANITIZE_SPECIAL_CHARS));
      }
      return $arr2;
    };

if(isset($_POST["submit"])){
  // var_dump(filter_var("nn/;.", FILTER_VALIDATE_EMAIL));

  $data = [
    "firstName" => filter_var(trim($_POST["firstName"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "lastName" => filter_var(trim($_POST["lastName"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "email" => filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL) !== false? str_replace(["@","."],["[AT]","[DOT]"],$_POST["email"]) : "unset",
    "gender" => filter_var(trim($_POST["gender"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "domain" => filter_var(trim($_POST["domain"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "country" => filter_var(trim($_POST["country"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "languages" => santizeArray($_POST['languages'])
  ];
  $file=fopen("etudiants.txt","a");
  if($file === null){
    unset($data);
  }else {
    $datacp=$data;
    $datacp["languages"]=implode("-",$datacp["languages"]);
    $str="";
    $str.=implode(";",$datacp);
    unset($datacp);
    fwrite($file,$str."\n");
    fclose($file);
  }


  $target_dir=__DIR__."/../cv/";
  $target_files=[];
  for($i=0;$i<count($_FILES["img"]["name"]);$i++){
    array_push($target_files,[
      "name" => $target_dir.basename($_FILES["img"]["name"][$i]),
      "tmp_name" => $_FILES["img"]["tmp_name"][$i],
      "type" => strtolower(pathinfo($_FILES["img"]["name"][$i], PATHINFO_EXTENSION)),
      "uploadok"=> uploadOk($_FILES["img"]["tmp_name"][$i],$target_dir.basename($_FILES["img"]["name"][$i]),strtolower(pathinfo($_FILES["img"]["name"][$i], PATHINFO_EXTENSION)))
  ]);
  }

    try {
      foreach($target_files as $file){
    if($file["uploadok"]===1){
      if(move_uploaded_file($file["tmp_name"],$file["name"])){
      }else {
        throw new Exception("Something went wrong : some files did not upload");
      }
    }else {
        throw new Exception("Something went wrong : some files already existes");
      }
  }
  }catch(Exception $e){
    $error=$e->getMessage();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data</title>
  <link rel="stylesheet" href="traitement.css">
</head>
<body class=flx>
<?php if(isset($data)){?>
  <div class="card flex">
  <div class=" card-ti flx">
  <img src="./address-card.svg" alt="">
    <h1>INSCRIPTION <br> TP N°3 TECH WEB AVC<br> SMIS6</h1>
  </div>
  <table border=0 cellspacing=0>
    <tr>
      <td>Champs</td>
      <td>Valeurs</td>
    </tr>
    <tr>
      <td>Nom</td> 
      <td><?php echo $data["firstName"]?></td>
    </tr>
    <tr>
      <td>Prénom</td>
      <td><?php echo $data["lastName"]?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["email"]?></td>
    </tr>
    <tr>
      <td>Sexe</td>
      <td><?php echo $data["gender"]?></td>
    </tr>
    <tr>
      <td>Domain</td>
      <td><?php echo $data["domain"]?></td>
    </tr>
    <tr>
      <td>Pays</td>
      <td><?php echo $data["country"]?></td>
    </tr>
    <tr>
      <td>langages</td>
      <td><?php  foreach($data["languages"] as $lang){echo $lang." ";}?></td>
    </tr>
  </table>
  </div>
  <?php } else {?>
    <div class="error-container flx">
      <div class="error flx">
        <h1>Page Not Found</h1>
        <p>This Page Is Curently Unavailable.<span> Please try Again later .</span></p>
      </div>
    </div>
    <?php }?>
</body>
</html>