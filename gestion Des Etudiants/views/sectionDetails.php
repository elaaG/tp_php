<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Détails de la section</h4>
                            <a href="sections_list.php" class="btn btn-light">Retour</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3><?= htmlspecialchars($section['designation']) ?></h3>
                        <hr>
                        <p><strong>ID:</strong> <?= htmlspecialchars($section['id']) ?></p>
                        <p><strong>Description:</strong> <?= htmlspecialchars($section['description']) ?></p>
                        <p><strong>Nombre d'étudiants:</strong> <?= count($students) ?></p>
                        
                        <h5 class="mt-4">Étudiants dans cette section:</h5>
                        <?php if (!empty($students)): ?>
                            <ul class="list-group">
                                <?php foreach ($students as $student): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="student_details.php?id=<?= $student['id'] ?>">
                                        <?= htmlspecialchars($student['name']) ?>
                                    </a>
                                    <span class="badge bg-primary rounded-pill">
                                        <?= date('d/m/Y', strtotime($student['birthday'])) ?>
                                    </span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <div class="alert alert-info">Aucun étudiant dans cette section</div>
                        <?php endif; ?>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="section_edit.php?id=<?= $section['id'] ?>" class="btn btn-warning me-md-2">Modifier</a>
                            <a href="section_delete.php?id=<?= $section['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
