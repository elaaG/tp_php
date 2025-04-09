<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des sections</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container">
                <a class="navbar-brand" href="#">Students Management</a>
                <div class="navbar-nav">
                    <a class="nav-link" href="students_list.php">Étudiants</a>
                    <a class="nav-link active" href="sections_list.php">Sections</a>
                    <a class="nav-link" href="logout.php">Déconnexion</a>
                </div>
            </div>
        </nav>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-primary">Liste des sections</h5>
                <a href="section_add.php" class="btn btn-primary">Ajouter une section</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="sectionsTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Désignation</th>
                                <th>Description</th>
                                <th>Nombre d'étudiants</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sections as $section): ?>
                            <tr>
                                <td><?= htmlspecialchars($section['id']) ?></td>
                                <td><?= htmlspecialchars($section['designation']) ?></td>
                                <td><?= htmlspecialchars($section['description']) ?></td>
                                <td><?= $studentRepository->countBySection($section['id']) ?></td>
                                <td>
                                    <a href="section_details.php?id=<?= $section['id'] ?>" class="btn btn-info btn-sm">Détails</a>
                                    <a href="section_edit.php?id=<?= $section['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                                    <a href="section_delete.php?id=<?= $section['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
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
            $('#sectionsTable').DataTable({
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
