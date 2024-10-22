<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/connexion.css">
  <title>Document</title>
</head>

<body>


  <?php
  require_once './php/db_connect.php';
  if (isset($_SESSION['user'])) {
    header('Location: ../index.html');
  }


  ?>


  <!-- LA BARRE DU HAUT, CHANGER LE HREF AVEC LES AUTRES PAGES-->

  <div class="topBar">
    <p titre>SCRUM</p>
    <p newline></p>
    <a href="#" class="Button">créer équipe</a>
    <a href="#" class="Button">joindre équipe</a>
    <a href="#" class="Button">se connecter</a>
  </div>


  <!-- LE CONTENU DE LA PAGE-->
  <div class="content">



    <!-- PAGE DE CONNEXION-->

    <div class="connexion">
      <form action="register_user.php" method="post">


        <input type="text" id="nom" name="nom" required>


        <input type="text" id="prenom" name="prenom" required>


        <input type="text" id="pseudo" name="pseudo" required>

  
        <input type="email" id="email" name="email" required>

        <input type="password" id="password" name="password" required>

        <button type="submit">S'inscrire</button>

        <p>ou</p>
  
        <a href="home.php" target="_blank">Vous avez déjâ un compte</a>
      
      </form>
    </div>

  </div>

</body>

</html>