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
    $sql = " INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `profile_picture`, `email`, `password`, `birthday`, `phone`, `active`) VALUES (NULL, '$prenom', '$nom', '$pseudo', '', '$email', '$password', '$anniv', '$tel', '1')";
    $pdo->exec($sql);
    echo "Nouveau compte créer";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;