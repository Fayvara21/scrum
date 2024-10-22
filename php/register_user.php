<?php

require_once '../php/db_connect.php';
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];

try {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = " INSERT INTO `Utilisateur` (`id`, `Nom`, `Prenom`, `Username`, `E_mail`, `Mdp` ) VALUES ('$id', '$prenom', '$nom', '$pseudo', '$email', '$password')";
    $pdo->exec($sql);
    echo "Nouveau compte créé";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;