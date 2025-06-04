<?php

session_start();

use MVC\Controller\PersonneController;

include "vendor/autoload.php";

$persoCtl = new PersonneController();


$persoCtl->actionUser();

if( empty($_GET) ) include "Views/template.php";
