
<?php 
ini_set("display_errors","off");
$FolderUpload=scandir(__DIR__."/../uploads");
    $images=[];
    foreach($FolderUpload as $file){
      if(getimagesize(__DIR__."/../uploads/".$file) !== false ){
        $images[]="../uploads/".$file;
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1 class="head-ti flx">Gallery</h1>
  <div class="container flx">
    <h2 class="head">Available images</h2>
    <div class="content">
      <?php if(count($images) > 0):?>
      <?php foreach($images as $img):?>
        <div class="box flx"><img src="<?php echo $img;?>" alt=""></div>
      <?php endforeach;?>
      <?php endif;?>
    </div>
  </div>
  <?php require '../nav.php'?>
</body>
</html>