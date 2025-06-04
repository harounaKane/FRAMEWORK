<?php

namespace MVC\Controller;

use MVC\Entity\Personne;
use MVC\Model\PersonneModel;

class PersonneController extends ControllerAbstract{
   
    public function actionUser(){
        if( isset($_GET['actionUser']) ){

            $personneMdl = new PersonneModel();

            switch( $_GET['actionUser'] ){

                case "sow":
                    if( isset($_POST['id']) ){
                        $personneMdl->delete($_POST['id']);
                        header("location: ?actionUser=user");
                        exit;
                    }

                    $personne = $personneMdl->find($_GET['id']);
                    $this->render("personne/sow",["personne" => $personne]);
                    break;

                case "update":
                    if( isset($_POST['login']) ){
                        extract($_POST);
                        $personne = new Personne($id, $prenom, $login, $mdp, $role);

                        $personneMdl->update($personne);

                        header("location: ?actionUser=user");
                        exit;
                    }

                    $personne = $personneMdl->find($_GET['id']);
                    $this->render("personne/update",["personne" => $personne]);
                    break;

                case "logon":

                    // si form submit
                    if( isset($_POST['login']) ){
                        extract($_POST);
                        $personne = new Personne(0, $prenom, $login, $mdp, 0);
                        
                        $personneMdl->add($personne);

                        header("location: ?actionUser=login");
                        exit;
                    }

                    $this->render("personne/logon");
                    break;
                    
                case "login":
                    // si form submit
                    if( isset($_POST['login']) ){
                        $personne = $personneMdl->login($_POST['login'], $_POST['mdp']);

                        if( $personne ){
                            $_SESSION['user'] = serialize($personne);

                            header("location: .");
                            exit;
                        }
                    }

                    $this->render("personne/login");
                    break;
                    
                case "user":
                    $personnes = $personneMdl->findAll();

                    $this->render("personne/user", ["personnes" => $personnes]);
                    break;
                    
                case "logout":
                    session_destroy();
                    header("location: .");
                    exit;
            }
        }
    }

}
