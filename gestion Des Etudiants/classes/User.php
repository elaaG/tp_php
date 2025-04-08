<?php
require 'Repotistory.php';

class User extends Repository{
    public function __construct($connexion){ 
        parent::__construct($connexion, 'users');
    }

    public function findByUsername($username){
        $stmt = $this->connexion->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>