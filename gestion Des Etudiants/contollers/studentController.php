<?php
require_once '../classes/Student.php';
require_once '../configurations/db.php';

$studentt= new Student($conn);

if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['action']=='create'){
    $data=[
        'name'=>$_POST['name'],
        'birthday'=>$_POST['birthday'],
        'section'=>$_POST['section'],
        'image'=>''
    ];
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageName = uniqid() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $imageName);
        $data['image'] = $imageName;
    }

    $studentt->create($data);
    header('Location: ../views/studentsList.php');
    exit();
}

if(isset($_GET['action']) && $_GET['action']=='delete' && isset($_GET['id'])){
    $studentt->delete($id);
    header('Location: ../views/students.php');
    exit();
}
    
 ?>