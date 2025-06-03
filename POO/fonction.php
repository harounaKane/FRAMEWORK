<?php

function getPersonnes(){
    global $pdo;
    $query = "SELECT * FROM personne";

    $res = $pdo->prepare($query);
    $res->execute();

    $tab = [];

    while($result = $res->fetch()){
        extract($result);

        $p = new Personne($id, $prenom, $login, $mdp);
        $tab[] = $p;
    }

    return $tab;
}

function getPersonneById($id){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM personne WHERE id = ?");
    $stmt->execute( [$id] );
    $resQuery = $stmt->fetch();
    $p = new Personne($resQuery['id'], $resQuery['prenom'], $resQuery['login'], $resQuery['mdp']);

    return $p;
}

function getVoitureById($id){
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM voiture WHERE id = ?");
    $stmt->execute( [$id] );
    $resQuery = $stmt->fetch();
    extract($resQuery);

    $p = getPersonneById($proprio);

    $v = new Voiture($marque, $prix, $p, $id);
    $v->setMatricule($matricule);

    return $v;
}