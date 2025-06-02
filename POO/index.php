<?php

include "Entity/Voiture.php";

$v1 = new Voiture("Opel", 7800);
$v2 = new Voiture("Peugeot", 5000, 800);

$v1->setPrix(5666);


var_dump($v1);
var_dump($v2);



