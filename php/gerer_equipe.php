<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <title>Document</title>
</head>

<body>

  <!-- LA BARRE DU HAUT, CHANGER LE HREF AVEC LES AUTRES PAGES-->

  <div class="topBar">
    <p titre>SCRUM</p>
    <p newline></p>
    <a href="#" class="Button">joindre équipe</a>
    <a href="#" class="Button">se connecter</a>
  </div>


  <div class="background"></div>


  <!-- LE CONTENU DE LA PAGE-->
  <div class="content">


    <?php

    require 'api_request.php';
    require_once 'db_connect.php';



    try {
      
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM users";
      $statement = $conn->query($sql);

      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='" . $row["id"] . "'>" . htmlspecialchars($row["username"]) . "</option>";
      }
    } catch (PDOException $e) {
      echo "connection échouée " . $e->getMessage();
    }


    ?>












  </div>

</body>

</html>