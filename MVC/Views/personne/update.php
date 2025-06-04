    <h2 class="text-center">Update</h2>

    <form action="" method="post">
        <input type="hidden" value="<?= $personne->getId(); ?>" name="id">
        <?php include "_form.php"; ?>

        <div class="form-check">
            <input class="form-check-input" type="radio" value="1" id="admin" name="role"
            <?= isset($personne) && $personne->getRole() ? 'checked' : '' ?>>
            <label class="form-check-label" for="admin">
                Admin
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" value="0" id="user" name="role"
             <?= isset($personne) && !$personne->getRole() ? 'checked' : '' ?> >
            <label class="form-check-label" for="user">
                User
            </label>
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>