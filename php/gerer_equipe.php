<!DOCTYPE html>
<html lang="en">
{
  "address": null,
  "attachments": [],
  "badges": {
    "attachmentsByType": {
      "trello": {
        "board": 0,
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

    <p>add user to current group</p>

    <?php

    require_once 'db_connect.php';

    echo '<form action="adduser.php" method="post">';
    echo '<select name="user">';

    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM Utilisateur";
      $statement = $conn->query($sql);

      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row["Id"]."'>" . htmlspecialchars($row["Username"]) . "</option>";
      }


    } catch (PDOException $e) {
      echo "connection échouée " . $e->getMessage();
    }
    echo '</select>';
    echo '<input type="submit" value="envoyer">';
    echo '</form>';
    ?>

  
    <p>remove user from current group</p>

    <?php

    require_once 'db_connect.php';

    echo '<form action="removeuser.php" method="post">';
    echo '<select name="user">';

    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM Utilisateur";
      $statement = $conn->query($sql);

      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$row["Id"]."'>" . htmlspecialchars($row["Username"]) . "</option>";
      }


    } catch (PDOException $e) {
      echo "connection échouée " . $e->getMessage();
    }
    echo '</select>';
    echo '<input type="submit" value="envoyer">';
    echo '</form>';
    ?>









  </div>

</body>

</html>