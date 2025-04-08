<?php
require '../configuration/db.php';
require '../classes/Section.php';

$section = new Section($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create') {
    $date=[
        'designation' => $_POST['designation'],
        'description' => $_POST['description'],
    ];
    $section->create($date);
    header('Location: ../views/sectionList.php!');
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
   $section->delete($_GET['id']);
   header('Location: ../views/sectionList.php!');
    exit();

}
// UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'update' && isset($_POST['id'])) {
    $data = [
        'id' => $_POST['id'],
        'designation' => $_POST['designation'],
        'description' => $_POST['description']
    ];
    $sectionRepo->update($data);
    header("Location: ../views/sectionsList.php");
    exit();
}

?>