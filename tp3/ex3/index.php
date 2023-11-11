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
  <div class="body-cont flx">
  <form action="traitement.php" method=post class="container flx">
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
  <div class="field ">
    <input type="reset" name="reset" value="Annuler" id="reset">
    <input type="submit" name="submit" value="Envoyer" id="submit">
  </div>
  </form>
  <div class="ills flx">
    <h1>Lorem, ipsum dolor?</h1>
  <img  src="ill-ins.png" alt="">
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos numquam quis maxime error, incidunt delectus!</p>
  </div>
      
  </div>
  <script src="main.js"></script>
</body>
</html>