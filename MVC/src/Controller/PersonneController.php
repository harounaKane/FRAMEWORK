<?php

namespace MVC\Controller;

use MVC\Model\PersonneModel;

class PersonneController extends ControllerAbstract{
   
    public function actionUser(){
        if( isset($_GET['actionUser']) ){

            $personneMdl = new PersonneModel();

            switch( $_GET['actionUser'] ){
                case "logon":

                    // si form submit
                    if( isset($_POST['login']) ){
                        var_dump($_POST);
                    }

                    $this->render("personne/logon");
                    break;
                    
                case "login":
                    // si form submit
                    if( isset($_POST['login']) ){
                        var_dump($_POST);
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
