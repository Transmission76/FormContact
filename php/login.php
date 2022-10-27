<?php

//Récupère le formulaire contenant la partie php
include("resources/formulaire.php");

//Si l'utilisateur est connecté, on l'envoie directement sur la page admin
if (isset($_SESSION['email'])) {
    header('location: admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/admin.css">
        <title>Login</title>
    </head>
    <body>
        <section id="login">
            <h2 class="text-center text-light">Admin</h2>
            <div id="card" class="card mx-auto w-50 h-50 mt-4 bg-dark card-shadow" draggable="true">
                <div class="card-body">
                    <h2 class="text-center text-light">Connexion</h2>
                    <?php
                    //Si le message d'erreur est défini, on l'affiche sur la page
                    if (isset($error)) {
                        echo '<div class="alert alert-danger w-50 mx-auto" role="alert">';
                        echo $error;
                        echo '</div>';
                    }
                    ?>
                    <form class="d-flex flex-column h-50 m-auto" method="post">
                        <input type="email" class="form-control mt-2" placeholder="E-mail" name="email">
                        <input type="password" class="form-control mt-3" placeholder="Mot de passe" name="password">
                        <button class="btn btn-success mt-3" type="submit" name="login">Log In</button>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>