<?php

class Voiture{
    // attributs - propriétés - variables d'instance
    private $id;
    private $matricule;
    private $marque;
    private $prix;
    private $proprio;

    // variables de classe
    private static $compteur = 0;
    public const PORTE = 4;

    //constructeur
    public function __construct(string $marque, float $prix, Personne $proprio, $id = 0){
        self::$compteur++;

        $this->id = $id;
        $this->marque = $marque;
        $this->setPrix($prix);
        $this->proprio = $proprio;
        $this->matricule = $this->makeMatricule()."_".self::$compteur;
    }

    private function makeMatricule($nbr = 7){
        $str = "";

        for($i=0; $i<$nbr; $i++){
            $str .= chr( rand(0, 25) + 65 );
        }

        return $str;
    }

    public static function getCompteur(){
        return self::$compteur;
    }

    // accesseurs (Getter)
    public function getId(){
        return $this->id;
    }

    public function getMarque(){
        return $this->marque;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getMatricule(){return $this->matricule;}

    //muttateurs (setter)
    public function setId($id): void {
        $this->id = $id;
    }

	public function setMarque($marque): void {
        $this->marque = $marque;
    }

	public function setPrix($prix): void {
        if( is_int($prix) ){
            $this->prix = $prix;
        }
        
    }

    public function setMtricule($matricule){
        $this->matricule = $matricule;
    }

    public function description(){
        return $this->id . " " . $this->marque ." ". $this->prix;
    }

}

// JAVA
/*class Voiture{
    public int id;
    public String marque;
}

*/