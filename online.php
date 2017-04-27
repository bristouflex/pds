<?php
require "init.php";


if (isConnected()) {
    /* $bdd = connectBdd();
      $query2 = $bdd->prepare("SELECT identity FROM inscrit WHERE email = :email");
      $query2 -> execute(["email" => $_SESSION["email"]]);
      $resultat2 = $query2 -> fetch();
      echo $resultat2; */

    unset($_SESSION["error_subscribe"]);
} else {
    unset($_SESSION["User"]);
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>AEN - Online</title>
        <meta name="Description" lang="en" content="Bienvenue sur le site de l'AEN">


<?php
        require 'header.php';
welcome();
verifDate(); // verifie si la date d'aujourdhui est en bdd
printMeteo(); // affiche la meteo
showmoney();
?>

        <br><a href="money.php">Ajouter du crédit</a>
        <br><a href="historiquetransaction.php">Historique Transactions OK</a>
<?php
if ($_SESSION["user"]->getIsMember() == 0) {
    echo '<br><a href="buyservice.php">Demande de service</a>';
    echo '<br><a href="myservice.php">Mes services</a>';
}if ($_SESSION["user"]->getIsMember() == 1) {
    echo'<br><a href="buyactivite.php">Souscrire à une activité</a>';
    echo '<br><a href="myactivity.php">Mes activités</a>';
}
?>
        <br><a href="messages.php">Contacter un administrateur</a>
        <br><a href="myinfo.php">Mes informations personnelles OK</a>
        <br><a href="logout.php">Deconnexion OK</a>
    </body>
</html>
