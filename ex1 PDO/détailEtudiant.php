<?php 
require 'bdd.php';
if (!isset($_GET['id']) )  {
    die('ID de l\'étudiant non spécifié.');
}
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM student WHERE id = ?');
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$student) {
    die('Aucun étudiant trouvé avec cet ID.');
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details de l'etudiant</title>
</head>
<body>
    <h1>Details de l'etudiant</h1>
    <p><strong>Nom: </strong> <?php echo htmlspecialchars($student['name']) ?></p>
    <p><strong> date de naissance: </strong> <?php echo htmlspecialchars($student['birthday']) ?></p>
    <a href="index.php">Retour à la liste des étudiants</a>
    
</body>
</html>