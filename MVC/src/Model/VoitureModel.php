<?php 

namespace MVC\Model;

use MVC\Entity\Voiture;

class VoitureModel extends ModelAbstract{
    private $persMdl;

    public function __construct()
    {
        parent::__construct();
        $this->persMdl = new PersonneModel();
    }

    public function find($id){
        $stmt = $this->getById("voiture", $id);

        extract($stmt->fetch());

        $v = new Voiture($marque, $prix, $this->persMdl->find($proprio), $id);
        $v->setMatricule($matricule);

        return $v;
    }

    public function findAll(){
        $stmt = $this->getAll("voiture");        

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $v = new Voiture($marque, $prix, $this->persMdl->find($proprio), $id);
            $v->setMatricule($matricule);

            $tab[] = $v;
        }
        
        return $tab;
    }

    public function add($voiture){
        $query = "INSERT INTO voiture VALUE(NULL, :matricule, :marque, :prix, :client)";

        $this->executerReq($query, [
            "matricule" => $voiture->getMatricule(),
            "marque"    => $voiture->getMarque(),
            "prix"      => $voiture->getPrix(),
            "client"    => $voiture->getProprio()->getId()
        ]);
    }

    public function update($objet)
    {
        
    }

    public function delete($id)
    {
        
    }
    
}