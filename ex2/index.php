<?php 
//pour les sessions
require 'Session.php';
$session=new Session();
if ($session-> exists('visits')){
    $session->incrementer('visits');
    $message="Merci pour votre fidélité, c’est votre ".$session->get('visits')." éme visite.";
}
else {
    $session->set('visits', 1);
    $message="Bienvenue à notre platforme";
}

// reset button
if (isset($_POST['reset'])){
    $session->destroy();
    header('Location: index.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php echo htmlspecialchars($message); ?>
    </div>

    <form method="post">
        <button type="submit" name ="reset">Réinitialiser la session </button>
    </form>


</body>
</html>