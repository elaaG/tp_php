<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes des étudiants </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1> les Notes des Etudiants </h1>
    <div class="container">
    <?php include 'Etudiant.php'; ?>
    <?php
    foreach ($etudiants as $etudiant) : ?>
    <div class="etudiant">
        <h2><?php echo $etudiant->nom; ?></h2>
        <?php
        $notes=$etudiant->afficherNotes(); 
        foreach ($notes as $note) : ?>
    <div class="note" style="background-color: <?php echo ($note < 10) ? ' rgba(252, 105, 105, 0.58)' : (($note == 10) ? ' rgb(255, 155, 88)' : ' rgba(48, 255, 169, 0.8)'); ?>;">
        <?php echo $note; ?>
    </div>
<?php endforeach; ?>
        <div class="moyenne"> Votre moyenne est : <?= $etudiant->calculerMoyenne(); ?> </div>
    </div>

    <?php endforeach; ?>

           


    </div>

    
</body>
</html>

