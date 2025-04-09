<?php 
class Pokemon {
    public $name;
    public $url; 
    public $hp;
    public $attackPokemon;
    public function __construct($name,$url,$hp,AttackPokemon $attackPokemon){
        $this->name=$name;
        $this->url=$url;
        $this->hp=$hp;
        $this->attackPokemon=$attackPokemon;
    }
    public function getName(){return $this->name;}
    public function setName($name){
        $this->name=$name;
    }
    public function getHp() {
        return $this->hp;
    }
    
    public function getImage() {
        return $this->url;
    }
    
    public function getAttack() {
        return $this->attackPokemon;
    }
    
    public function isDead(){
        if($this->hp <=0){
            return TRUE;}
        else{
            return FALSE;
        }
    }
    public function isSpecialAttack() {
        return rand(1, 100) <= $this->attackPokemon->probabilitySpecialAttack;
    }
    public function attack(Pokemon $p){
        $damage = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);

        if ($this->isSpecialAttack()) {
            $damage *= $this->attackPokemon->specialAttack;
        }

        $p->hp -= $damage;
        return $damage ;
    }
    public function whoAmI(){
        echo "<h3>{$this->name}</h3>";
        echo "<img src='{$this->url}' width='100'><br>";
        echo "HP: {$this->hp}<br><br>";
    }

}
class AttackPokemon{
    public $attackMinimal;
    public $attackMaximal;
    public $specialAttack;
    public $probabilitySpecialAttack;
    public function __construct($attackMinimal,$attackMaximal,$specialAttack,$probabilitySpecialAttack){
        $this->attackMinimal=$attackMinimal;
        $this->attackMaximal=$attackMaximal;
        $this->specialAttack=$specialAttack;
        $this->probabilitySpecialAttack=$probabilitySpecialAttack;
    }
    public function getMin() {
        return $this->attackMinimal;
    }
    
    public function getMax() {
        return $this->attackMaximal;
    }
    
    public function getSpecialAttackMultiplier() {
        return $this->specialAttack;
    }
    
    public function getProbabilitySpecialAttack() {
        return $this->probabilitySpecialAttack;
    }
    
    
}
class PokemonFeu extends Pokemon {
    public function attack(Pokemon $p) {
        $damage = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);

        if ($this->isSpecialAttack()) {
            $damage *= $this->attackPokemon->specialAttack;
        }
        if ($p instanceof PokemonPlante) {
            $damage *= 2;
        }

        elseif ($p instanceof PokemonFeu || $p instanceof PokemonEau) {
            $damage *= 0.5;
        }

        $p->hp -= $damage;
        return $damage ;
    }  
}

class PokemonEau extends Pokemon {
    public function attack(Pokemon $p) {
        $damage = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);

        if ($this->isSpecialAttack()) {
            $damage *= $this->attackPokemon->specialAttack;
        }

        if ($p instanceof PokemonFeu) {
            $damage *= 2;
        } elseif ($p instanceof PokemonEau || $p instanceof PokemonPlante) {
            $damage *= 0.5;
        }

        $p->hp -= $damage;
        return $damage ;
    }
}

class PokemonPlante extends Pokemon {
    public function attack(Pokemon $p) {
        $damage = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);

        if ($this->isSpecialAttack()) {
            $damage *= $this->attackPokemon->specialAttack;
        }

        if ($p instanceof PokemonEau) {
            $damage *= 2;
        } elseif ($p instanceof PokemonFeu || $p instanceof PokemonPlante) {
            $damage *= 0.5;
        }

        $p->hp -= $damage;
        return $damage ;
    }
}

?>
