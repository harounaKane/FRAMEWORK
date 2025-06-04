<?php  

namespace MVC\Controller;

use MVC\Entity\Voiture;
use MVC\Model\PersonneModel;
use MVC\Model\VoitureModel;

class VoitureController extends ControllerAbstract{

    public function actionVoiture(){

        if( isset($_GET['actionVoiture']) ){
            $persMdl = new PersonneModel();
            $voitureMdl = new VoitureModel();

            switch( $_GET['actionVoiture'] ){
                case "voiture":
                    $voitures = $voitureMdl->findAll();
                    $this->render("voiture/index", ["voitures" => $voitures]);
                    break;

                case "add":
             
                    if( isset($_POST['prix']) ){
                        extract($_POST);
                        $v = new Voiture($marque, $prix, $persMdl->find($proprio));

                        $voitureMdl->add($v);

                        header("location: ?actionVoiture=voiture");
                        exit;
                    }

                    $proprios = $persMdl->findAll();
                    $this->render("voiture/new", ["proprios" => $proprios]);
                    break;

                case "sow":
                    $voiture = $voitureMdl->find($_GET['id']);
                    $this->render("voiture/sow", ["voiture" => $voiture]);
                    break;
            }
        }
    }
    
}