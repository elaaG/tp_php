<?php
require_once 'Repository.php';

class Section extends Repository {
    public function _construct($connexion){
        parent::_construct($connexion,'sections');
    }

    public function getStudents($sectionId){
        $stmt =$this->connexion->prepare("SELECT * FROM students WHERE section_id = ?"); 
        $stmt->execute([$sectionId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  
    }

    public function update($data){
        $sql = "UPDATE sections SET designation = :designation, description = :description WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $data['id'],
            'designation' => $data['designation'],
            'description' => $data['description']
        ]);
    }
}
?>