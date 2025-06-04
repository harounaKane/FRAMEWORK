
        <div class="mb-3">
            <label for="" class="form-label">Marque</label>
            <input type="text" class="form-control" name="marque" value="<?= isset($personne) ? $voiture->getMarque() : '' ?>" >
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Prix</label>
            <input type="text" class="form-control" name="prix" value="<?= isset($personne) ? $personne->getLogin() : '' ?>">
        </div>
        
        <select class="form-select" name="proprio">
            <?php foreach($proprios as $personne): ?>
                <option value="<?= $personne->getId() ?>"><?= $personne->getPrenom() ?></option>
            <?php endforeach; ?>
        </select>