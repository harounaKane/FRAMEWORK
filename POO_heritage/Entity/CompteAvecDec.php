<?php 


class CompteAvecDec extends Compte{
    private float $decouvert;

    public function __construct(int $numero, float $solde, Personne $titulaire, $decouvert)
    {
        parent::__construct($numero, $solde, $titulaire);
        $this->decouvert = $decouvert;
    }

    public function description()
    {
        return parent::description() . ", découvert: " . $this->decouvert;
    }

    public function retirer(float $montant)
    {
        if( $montant <= $this->solde + $this->decouvert ){
            $this->solde -= $montant;
        }else{
            throw new Exception("Montant trop élevé");
        }
    }

    public function getDecouvert(): float {
        return $this->decouvert;
    }

	public function setDecouvert(float $decouvert): void {
        $this->decouvert = $decouvert;
    }

	
}