<?php

include "Entity/Voiture.php";
include "Entity/Personne.php";

$p1 = new Personne(1, "Jean", "aston", "aston");

$v1 = new Voiture("Opel", 7800, $p1);
$v2 = new Voiture("Peugeot", 5000, $p1, 800);


var_dump($v1);
var_dump($p1);



