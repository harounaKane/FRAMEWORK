<?php

namespace MVC\Controller;

abstract class ControllerAbstract{

    public function render($view, $data = []){
        ob_start();

        $page = "Views/" . $view . ".php";

        extract($data);

        $content = ob_get_clean();

        include "Views/template.php";
    }

    public function isConnected(){
        return isset( $_SESSION['user'] );
    }

    public function isAdmin(){
        return $this->isConnected() && $this->getuser()->getRole();
    }

    public function getuser(){
        return $this->isConnected() ? unserialize($_SESSION['user']) : null;
    }
}