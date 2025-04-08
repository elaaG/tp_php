<?php 
require_once 'Repotistory.php';

class Student extends Repository {
    public function __construct($connexion) { 
        parent::__construct($connexion, 'students');
    }

    public function filtrerByName($name){
        $stmt =$this->connexion->prepare("SELECT * FROM students WHERE name = ?");  
        $stmt->execute([$name]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>