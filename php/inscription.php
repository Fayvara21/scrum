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
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch();
    if ($user) {
      session_start();
      $_SESSION['user'] = $user;
      header('Location: ../index.html');
    } else {
      $error = 'Nom d\'utilisateur ou mot de passe incorrect';
    }

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

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <label for="anniversaire">Date d'anniversaire :</label>
        <input type="date" id="anniversaire" name="anniversaire" required>

        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input type="text" name="telephone" maxlength="10">


        </div>

        <button class="ombres_multiples_diffuses" type="submit">S'inscrire</button>
        <p>ou</p>
        <a href="home.php" target="_blank">Vous avez déjâ un compte</a>
      </form>
    </div>

  </div>

</body>

</html>