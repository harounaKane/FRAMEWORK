<?php
include "Entity/Animal.php";
include "Entity/Carnivore.php";
include "Entity/Secret.php";
include "Entity/SecretEnfant.php";
include "Entity/MonInterface.php";
include "Entity/Lion.php";
include "Entity/Vache.php";

$l = new Lion("Grise", 200);
$v = new Vache("Noire", 300);

$s = new SecretEnfant;

var_dump( $s->code());
var_dump( $l->boire() );
var_dump( $v->boire() );