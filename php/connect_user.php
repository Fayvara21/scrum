<?php
    require_once '../php/db_connect.php';
    $email = $_POST['email'];
    $password = $_POST['mot_de_passe'];
    error_reporting(E_ERROR | E_PARSE);
    try {    
        $query = "SELECT * FROM Utilisateur WHERE E_mail = :email";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $user = $statement->fetch();
        //echo $email." ".$password."".$user['Mdp'];
        if ($user && password_verify($password, $user['Mdp'])) {
            session_start();
            $_SESSION['user'] = $user;
            //echo"session started";
            header('Location: ../index.html');
        } else {
            //$error = 'Nom d\'utilisateur ou mot de passe incorrect';
            //echo $error;
        }

    } catch (PDOException $e) {
        //echo $sql . "<br>" . $e->getMessage();
    }
    
        
