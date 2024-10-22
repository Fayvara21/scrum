<?php
    require_once '../php/db_connect.php';
    if (isset($_SESSION['user'])) {
        header('Location: ../index.html');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "SELECT * FROM Utilisateur WHERE Username = :username AND Mdp = :password";
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
    
