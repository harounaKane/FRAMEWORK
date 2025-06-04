    <h2 class="text-center">Détail</h2>

    <div>
        <?= $personne->getPrenom(); ?>
    </div>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $personne->getId(); ?>">
        <input type="submit" class="btn btn-danger" value="Supprimer">
    </form>