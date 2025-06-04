<?php

namespace MVC\Model;

use MVC\Entity\Personne;

class PersonneModel extends ModelAbstract{

    public function login(string $login, string $mdpForm){
        $stmt = $this->executerReq("SELECT * FROM personne WHERE login = :login", ["login" => $login]);

        // tester si on a une ligne
        if( $stmt->rowCount() != 0 ){
            $res = $stmt->fetch();
            extract($res);
            
            $personne = new Personne($id, $prenom, $login, $mdp, $role);

            // Vérification mdp saisi a mdp de la BD
            if( password_verify($mdpForm, $personne->getMdp()) ){
                return $personne;
            }
        }
        
        return null;
    }

    public function findAll()
    {
        $stmt = $this->getAll("personne");
        
        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $tab[] = new Personne($id, $prenom, $login, $mdp, $role);
        }

        return $tab;
    }

    public function find($id){
        $stmt = $this->executerReq("SELECT * FROM personne WHERE id = :id", ["id" => $id]);

        if( $stmt->rowCount() > 0 ){
            extract($stmt->fetch());

            return new Personne($id, $prenom, $login, $mdp, $role);
        }

        return null;
    }

    public function add($personne){
        // $query = "INSERT INTO personne VALUES (NULL, :prenom, :login, :mdp, 0)";
        $query = "INSERT INTO personne (prenom, login, mdp) VALUES (:prenom, :login, :mdp)";
        $data = [
            "prenom"    => $personne->getPrenom(),
            "login"     => $personne->getLogin(),
            "mdp"       => password_hash($personne->getMdp(), PASSWORD_DEFAULT)
        ];

        $this->executerReq($query, $data);
    }

    public function update($personne){
        $this->executerReq("UPDATE personne SET prenom = :prenom, login = :login, role = :role WHERE id = :id", [
            "prenom"    => $personne->getPrenom(),
            "login"     => $personne->getLogin(),
            "role"      => $personne->getRole(),
            "id"        => $personne->getId(),
        ]);
    }

    public function delete($id){
        $stmt = $this->executerReq("DELETE FROM personne WHERE id = :id", ["id" => $id]);
    }
}