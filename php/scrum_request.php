<?php 

require_once 'db_connect.php';
require 'api_request.php';


$conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $desc = getDesc($_POST['card']);
    $select = $_POST['select'];
    // if ((int)$desc && (int)$_POST['card']){
        // if ((int)$desc < (int)$_POST['card']){
             //putDesc($_POST['card'], $_POST['select']);
             putDesc($_POST['card'], $_SESSION['user']['Id']);
             setCard( $_POST['card'], $_SESSION['user']['Id']);
            echo $_SESSION['user'];
             // 
        // }
// 
    // }

}

//header('Location: ../index.html');
