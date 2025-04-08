<?php 
session_start();
if (isset($_SESSION['user'])) {
    header('Location: home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="../controllers/authentificationController.php" method="POST">
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" value="Se connecter">

    </form>


    
   
    
</body>
</html>