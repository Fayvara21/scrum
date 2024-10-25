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
  require 'db_connect.php';
  if (isset($_SESSION['user'])) {
    header('Location: ../index.html');
  }


  ?>


  <!-- LA BARRE DU HAUT, CHANGER LE HREF AVEC LES AUTRES PAGES-->
  <!-- Le menu -->
  <div class="topBar">
    <p titre>SCRUM</p>
    <p newline></p>
    <a href="gerer_equipe.php" class="Button">Gérer l'équipe</a>
    <a href="connexion.php" class="Button">Se Connecter</a>
    <a href="cards.php" class="Button toggleCards">Daily Scrum</a>
  </div>


  <!-- LE CONTENU DE LA PAGE-->
  <div class="content">



    <!-- PAGE DE CONNEXION-->

    <div class="connexion">
      <form action="register_user.php" method="post">

        <p>Nom:</p>
        <input type="text" id="nom" name="nom" required>

        <p>Prénom:</p>
        <input type="text" id="prenom" name="prenom" required>

        <p>Pseudo:</p>
        <input type="text" id="pseudo" name="pseudo" required>

        <p>Email:</p>
        <input type="email" id="email" name="email" required>

        <p>Mot De Passe:</p>
        <input type="password" id="password" name="password" required>

        <p>ID utilisateur Trello</p>
        <input type="id" id="id" name="id" required>

        <button class="Button"type="submit">S'inscrire</button>

        <p>ou</p>
  
        <a href="home.php" target="_blank">Vous avez déjâ un compte</a>
      
      </form>
    </div>

  </div>

</body>

</html>