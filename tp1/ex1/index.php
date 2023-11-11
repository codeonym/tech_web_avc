<!DOCTYPE html>
<!--?php
  echo '
  <from method=get class="container flx">
  <div class="field">
  <label for="firstName">Nom :</label>
  <input data-invalid="must contains letters only" type="text" name="firstName" id="firstName">
  </div>
  <div class="field">
  <label for="lastName">Prénom :</label>
  <input data-invalid="must contains letters only" type="text" name="lastName" id="lastName">
  </div>
  <div class="field">
  <label for="dateNaissance">Date Naissance :</label>
  <input type="date" name="birthDate" id="dateNaissance">
  </div>
  <div class="field">
  <label for="sexe-homme">Homme :</label>
  <input type="radio" name="sex" value="homme" id="sexe-homme">
  <label for="sexe-femme">Femme :</label>
  <input type="radio" name="sex" value="femme" id="sexe-femme">
  </div>
  <div class="field">
  <label for="ville">Ville :</label>
  <select id="ville" name="city">
    <option value="rabat">Rabat</option>
    <option value="oujda">Oujda</option>
    <option value="fes">Fes</option>
    <option value="tangier">Tangier</option>
  </select>
  </div>
  <div class="field">
  <label for="email">Email :</label>
  <input data-invalid="must be a valid email format" type="email" name="email" id="email">
  </div>
  <div class="field">
  <label for="commentaire">Commentainer :</label>
  <textarea name="comment" id="commentainer" cols="30" rows="10"></textarea>
  </div>
  <div class="field">
  <input type="submit" name="submit" id="submit">
  </div>
  </from>
  ';
? -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="flx">

  <form action="" method=get class="container flx">
  <div class="field " data-capt="">
  <label class="label" for="firstName">Nom :</label>
  <input type="text" class="input" name="firstName" id="firstName">
  </div>
  <div class="field ">
  <label class="label" for="lastName">Prénom :</label>
  <input type="text" class="input" name="lastName" id="lastName">
  </div>
  <div class="field ">
  <label class="label" for="dateNaissance">Date Naissance :</label>
  <input type="date" class="input" name="birthDate" id="dateNaissance">
  </div>
  <div class="field ">
  <div class="label ">sexe:</div>
  <div class="gender flx input">
    <label for="sexe-homme">Homme
      <input type="radio"  name="gender" value="homme" id="sexe-homme">
    </label>
    <label for="sexe-femme">Femme
      <input type="radio"  name="gender" value="femme" id="sexe-femme">
    </label>
    
  </div>
  </div>
  <div class="field ">
  <label class="label" for="ville">Ville :</label>
  <select id="ville" class="input" name="city">
    <option value="" selected>Choisie Votre Ville</option>
    <option value="rabat">Rabat</option>
    <option value="oujda">Oujda</option>
    <option value="fes">Fes</option>
    <option value="tangier">Tangier</option>
  </select>
  </div>
  <div class="field ">
  <label class="label" for="email">Email :</label>
  <input type="email" class="input" name="email" id="email">
  </div>
  <div class="field ">
  <label class="label" for="commentaire">Commentainer :</label>
  <textarea class="input" name="comment" id="commentainer" cols="30" rows="10"></textarea>
  </div> 
  <div class="field ">
  <input type="submit" name="submit" value="Envoyer" id="submit">
  </div>
  </form>
  <script src="main.js"></script>
</body>
</html>