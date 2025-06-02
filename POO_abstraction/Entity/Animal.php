<?php

abstract class Animal{
    protected $couleur;
    protected $poids;

    public function __construct($couleur,  $poids)
    {
        $this->couleur = $couleur;
        $this->poids = $poids;
    }

    public function boire(){
        return " Je bois de l'eau ";
    }

    abstract function crier();

    abstract function manger();


    public function getCouleur()
    {
        return $this->couleur;
    }

    public function getPoids()
    {
        return $this->poids;
    }

    public function setCouleur($couleur): void
    {
        $this->couleur = $couleur;
    }

    public function setPoids($poids): void
    {
        $this->poids = $poids;
    }
}