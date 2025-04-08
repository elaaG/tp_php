<?php
require_once '../configuration/db.php';
require_once '../classes/User.php';

$userr = new User($conn);

if ($_server['REQUEST_METHOD'] == 'POST') {
    $username= $_POST['username'];
    $password= $_POST['password'];

    $user=$userr->findByUsername($username);
    if($user && password_verify($password, $user['password'])){
       $_SESSION['user'] = $user;
         header('Location: ../views/home.php');
            exit();
    }else{
        $error = "Invalid username or password";
        header('Location: ../views/login.php?error=' . urlencode($error));
        exit();
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    session_destroy();
    header('Location: ../views/login.php');
    exit();
}

?>