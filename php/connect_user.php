<?php
    require_once '../php/db_connect.php';
    if (isset($_SESSION['user'])) {
        header('Location: ../index.html');
    }
    $username = $_POST['email'];
        $password = $_POST['mot_de_passe'];
    try {    
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "SELECT * FROM Utilisateur WHERE E_mail = :email AND Mdp = :mot_de_passe";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':email', $username);
        $statement->bindValue(':mot_de_passe', $password);
        $statement->execute();
        $user = $statement->fetch();
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            header('Location: ../index.html');
        } else {
            $error = 'Nom d\'utilisateur ou mot de passe incorrect';
        }

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
