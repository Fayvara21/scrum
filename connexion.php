<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/connexion.css">
  <title>Document</title>
</head>
<body>


  <?php
    require_once './php/db_connect.php';
    if (isset($_SESSION['user'])) {
        header('Location: index.php');
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
            header('Location: index.html');
        } else {
            $error = 'Nom d\'utilisateur ou mot de passe incorrect';
        }

    }
    require_once './templates/head.php';
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
 


  <!-- PAGE DE CONNECTION-->


  
  <div class="connexion">
    <form action="inscription.html" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" class="input" name="email" required>
        <p space></p>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" class="input" name="mot_de_passe" required>
        <p space></p>
        <button class="Button" type="submit">Se connecter</button>
        <a class="#" href="register.php" target="_blank" >Inscrivez-vous</a>
        
      </form>
  </div>

    <!-- Liste utilisateurs-->

  <div class="userList">
    <?php
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=Scrum', 'root', 'ChocolatChocolaté4uChocolat');
      }
      catch(Exception $e)

      {
        die('Erreur : '.$e->getMessage());
      }

      $reponse = $bdd->query('SELECT * FROM Utilisateur');

      while ($donnees = $reponse->fetch()) {    
        echo $donnees['Username'] . '<br />';
      }
      
      $reponse->closeCursor();
      ?>


  </div>

</body>
</html>