<?php 

require_once 'db_connect.php';
require 'api_request.php';


$conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    descCard('670d071bffdca2977a959c05', $_POST['button']);
}