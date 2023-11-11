<?php
// ini_set("display_errors","off");
// Ecrire un script PHP qui va afficher les noms des répertoire de votre disque C :/ et
// c:/easyphp/www/.
// Créer dans www un dossier /images, puis copiez des images au JPG dans ce répertoire
// Ecrire un script Php qui affichera tous les images de ce dossier.

function uploadOk($file,$targetFile,$fileType){
  $uploadok=1;

  // check if the file is really an image
  if(getimagesize($file) !== false ){
    $uploadok=1;
  }
  if(file_exists($targetFile)){
    $uploadok=0;
  }

  // limiting types types
  if($fileType !== 'jpg'  && $fileType !== 'png' && $fileType !== 'gif' && $fileType !== 'webp'){
    $uploadok=0;
  }

  return $uploadok;
}
if(isset($_POST["submit"])){
  $target_dir=__DIR__."/../uploads/";
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
  <link rel="stylesheet" href="style.css">
  <title>UIGM</title>
  <script>onload=()=>{

  let uploadBtn=document.getElementById("upload");

  // alert
  let alert=document.querySelector(".alert.error") || "";
  let alertBtn=document.querySelector(".alert button");
  if(alert !== ""){
    alert.style.cssText=`transform:translate(-50%, -50%);`;
    alertBtn.onclick=(function(){
      alert.style.cssText=`transform:translate(-500%, -50%);`;
    });
  };

  // upload
  uploadBtn.addEventListener("change",(e)=>{
    if(e.target.files[0]){
      let uploads=document.querySelector(" form.upl .uploads");
      uploads.innerHTML="";
      uploads.classList.add("scroll");
      for( let i=0;i<e.target.files.length;i++){
        let ti=document.createElement("h3");
        ti.classList.add("item");
        ti.append(e.target.files[i].name);
        uploads.append(ti);
    };
    document.querySelector("form.upl").append(uploads);
    }
  });
}</script>
</head>
<body class="flx">
  <?php 
  if(isset($error)){
    ?>
  <div class="alert error flx">
    <h3><?php echo $error; ?></h3>
    <button></button>
  </div>
  <?php
  } ?>
  <div class="container flx">
  <form class="flx upl" action="" method="post" enctype="multipart/form-data">
    <label for="upload" id="upl">
      <img src="upload.png" alt="upload logo" srcset="">
      <h2>Drag & drop any file here</h2>
      <h4>or <span>browse file</span> from device</h4>
    </label>
    <div class="uploads"></div>
  <input type="file" id="upload" name="img[]" accept="image/*" multiple="multiple" >
  <button type="submit" name="submit" value="upload">Upload</button>
  </form>
  </div>
  <?php require '../nav.php'?>
</body>
</html>