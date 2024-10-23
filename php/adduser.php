<?php
require_once 'db_connect.php';
require 'api_request.php';


$conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        echo $_POST['user'];
        
        //echo $_SESSION['user_recieve'].$_SESSION['user']['id']   ;
        header('Location: messages.php');

}