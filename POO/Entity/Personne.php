<?php

class Personne
{
    private $id;
    private $prenom;
    private $login;
    private $mdp;

    public function __construct($id,  $prenom,  $login,  $mdp)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->mdp = $mdp;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function setMdp($mdp): void
    {
        $this->mdp = $mdp;
    }
}
