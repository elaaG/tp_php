<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Détails de l'étudiant</h4>
                            <a href="students_list.php" class="btn btn-light">Retour</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4 text-center">
                                <?php if (!empty($student['image'])): ?>
                                    <img src="uploads/<?= htmlspecialchars($student['image']) ?>" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                                <?php else: ?>
                                    <img src="assets/default.png" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <h3><?= htmlspecialchars($student['name']) ?></h3>
                                <hr>
                                <p><strong>ID:</strong> <?= htmlspecialchars($student['id']) ?></p>
                                <p><strong>Date de naissance:</strong> <?= date('d/m/Y', strtotime($student['birthday'])) ?></p>
                                <p><strong>Âge:</strong> <?= calculateAge($student['birthday']) ?> ans</p>
                                <p><strong>Section:</strong> <?= htmlspecialchars($student['section']) ?></p>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="student_edit.php?id=<?= $student['id'] ?>" class="btn btn-warning me-md-2">Modifier</a>
                            <a href="student_delete.php?id=<?= $student['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
