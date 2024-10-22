<?php
    require_once '../php/db_connect.php';
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
        echo"try pdo";
        if ($user) {
            session_start();
            $_SESSION['user'] = $user;
            echo"session started";
            header('Location: ../index.html');
        } else {
            $error = 'Nom d\'utilisateur ou mot de passe incorrect';
            echo $error;
        }

    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    
