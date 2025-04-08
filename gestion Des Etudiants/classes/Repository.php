<?php

class Repository {
    protected $connection;
    protected $table;

    public function __construct($connection, $table) {
        $this->connection = $connection;
        $this->table = $table;
    }

    public function findall(){
        $stmt=$this->connection->query("SELECT * FROM $this->table");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id){
        $stmt = $this->connection->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $stmt = $this->connection->prepare("INSERT INTO $this->table ($columns) VALUES ($placeholders)");
        return $stmt->execute($data);
    }

    public function delete($id){
        $stmt = $this->connection->prepare("DELETE FROM $this->table WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>