<?php
//session_start() crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie. 
session_start();

//Definition des variables pour la base de données et le message d'erreur
$servername = "localhost";
$username = "root";
$password = "root";
$databasename = "portfolio";

//La variable error est le message d'erreur qui s'affiche sur la page login
$error = null;

//Création d'une nouvelle connection à la BDD mysql
$conn = new mysqli($servername, $username, $password, $databasename);

//On vérifie quel boutton a été cliqué, si c'est le boutton pour envoyer un message
if (isset($_POST['sendmail'])) {

    //On vérifie que le numéro de téléphone soit uniquement 10 chiffres et que les autres cases soient bien complétées
    if (preg_match('/^[0-9]{10}+$/',$_POST['telephone']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['message'])) {

        //On défini la ligne de commande SQL à rentrer
        $sql = "INSERT INTO form VALUES (NULL, '$_POST[lastname]', '$_POST[firstname]', '$_POST[email]', '$_POST[telephone]', '$_POST[message]')";
        
        //On éxécute la commande SQL précédente dans la BDD mysql
        mysqli_query($conn, $sql);

    }

//Si c'est le boutton pour se connecter à la page admin
} else if (isset($_POST['login'])) {

    //On vérifie que le mail et le mot de passe soient rentrées
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        //On défini la ligne de commande SQL à rentrer
        $query = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
        //On crée une variable qui éxecute la fonction
        $result = mysqli_query($conn,$query);
        
        //Si le mail et son mot de passe sont trouvés dans la base de données
        if (mysqli_num_rows($result) == 1) {

            //On définie la session pour rester connecté même apres un changement de page ou fermeture
            $_SESSION['email'] = $_POST['email'];

        } else {

            //Sinon on change le message d'erreur
            $error = "E-mail ou mot de passe invalide";
        }
    }

//Si c'est le boutton pour se déconnecter de la page admin
} else if (isset($_POST['logout'])) {

    //On efface la session $_SESSION
    session_destroy();
    //On renvoie sur la page login
    header("location: login.php");

}

//La fonction getMail() permet à la page admin de directement récuperer les messages
function getMail() {

    //On dit que la variable $conn est globale au php sinon la fonction ne reconnait pas la variable
    global $conn;

    $query = "SELECT id, nom, prenom, telephone, email, message FROM form";
    $result = mysqli_query($conn, $query);

    //On crée la liste en balises html
    echo "<ul id='messagelist'>";
    
    //Si au moins un message est trouvé dans la BDD
    if (mysqli_num_rows($result) > 0) {

        //On affiche un message indiquant qu'on a des messages
        echo "<h2 class='text-light'>Vous avez de nouveaux messages</h2>";
        //Boucle qui permet de récupèrer la ligne suivante d'un ensemble de résultats sous forme de tableau associatif
        //Chaque fois que la commande est éxecutée, elle passe à la ligne suivante
        //$row arrivera donc au tour résultant null, ce qui sera une condition de sortie
        while($row = mysqli_fetch_assoc($result)) {

            //echo permettant d'afficher avec un css toutes les données du tableau de la ligne en question
            echo '
                <div id="card" class="card mx-auto w-75 mt-4 bg-dark card-shadow">
                    <div class="card-body text-light">' .
                        '<h3 id="card-title">' . $row["id"] . '</h3>' .
                        '<p class="text-start"> Nom et Prénom: ' . $row["nom"] . " " . $row["prenom"] . '</p>' .
                        '<p class="text-start"> E-mail: ' . $row["email"] . '</p>' .
                        '<p class="text-start"> Telephone: ' . $row["telephone"] . '</p>' .
                        '<p class="text-start"> Message: ' . $row["message"] . '</p>' .
                    '</div>
                </div>
            ';
        }

    //Fermeture de la liste
    echo "</ul>";

    } else {

        //On affiche un message indiquant qu'on n'a aucun message
        echo "<h2 class='text-light'>Vous n'avez aucun nouveau message</h2>";

    }

}

?>