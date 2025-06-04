    <h2 class="text-center">Liste de voiture</h2>

    <a href="?actionVoiture=add" class="btn btn-success mb-2">Ajouter</a>

    <table class="table table-striped">
        <tr class="table-dark">
            <th>Matricule</th>
            <th>Marque</th>
            <th>Prix</th>
            <th>Proprio</th>
            <th>Action</th>
        </tr>

        <?php foreach($voitures as $voiture): ?>
            <tr>
                <td> <?= $voiture->getMatricule(); ?> </td>
                <td> <?= $voiture->getMarque(); ?> </td>
                <td> <?= $voiture->getPrix(); ?> </td>
                <td> <?= $voiture->getProprio()->getPrenom(); ?> </td>
                <td>
                    <a href="?actionVoiture=update&id=<?= $voiture->getId(); ?>"><i class="fa-solid fa-pen"></i></a>
                    |
                    <a href="?actionVoiture=sow&id=<?= $voiture->getId(); ?>">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>