<?php

include "Entity/Voiture.php";
include "Entity/Personne.php";

$pdo = new PDO("mysql:host=localhost;dbname=aston_poo", "root", "", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
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

    $v = new Voiture($marque, $prix, $p, $id);

    // INSERTION
    if( empty($_POST['id']) ){
        $query = "INSERT INTO voiture (matricule, marque, prix, proprio) VALUES(:matricule, :marque, :price, :proprio)";

        $res = $pdo->prepare($query);
        $res->execute([
            "matricule" => $v->getMatricule(),
            "marque"    => $v->getMarque(),
            "price"     => $v->getPrix(),
            "proprio"    => $v->getProprio()->getId()
        ]);
        //UPDATE
    }else{
        var_dump($v);
        $query = "UPDATE voiture SET marque = ?, prix = ?, proprio = ? WHERE id = ?";

        $res = $pdo->prepare($query);
        var_dump($res);

        $res->execute([
            $v->getMarque(),
            $v->getPrix(),
            $v->getProprio()->getId(),
            $v->getId()
        ]);
    }


    // redirection
   header("location: voiture.php");
    exit;
 }

 if( isset($_GET['action']) ){
    $action = $_GET['action'];

    switch( $action ){
        case "delete":
            $res = $pdo->prepare("DELETE FROM voiture WHERE id = ?");
            $res->execute( [$_GET['id']] );
            // redirection
            header("location: voiture.php");
            exit;

        case "update":
            $voitureUp = getVoitureById($_GET['id']);
            break;
    }
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
                        <a href="?action=update&id=<?= $voiture->getId(); ?>">U</a> | 
                        <a href="?action=delete&id=<?= $voiture->getId(); ?>">X</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p></p><p></p>

        <form action="" method="post">
            <input type="hidden" value="<?= isset($voitureUp) ? $voitureUp->getId() : '0' ?>" name="id">
            <label for="">Marque</label>
            <input type="text" name="marque" value="<?= isset($voitureUp) ? $voitureUp->getMarque() : '' ?>">
            <label for="">Prix</label>
            <input type="text" name="prix" value="<?= isset($voitureUp) ? $voitureUp->getPrix() : '' ?>">

            <select name="proprio" id="">
                <?php foreach($personnes as $personne): ?>
                    <option value="<?= $personne->getId(); ?>" 
                    <?= (isset($voitureUp) && $personne->getId() == $voitureUp->getProprio()->getId()) ? 'selected' : ''  ?> > 
                        <?= $personne->getPrenom(); ?> 
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit">
        </form>

    </main>

</body>
</html>