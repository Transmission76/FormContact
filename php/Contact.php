<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<!-- Inclus la page php pour le formulaire -->
<?php include("resources/formulaire.php"); ?>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><span3>CV</span3></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php"><span2>Home</span2></a>
              </li> <!-- (Tout code au dessus) Rends navbar clickable et fonctionnel + boutton (home) devient utilisable-->
                    <!-- Ajoute le dropdown menu de la navbar et rends les boutton utilisable -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span2>Information</span2>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="Portfolio.html"></i><span>Portfolio</span></a></li>
                  <li><a class="dropdown-item" href="Experiences.html"><span>Experiences</span></a></li>
                  <li><a class="dropdown-item" href="Formulaire.php"><span>Contactez-Moi</span></a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="Enterprise.html"><span>Enterprise</span></a></li>
                </ul>
              </li>
            </ul> <!-- Search bar de la Navbar (pas de fonction) -->
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <!-- Cree le tableau de contact et les donne des noms. -->
<div class="container">
    <form method="post">
          <h1>Formulaire de contact</h1>
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="lastname" placeholder="Votre nom">

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="firstname" placeholder="Votre nom">


        <label for="tel">Téléphone</label>
        <input type="number" id="tel" name="telephone" placeholder="Votre numéro de téléphone">

        <label for="mail">Email</label>
        <input type="text" id="mail" name="email" placeholder="Votre mail">

        <label for="subject">Message</label>
        <textarea id="subject" name="message" placeholder="Ecrivez votre message" style="height:200px"></textarea>
        <br></br>
        <input type="submit" value="Envoyer" name="sendmail">


      </form>
</div>

</body>
</html>