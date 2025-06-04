<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <header class="bg-light mb-5 p-3">
        <h1 class="text-center h3"><a href=".">MVC</a></h1>
        <nav>
            <?php if( !isset($_SESSION['user'])): ?>
                <a href="?actionUser=logon" class="navbar-brand">Inscription</a>
                <a href="?actionUser=login" class="navbar-brand">Connexion</a>
            <?php else: ?>

                <?php if( unserialize($_SESSION['user'])->getRole() ): ?>
                    <a href="?actionUser=user" class="navbar-brand">Personne</a>
                    <a href="?actionVoiture=voiture" class="navbar-brand">Voiture</a>
                <?php endif; ?>

                <a href="?actionUser=logout" class="navbar-brand">Déconnexion</a>
            <?php endif; ?>
        </nav>
        <div class="text-end">
            <?= isset($_SESSION['user']) ? "Bonjour " . unserialize($_SESSION['user'])->getPrenom() : '' ?>
        </div>    
    </header>    

    <main class="container-fluid">
        <?= $content ?? ''; ?>
    </main>

    <footer class="bg-light p-4 mt-5 text-center">
        &copy; - ASTON
    </footer>

</body>
</html>