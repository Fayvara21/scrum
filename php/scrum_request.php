<?php 

require 'db_connect.php';
require 'api_request.php';


$conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $desc = getDesc($_POST['card']);
    $select = $_POST['select'];


    if ((int)$desc && (int)$_POST['select']){
        if ((int)$desc < (int)$_POST['select']){            
            putDesc($_POST['card'], $_POST['select']);
            setCard( $_POST['card'], $_SESSION['user']['Id']);
        }
    }    

}

header('Location: ../index.html');
