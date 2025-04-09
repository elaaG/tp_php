<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($student) ? 'Modifier' : 'Ajouter' ?> un étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-<?= isset($student) ? 'warning' : 'success' ?> text-white">
                        <h4><?= isset($student) ? 'Modifier l\'étudiant' : 'Ajouter un nouvel étudiant' ?></h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= isset($student) ? 'student_update.php' : 'student_create.php' ?>" method="POST" enctype="multipart/form-data">
                            <?php if (isset($student)): ?>
                                <input type="hidden" name="id" value="<?= $student['id'] ?>">
                            <?php endif; ?>
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom complet</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="<?= isset($student) ? htmlspecialchars($student['name']) : '' ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="birthday" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" 
                                       value="<?= isset($student) ? htmlspecialchars($student['birthday']) : '' ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="section" class="form-label">Section</label>
                                <select class="form-select" id="section" name="section" required>
                                    <option value="">Sélectionnez une section</option>
                                    <?php foreach ($sections as $section): ?>
                                        <option value="<?= $section['id'] ?>" 
                                            <?= (isset($student) && $student['section'] == $section['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($section['designation']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <?php if (isset($student) && !empty($student['image'])): ?>
                                    <div class="mt-2">
                                        <img src="uploads/<?= htmlspecialchars($student['image']) ?>" width="100" class="img-thumbnail">
                                        <input type="hidden" name="current_image" value="<?= htmlspecialchars($student['image']) ?>">
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="students_list.php" class="btn btn-secondary me-md-2">Annuler</a>
                                <button type="submit" class="btn btn-primary"><?= isset($student) ? 'Mettre à jour' : 'Enregistrer' ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
