
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
  <button class="menu-toggle flx">
    <span></span><span></span><span></span>
</button>
  <nav class="sidebar">
  <ul>
    <li id="insert-student" data-cap="insert"><a href="#">Add Student</a></li>
    <li id="fetch-students" data-cap="fetch"><a href="#">Get Students</a></li>
  </ul>
  </nav>
  <div class="body-cont flx">
  <form action="insert.php" method=post data-cap="insert" class="insert open  container flx">
    <div class="field ">
      <img src="./address-card.svg" alt="">
      <div class="flx">
        <h1>INSCRIPTION</h1>
        <h2>ETUDIANTS</h2>
        <h4>2022-2023</h4>
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
    <input type="reset" name="reset" value="Annuler" id="reset">
    <input type="submit" name="submit" value="Envoyer" id="submit">
  </div>
  </form>
  <!-- <div class="ills flx">
    <h1>Lorem, ipsum dolor?</h1>
  <img  src="ill-ins.png" alt="">
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos numquam quis maxime error, incidunt delectus!</p>
  </div> -->
      <div data-cap="fetch" class="fetch ">
        <div class="cont">
          <h1>LIST OF STUDENTS</h1>
  <table>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Registration Date</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
      </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="main.js"></script>
</body>
</html>