<?php

include "Entity/Voiture.php";
include "Entity/Personne.php";

$pdo = new PDO("mysql:host=localhost;dbname=aston_poo", "root", "", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

include "fonction.php";

$tab = getPersonnes();
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
                <th>ID</th>
                <th>Prénom</th>
                <th>Login</th>
            </tr>
        
            <?php foreach($tab as $personne): ?>
                <tr>
                    <td> <?php echo $personne->getId(); ?> </td>
                    <td> <?= $personne->getPrenom(); ?> </td>
                    <td> <?= $personne->getLogin(); ?> </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>

</body>
</html>