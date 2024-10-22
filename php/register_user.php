$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$password = $_POST['password'];
$anniv = $_POST['anniversaire'];
$tel = $_POST['telephone'];
try 
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = " INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `profile_picture`, `email`, `password`, `birthday`, `phone`, `active`) VALUES (NULL, '$prenom', '$nom', '$pseudo', '', '$email', '$password', '$anniv', '$tel', '1')";
    $pdo->exec($sql);
    echo "Nouveau compte créer";
} 
catch(PDOException $e) 
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null