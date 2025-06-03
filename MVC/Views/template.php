<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <header class="bg-light mb-5 p-3">
        <h1 class="text-center h3"><a href=".">MVC</a></h1>
        <nav>
            <a href="?actionUser=logon" class="navbar-brand">Inscription</a>
            <a href="?actionUser=login" class="navbar-brand">Connexion</a>

            <a href="?actionUser=user" class="navbar-brand">Personne</a>
            <a href="" class="navbar-brand">Voiture</a>
            <a href="?actionUser=logout" class="navbar-brand">Déconnexion</a>
        </nav>
    </header>    

    <main class="container-fluid">
        <?= $content ?? 'Contenu vide !!'; ?>
    </main>

    <footer class="bg-light p-4 mt-5 text-center">
        &copy; - ASTON
    </footer>

</body>
</html>