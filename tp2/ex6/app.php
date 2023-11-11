<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data</title>
  <link rel="stylesheet" href="app.css">
</head>
<body class=flx>
<?php if(isset($_GET["submit"])){?>
  <table border=1 cellspacing=0>
    <tr>
      <td>Nom</td>
      <td>Prénom</td>
      <td>Address</td>
      <td>Ville</td>
      <td>Code Postal</td>
    </tr>
    <tr>
      <td><?php echo $_GET["lastName"]?></td>
      <td><?php echo $_GET["firstName"]?></td>
      <td><?php echo $_GET["address"]?></td>
      <td><?php echo $_GET["city"]?></td>
      <td><?php echo $_GET["zip"]?></td>
    </tr>
  </table>
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