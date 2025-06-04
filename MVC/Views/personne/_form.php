
        <div class="mb-3">
            <label for="" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="prenom" value="<?= isset($personne) ? $personne->getPrenom() : '' ?>" >
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" value="<?= isset($personne) ? $personne->getLogin() : '' ?>">
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="mdp">
        </div>