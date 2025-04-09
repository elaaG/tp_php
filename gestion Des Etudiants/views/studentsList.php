<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container">
                <a class="navbar-brand" href="#">Students Management</a>
                <div class="navbar-nav">
                    <a class="nav-link active" href="students_list.php">Étudiants</a>
                    <a class="nav-link" href="sections_list.php">Sections</a>
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </div>
            </div>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-primary">Liste des étudiants</h5>
                <a href="student_add.php" class="btn btn-primary">Ajouter un étudiant</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="studentsTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Date de naissance</th>
                                <th>Section</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                            <tr>
                                <td><?= htmlspecialchars($student['id']) ?></td>
                                <td>
                                    <?php if (!empty($student['image'])): ?>
                                        <img src="uploads/<?= htmlspecialchars($student['image']) ?>" width="50" class="img-thumbnail">
                                    <?php else: ?>
                                        <img src="assets/default.png" width="50" class="img-thumbnail">
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($student['name']) ?></td>
                                <td><?= date('d/m/Y', strtotime($student['birthday'])) ?></td>
                                <td><?= htmlspecialchars($student['section']) ?></td>
                                <td>
                                    <a href="student_details.php?id=<?= $student['id'] ?>" class="btn btn-info btn-sm">Détails</a>
                                    <a href="student_edit.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                                    <a href="student_delete.php?id=<?= $student['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#studentsTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'csv', 'pdf'
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json'
                }
            });
        });
    </script>
</body>
</html>
