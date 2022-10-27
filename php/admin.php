<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/admin.css">
        <title>Admin</title>
    </head>
    
    <body>
        <?php

        //Récupère le formulaire contenant la partie php
        include("resources/formulaire.php");

        //Renvoie sur la page login si l'utilisateur n'est pas connecté
        if (!isset($_SESSION['email'])) { 
            header('location: login.php');
        }

        ?>

        <div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark navbar-collapse">
             <!--Les balises <i> sont uniquements affichées lorsque l'utilisateur est sur un écran plus petit comme un téléphone.-->
            <i class="bi bi-boxes"></i>
            <!--Les balises <a> sont uniquements affichées lorsque l'utilisateur est sur un écran plus grand, donc quand les balises <i> ne sont plus visibles.-->
            <a class="align-items-center text-white text-decoration-none"><span class="bi bi-boxes"></span> GIM</a>
            <hr>
            <!--La première balise <ul> permet l'affichage des bouttons en haut de la sidebar, et la class mb-auto permet de décaler la deuxième liste en bas de l'écran.-->
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <i class="bi bi-house-fill"></i>
                    <a href="" class="nav-link text-light"><span class="bi bi-house-fill"></span> Accueil</a>
                </li>
                <li>
                    <i class="bi bi-speedometer2"></i>
                    <a href="" class="nav-link active text-light"><span class="bi bi-speedometer2"></span> Dashboard</a>
                </li>
                <li>
                    <i class="bi bi-calendar-check-fill"></i>
                    <a href="" class="nav-link text-light" aria-current="page"><span class="bi bi-calendar-check-fill"></span> To do list</a>
                </li>
                <li>
                    <i class="bi bi-archive-fill"></i>
                    <a href="" class="nav-link text-light"><span class="bi bi-archive-fill"></span> Produits</a>
                </li>
                <li>
                    <i class="bi bi-person-lines-fill"></i>
                    <a href="" class="nav-link text-light"><span class="bi bi-person-lines-fill"></span> Clients</a>
                </li>
            </ul>
            <hr>
            <!--Ceci est la deuxième liste qui contient le settings et le log out.-->
            <form method="post">
                <ul class="nav flex-column">
                    <li>
                        <i class="bi bi-gear-fill"></i>
                        <a href="" class="nav-link text-light"><span class="bi bi-gear-fill"></span> Paramètres</a>
                    </li>
                    <li>
                        <i class="bi bi-power"></i>
                        <button class="nav-link text-danger border border-0 bg-transparent " name="logout"><span class="bi bi-power"></span> Déconnexion</button>
                    </li>
                </ul>
            </form>
        </div>
        
        <!--Ceci est la section a droite de la navbar.-->
        <section id="dashboard">
            <h1 class="text-light">Bienvenue,
                <?php 
                //Affiche le mail de la personne connectée
                echo $_SESSION['email'] 
                ?>
            </h1>
            <?php
            //Execute la fonction getMail() pour afficher les messages sur la page
            getMail(); 
            ?>
        </section>
    </body>
</html>