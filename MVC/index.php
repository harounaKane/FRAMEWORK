<?php

session_start();

use MVC\Controller\PersonneController;
use MVC\Controller\VoitureController;

include "vendor/autoload.php";

$persoCtl = new PersonneController();
$voitureCtl = new VoitureController();


$persoCtl->actionUser();
$voitureCtl->actionVoiture();

if( empty($_GET) ) include "Views/template.php";
