<?php
if(!extension_loaded("zip")){
  die("ZIP extension is not set");
}
$zip=new ZipArchive();
$zipPath="./files.zip";
if($zip->open($zipPath) === false){
  die("failed to open zip file");
  }else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>zip-archive</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="flx">
  <div class="flx container">
    <h1 class="ti">The Content Of The Archive</h1>
    <table border=1 cellspacing=0 cellpadding=15>
      <tr>
        <td>File Name</td>
        <td>Content</td>
      </tr>
      <?php for($i=0;$i<$zip->numFiles;$i++){
    $filename = $zip->getNameIndex($i);
    $filecontent = $zip->getFromIndex($i);
    ?>
      <tr>
        <td><?php echo $filename; ?></td>
        <td><?php echo $filecontent; ?></td>
      </tr>
    <?php }
    $zip->close();

} ?>
    </table>
  </div>
</body>
</html>
