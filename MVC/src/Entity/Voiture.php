<?php

namespace MVC\Entity;

class Voiture
{
    // attributs - propriétés - variables d'instance
    private int $id;
    private string $matricule;
    private string $marque;
    private float $prix;
    private Personne $proprio;

    // variables de classe
    private static $compteur = 0;
    public const PORTE = 4;

    //constructeur
    public function __construct(string $marque, float $prix, Personne $proprio, $id = 0)
    {
        self::$compteur++;

        $this->id = $id;
        $this->marque = $marque;
        $this->setPrix($prix);
        $this->proprio = $proprio;
        $this->matricule = $this->makeMatricule() . "_" . self::$compteur;
    }

    private function makeMatricule($nbr = 7)
    {
        $str = "";

        for ($i = 0; $i < $nbr; $i++) {
            $str .= chr(rand(0, 25) + 65);
        }

        return $str;
    }

    public static function getCompteur()
    {
        return self::$compteur;
    }

    // accesseurs (Getter)

    public function getId(): int
    {
        return $this->id;
    }

    public function getMatricule(): string
    {
        return $this->matricule;
    }

    public function getMarque(): string
    {
        return $this->marque;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function getProprio(): Personne
    {
        return $this->proprio;
    }


    //muttateurs (setter)
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setMatricule(string $matricule): void
    {
        $this->matricule = $matricule;
    }

    public function setMarque(string $marque): void
    {
        $this->marque = $marque;
    }

    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    public function setProprio(Personne $proprio): void
    {
        $this->proprio = $proprio;
    }



    public function description()
    {
        return $this->id . " " . $this->marque . " " . $this->prix;
    }
}

// JAVA
/*class Voiture{
    public int id;
    public String marque;
}

*/