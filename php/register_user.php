<?php

require_once '../php/db_connect.php';
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$password = $_POST['password'];

try {
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    //ADAPTER PAR RAPPORT A LA BD, SUPPRIMER CE MESSAGE SI C4EST FAIT
    $sql = " INSERT INTO `Utilisateur` (`id`, `Nom`, `Prenom`, `Username`, `E_mail`, `Mdp`, `active`) VALUES (NULL, '$prenom', '$nom', '$pseudo', '$email', '$password', '1')";
    $pdo->exec($sql);
    echo "Nouveau compte créer";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;