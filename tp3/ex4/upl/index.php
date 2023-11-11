<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
  function santizeArray($arr){
      $arr2=[];
      foreach($arr as $entry){
        $arr2[]=trim(filter_var($entry, FILTER_SANITIZE_SPECIAL_CHARS));
      }
      return $arr2;
    };

if(isset($_POST["submit"])){
  // var_dump(filter_var("nn/;.", FILTER_VALIDATE_EMAIL));
  $tmp=explode(".",$_FILES["img"]["name"]);
  $data = [
    "firstName" => filter_var(trim($_POST["firstName"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "lastName" => filter_var(trim($_POST["lastName"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "email" => filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL) !== false? str_replace(["@","."],["[AT]","[DOT]"],$_POST["email"]) : "unset",
    "gender" => filter_var(trim($_POST["gender"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "domain" => filter_var(trim($_POST["domain"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "country" => filter_var(trim($_POST["country"]), FILTER_SANITIZE_SPECIAL_CHARS),
    "languages" => santizeArray($_POST['languages']),
    "extension" => end($tmp)
  ];
  unset($tmp);
  $file=fopen(__DIR__."/../etudiants.txt","r");
  if($file === null){
    unset($data);
  }else {
    $ifExists = false;
    while(!feof($file)){
      $line=fgets($file);
      $arr=explode(";",$line);
      if(array_search($data["email"],$arr))
        $ifExists = true;
    };
    if($ifExists == false){
      fclose($file);
    $file=fopen(__DIR__."/../etudiants.txt","a");
    $datacp=$data;
    $datacp["languages"]=implode(" ",$datacp["languages"]);
    $str="";
    $str.=implode(";",$datacp);
    unset($datacp);
    fwrite($file,$str."\n");
    fclose($file);

    $target_dir=__DIR__."/../cv/";
    $target_file=$_FILES["img"];
    if ($target_file["error"] > 0) {
      $error = $error="Oops! Something Went Wrong : Error :" . $_FILES["file"]["error"] . "<br>";
    }else {
    $target_file_name=$target_file["name"];
    $target_file_size=$target_file["size"];
    $target_file_path=$target_dir.basename($target_file_name);
    $target_file_tmp_name=$target_file["tmp_name"];
    $allowedExts=["pdf","doc","docx"];
    $tmp=explode(".",$target_file_name);
    $target_file_extension=end($tmp);
    $target_file_type=$target_file["type"];
    $okupload=1;

    // check file type pdf,doc
    if(!($target_file_type === "application/pdf" 
    || $target_file_type === "application/msword" 
    || $target_file_type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){ //docx
      $okupload=0;
    }

    // check file size MAX-WIDTH=5MB
    if($target_file_size > 5000000){
      $okupload=0;
    }

    // check file extension
    if(!in_array($target_file_extension,$allowedExts)){
      $okupload=0;
    }
    if($okupload === 1 ){
      // $new_file_name=$target_dir.date('dmYHis').str_replace(" ", "", basename($target_file_name));
      if(!file_exists($target_dir.$data["email"])){
        mkdir($target_dir.$data["email"]);
      }
      $new_file_name =$target_dir.$data["email"]."/cv.".$target_file_extension;
      if(move_uploaded_file($target_file_tmp_name,$new_file_name)){
        $error="File Uploaded";
        $success="success";
        unset($_POST);
      }else {
        $error="Oops! Something Went Wrong : Failed To Move File";
      }
    }else {
      $error="Oops! Something Went Wrong : Invalid File";
    }
  }
  }else {
    $error="Oops! Something Went Wrong : Email Already Exists";
  }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INSCRIPTION</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="flx">
  <?php 
  if(isset($error)){
    ?>
  <div class="alert error flx <?php echo $success;?>">
    <h3><?php echo $error; ?></h3>
    <button></button>
  </div>
  <?php
  } ?>
  <div class="body-cont flx">
  <form action="" method=post enctype="multipart/form-data" class="container upl flx">
    <div class="field ">
      <img src="./address-card.svg" alt="">
      <div class="flx">
        <h1>INSCRIPTION</h1>
        <h2>TP N°3</h2>
        <h4>TECH WEB AVC</h4>
        <h5>SMIS6</h5>
      </div>
    </div>
  <div class="field ">
  <label class="label" for="firstName">Nom :</label>
  <input type="text" class="input" name="firstName" id="firstName">
  </div>
  <div class="field ">
  <label class="label" for="lastName">Prénom :</label>
  <input type="text" class="input" name="lastName" id="lastName">
  </div>
  <div class="field ">
  <label class="label" for="email">Email :</label>
  <input type="email" class="input" name="email" id="email">
  </div>
  <div class="field ">
  <div class="label ">sexe:</div>
  <div class="gender flx input div">
    <label class="radio" for="sexe-homme">Homme
      <input type="radio"  name="gender" value="homme" id="sexe-homme">
    </label>
    <label class="radio" for="sexe-femme">Femme
      <input type="radio"  name="gender" value="femme" id="sexe-femme">
    </label>
    
  </div>
  </div>
  <div class="field ">
  <label class="label" for="country">Pays :</label>
  <select id="country" class="input" name="country">
    <option value="" selected>Choisie Votre Pays</option>
    <option value="rabat">Morocco</option>
    <option value="oujda">KSA</option>
    <option value="fes">Egypt</option>
    <option value="tangier">Algeria</option>
  </select>
  </div>
  <div class="field ">
    <label class="label">Langages :</label> 
  <div class="div input flx">
  <label class="label" for="PHP">PHP <input type="checkbox" name="languages[]" id="PHP" value="PHP"></label>
  <label class="label" for="C">C<input type="checkbox" name="languages[]" id="C" value="C"></label>
  <label class="label" for="C++">C++<input type="checkbox" name="languages[]" id="C++" value="C++"></label>
  <label class="label" for="JAVA">JAVA<input type="checkbox" name="languages[]" id="JAVA" value="JAVA"></label>
  </div>
  </div> 
  <div class="field ">
    <label class="label input">Domaine :</label>
    <div class="div stud flx input">
  <label class="label radio" for="Informatiques">Informatiques<input type="radio" name="domain" id="Informatiques" value="Informatiques"></label>
  <label class="label radio" for="Reseaux">Réseaux<input type="radio" name="domain" id="Reseaux" value="Réseaux"></label>
  <label class="label radio" for="WebTechAvc">Web Tech<input type="radio" name="domain" id="WebTechAvc" value="WebTechAvc"></label>
  </div>
  </div>
  <div class="field flx">
    <label for="upload" id="upl">
      <img src="upload.png" alt="upload logo" srcset="">
      <h3>Drag & drop any file here</h3>
      <h5>or <span>browse file</span> from device</h5>
    </label>
    <div class="uploads"></div>
  <input type="file" id="upload" name="img"  >
  </div>
  <div class="field ">
    <input type="reset" name="reset" value="Annuler" id="reset">
    <input type="submit" name="submit" value="Envoyer" id="submit">
  </div>
  </form>
  <div class="ills flx">
    <h1>Already Registred ?</h1>
  <img  src="ill-ins.png" alt="">
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos numquam quis maxime error, incidunt delectus!</p>
  <a href="#">Check out now</a>  
</div>
      
  </div>
  <script src="main.js"></script>
  <?php require '../nav.php'?>
</body>
</html>