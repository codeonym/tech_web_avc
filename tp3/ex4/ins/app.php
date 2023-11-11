<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
if(isset($_GET["keyword"])){
    $ins=fopen(__DIR__."/../etudiants.txt","r");
    if($ins != null){
  $arr=[];
  while(!feof($ins)){
    $line = fgets($ins);
    if($line != null){
      $arr[]=explode(";",$line);
    }
  }
  foreach($arr as $a){
    if($a["2"]==$_GET["keyword"]){
      $arrn=$a;
      break;
    }
  }
  if(isset($arrn)){
    $data = [
    "firstName" => $arrn[0],
    "lastName" =>$arrn[1],
    "email" => $arrn[2],
    "gender" => $arrn[3],
    "domain" => $arrn[4],
    "country" => $arrn[5],
    "languages" => explode(" ",$arrn[6]),
    "url" =>trim($arrn[2]."/cv.".$arrn[7]),
    "ext" => trim($arrn[7])
  ];
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
  <title>Data</title>
  <link rel="stylesheet" href="/tech_web_avc/tp3/ex4/ins/app.css">
</head>
<body class=flx>
<?php if(isset($data)){?>
  <div class="card flex">
  <div class=" card-ti flx">
  <img src="/tech_web_avc/tp3/ex4/assets/address-card.svg" alt="">
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
    <tr>
      <td>CV</td>
      <td><img id="filelogo" src="/tech_web_avc/tp3/ex4/assets/file<?php 
      if($data['ext'] == "pdf")
      {echo "-pdf";
      }elseif($data["ext"] =="doc"|| $data["ext"] =="docx")
        { echo "-word";
        } ?>.svg" alt="" /></td>
      <script>
        onload=()=> {
          let fileLogo = document.getElementById("filelogo");
          document.addEventListener("click",(e)=>{
            if(e.target != fileLogo)
              if(document.querySelector("iframe") != null)
                document.querySelector("iframe").remove();
          })
        fileLogo.addEventListener("click",()=>{
          let iframe=document.createElement('iframe');
          iframe.setAttribute("frameborder","0");
          iframe.setAttribute('src',"/tech_web_avc/tp3/ex4/cv/<?php echo $data["url"] ?>");
          document.body.appendChild(iframe);
        })
        }
        
      </script>
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
  <?php require '../nav.php'?>
</body>
</html>