<?php
class Etudiant
{
    public $nom;
    public $notes = array();

    public function __construct($nom ,$notes = array())
    {
        $this->nom = $nom;
        $this->notes = $notes;
    }

    public function afficherNotes()
    {
       
       return $this->notes;
        
    }
  

    public function calculerMoyenne()
    {
        if (count($this->notes) == 0) {
            return 0;
        }
        $somme = array_sum($this->notes);
        return $somme / count($this->notes);
    }

    public function estAdmis()
    {
        $moyenne = $this->calculerMoyenne();
        return $moyenne >= 10;
    }

}

$etudiant1 = new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]);
$etudiant2 = new Etudiant("Skander", [15, 9, 8, 16]);
$etudiants = array($etudiant1, $etudiant2);

?>