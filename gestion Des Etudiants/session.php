<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

function idAdmin() {
    return $_SESSION['user']['role'] === 'admin';
}
?>