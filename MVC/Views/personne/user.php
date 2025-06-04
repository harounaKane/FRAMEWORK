
    <h2 class="text-center">Liste user</h2>

    <table class="table table-striped">
        <tr class="table-dark">
            <th>Prénom</th>
            <th>Login</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        <?php foreach($personnes as $personne): ?>
            <tr>
                <td> <?= $personne->getPrenom(); ?> </td>
                <td> <?= $personne->getLogin(); ?> </td>
                <td> <?= $personne->getRole(); ?> </td>
                <td>
                    <a href="?actionUser=update&id=<?= $personne->getId(); ?>"><i class="fa-solid fa-pen"></i></a> | 
                    <a href="?actionUser=sow&id=<?= $personne->getId(); ?>"><i class="fa-solid fa-eye"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        
    </table>

    
