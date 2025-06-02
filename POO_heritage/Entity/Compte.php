<?php

class Compte
{
    protected int $numero;
    protected float $solde;
    protected Personne $titulaire;

    public function __construct(int $numero, float $solde, Personne $titulaire)
    {
        $this->numero = $numero;
        $this->solde = $solde;
        $this->titulaire = $titulaire;
    }

    public function deposer(float $montant){
        $this->solde += $montant;
    }

    
    public function retirer(float $montant){
        if( $montant <= $this->solde ){
            $this->solde -= $montant;
        }else{
            throw new Exception("Montant trop élevé");
        }
        
    }

    public function virerVers(Compte $dest, float $montant){
        $this->retirer($montant);
        $dest->deposer($montant);
    }

    public function description(){
        return "numéro: " . $this->numero . ", solde: " . $this->solde ." pour " . $this->titulaire->getPrenom();
    }


    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getSolde(): float
    {
        return $this->solde;
    }

    public function getTitulaire(): Personne
    {
        return $this->titulaire;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function setSolde(float $solde): void
    {
        $this->solde = $solde;
    }

    public function setTitulaire(Personne $titulaire): void
    {
        $this->titulaire = $titulaire;
    }
}
