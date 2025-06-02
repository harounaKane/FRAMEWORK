<?php

include "Entity/Personne.php";
include "Entity/Compte.php";
include "Entity/CompteAvecDec.php";

try{
    $p1 = new Personne(10, "Jean", "aston", "aston");
    $c1 = new Compte(15222, 5000, $p1);
    $c2 = new Compte(9852, 0, $p1);

    $cd1 = new CompteAvecDec(5000, 0, new Personne(50, "Claude", "as", "ton"), 500);


    var_dump( $cd1 instanceof Compte );
    var_dump( $cd1 instanceof CompteAvecDec );
    var_dump( $c1 instanceof Compte );
    var_dump( $c1 instanceof CompteAvecDec );

    //var_dump($c1->description());
    //var_dump($cd1->description());

}catch(Exception $e){
    var_dump($e->getMessage());
}