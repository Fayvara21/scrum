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
    require_once '../php/db_connect.php';
    if (isset($_SESSION['user'])) {
      header('Location: ../index.html');
    }
    require_once '../php/connect_user.php';
    error_reporting(E_ERROR | E_PARSE);

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
    <form action="connect_user.php" method="post">
        <p>Email :</p>
        <input type="email" id="email" class="input" name="email" required>
        <p space></p>
        <p>Mot de passe :</p>
        <input type="password" id="mot_de_passe" class="input" name="mot_de_passe" required>
        <p space></p>
        <button class="Button" type="submit">Se connecter</button>
        <a class="#" href="inscription.php" target="_blank" >Inscrivez-vous</a>
        
      </form>
  </div>


  </div>

</body>
</html>