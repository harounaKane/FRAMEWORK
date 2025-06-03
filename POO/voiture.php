<?php

include "Entity/Voiture.php";
include "Entity/Personne.php";

$pdo = new PDO("mysql:host=localhost;dbname=aston_poo", "root", "", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

include "fonction.php";

$personnes = getPersonnes();

$query = "SELECT * FROM voiture";

$res = $pdo->prepare($query);
$res->execute();

$tab = [];

 while($result = $res->fetch()){
    extract($result);

    // Recup du proprio
    $p = getPersonneById($proprio);

    $v = new Voiture($marque, $prix, $p, $id);
    $v->setMatricule($matricule);
    $tab[] = $v;
 }

 // taste si le formulaire est envoyé
 if( !empty($_POST) ){
    extract($_POST);
    $p = getPersonneById($proprio);

    $v = new Voiture($marque, $prix, $p);

    $query = "INSERT INTO voiture (matricule, marque, prix, proprio) VALUES(:matricule, :marque, :price, :proprio)";

    $res = $pdo->prepare($query);
    $res->execute([
        "matricule" => $v->getMatricule(),
        "marque"    => $v->getMarque(),
        "price"     => $v->getPrix(),
        "proprio"    => $v->getProprio()->getId()
    ]);

    // redirection
    header("location: voiture.php");
    exit;
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <nav>
        <a href=".">Personne</a>
        <a href="voiture.php">Voiture</a>
    </nav>
    
    <main>
        <table>
            <tr>
                <th>Matricule</th>
                <th>Marque</th>
                <th>Prix</th>
                <th>Proprio</th>
                <th>Action</th>
            </tr>
            <?php foreach($tab as $voiture): ?>
                <tr>
                    <td> <?= $voiture->getMatricule(); ?> </td>
                    <td> <?= $voiture->getMarque(); ?> </td>
                    <td> <?= $voiture->getPrix(); ?> </td>
                    <td> <?= $voiture->getProprio()->getPrenom(); ?> </td>
                    <td>
                        <a href="">U</a> | 
                        <a href="">X</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <form action="" method="post">
            <label for="">Marque</label>
            <input type="text" name="marque">
            <label for="">Prix</label>
            <input type="text" name="prix">

            <select name="proprio" id="">
                <?php foreach($personnes as $personne): ?>
                    <option value="<?= $personne->getId(); ?>"> 
                        <?= $personne->getPrenom(); ?> 
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit">
        </form>

    </main>

</body>
</html>