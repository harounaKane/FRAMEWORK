<?php

namespace MVC\Model;

use MVC\Entity\Personne;

class PersonneModel extends ModelAbstract{

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

    public function find($id)
    {
        
    }

    public function add($objet)
    {
        
    }

    public function update($objet)
    {
        
    }

    public function delete($objet)
    {
        
    }
}