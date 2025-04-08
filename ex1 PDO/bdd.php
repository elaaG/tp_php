<?php
$host ='localhost';
$dbname='students';
$user='root';
$pass='';

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    $pdo->exec("USE `$dbname`");
    $stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");
    
    if( ! $pdo->query("SHOW TABLES LIKE 'student'")->fetch()){
    $pdo->exec("CREATE TABLE student (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        birthday DATE NOT NULL)");
    
    $pdo->exec("INSERT INTO student (name, birthday) VALUES
        ('Aymen', '1982-02-07'),
        ('skander', '2000-07-11'),
        ('Ali', '1999-01-01'),
        ('Hichem', '1998-12-31')");
    } 


} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

