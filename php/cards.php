<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/cards.css">
  <title>Scrum Cards</title>

</head>

<body>

  <!-- Le menu -->
  <div class="topBar">
    <p titre>SCRUM</p>
    <p newline></p>
    <a href="gerer_equipe.php" class="Button">Gérer l'équipe</a>
    <a href="connexion.php" class="Button">Se Connecter</a>
    <a href="cards.php" class="Button toggleCards">Daily Scrum</a>
  </div>

  <div class="background"></div>




  <!-- LE CONTENU DE LA PAGE -->
  <div class="content">

    <div id="cards-container" class="cards">
     
      <form action="scrum_request.php" method="post">

        <select name="card">
          <?php
        
            include 'api_request.php';

            $data = getCards('670cdbb802e7d153f9f5553f');

            foreach ($data as $x) {
              echo "<option value='".$x["id"]."'>".htmlspecialchars($x["name"])."</option>";
            }            

          ?>
        </select>

        <input name="select" id="selectedcard" value="">
        <p space></p>
        <!-- Carte 1 -->
        <button class="card blue-dark" type="button" name="button" value="1">1</button>
        <!-- Carte 2 -->
        <button class="card red" type="button" name="button" value="2">2</button>
        <!-- Carte 3 -->
        <button class="card violet" type="button" name="button" value="3">3</button>
        <!-- Carte 5 -->
        <button class="card yellow" type="button" name="button" value="5">5</button>
        <!-- Carte 8 -->
        <button class="card green" type="button" name="button" value="8">8</button>
        <!-- Carte 13 -->
        <button class="card blue-light" type="button" name="button" value="13">13</button>
        <!-- Carte ? -->
        <button class="card blue-dark" type="button" name="button" value="?">?</button>
        <!-- Carte Café -->
        <button class="card red" type="button" name="button" value="café">☕</button>

        <p space></p>

        <button type="submit" class="submit"> SUBMIT</button>
      </form>

    </div>
  </div>


  <script>
    const buttons = document.querySelectorAll('.card');
    const input = document.getElementById('selectedcard');
    buttons.forEach(button => {
      button.addEventListener('click', function () {
        input.value = button.value;
      });
    });

  </script>






</body>

</html>