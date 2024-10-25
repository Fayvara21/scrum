<?php
$servername = 'localhost';
$username = 'root';
$password = 'ChocolatChocolaté4uChocolat';
$dbname = 'Scrum';
$port = 3306;

error_reporting(E_ERROR | E_PARSE);
//ini_set('display_errors', 'on');

//On essaie de se connecter
try{
    $pdo = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    //On définit le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Connexion réussie';
}
catch(PDOException $e){
    //echo "Erreur : " . $e->getMessage();
    
}