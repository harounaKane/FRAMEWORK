<?php

namespace MVC\Model;

abstract class ModelAbstract{
    protected $pdo;

    public function __construct(){
        require_once "./configBd.php";

        $this->pdo = new \PDO(DSN, USER, MDP, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }

    public function executerReq(string $query, $data = []){

        $stmt = $this->pdo->prepare($query);

        $stmt->execute($data);

        return $stmt;
    }

    public function getAll($table){
        $stmt = $this->executerReq("SELECT * FROM " . $table);

        return $stmt;
    }

    public function getById($table, $id){

        $query = "SELECT * FROM $table WHERE id = :id";

        $stmt = $this->executerReq($query, ["id" => $id]);
        
        return $stmt;
    }

    abstract function add($objet);
    abstract function delete($id);
    abstract function update($objet);
    abstract function find($id);
    abstract function findAll();

}