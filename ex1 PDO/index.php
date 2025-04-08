<?php 
require 'bdd.php';
try {
    $students = $pdo->query('SELECT * FROM student')->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching students: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des etudianns</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1> liste des étudiants</h1>
    <table>
        <tr>
            <th>ID</th>
            <th> nom</th>
            <th> Date de naissance</th>
            <th> details</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo htmlspecialchars($student['id']); ?></td>
                <td><?php echo htmlspecialchars($student['name']); ?></td>
                <td><?php echo htmlspecialchars($student['birthday']); ?></td>
                <td><a href="détailEtudiant.php?id=<?php echo $student['id']; ?>">ℹ️</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>

