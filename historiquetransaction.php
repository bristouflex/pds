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
    header("Location: index.php");
}

require_once 'view/header.php';
require_once 'view/menu.php';

$bdd = connectBdd();
$query = $bdd->prepare("SELECT id FROM inscrit WHERE email = :email AND isMember=:isMember");
$query->execute(["email" => $_SESSION["user"]->getEmail(), "isMember" => $_SESSION["user"]->getIsMember()]);
$verif = $query->fetch();
$_SESSION['id'] = $verif[0];

echo "<div class=\"col-md-9\">";
$query = $bdd->prepare("SELECT * FROM historiquetransaction WHERE idUser = :id");
$query->execute(["id" => $_SESSION['id']]);
$verif = $query->fetch();

if (empty($verif)) {
    echo "<h3>Votre historique de transactions est vide </h3>";
} else {

    echo "<h3 align='center'>Votre historique de transactions:</h3>";
    echo "<table class='table table-bordered table-responsive'>";
    echo "<tr>
        <th>Numéro</th>
        <th>IP</th>
        <th>Date</th>
        <th>Montant</th>
    </tr>
    ";
    $i = 1;
    $query = $bdd->prepare("SELECT * FROM historiquetransaction WHERE idUser = :id");
    $query->execute(["id" => $_SESSION['id']]);
    while ($data = $query->fetch()) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $data['adresseIP'] . "</td>";
        echo "<td>" . $data['date'] . "</td>";
        echo "<td>" . $data['montant'] . "</td>";
        echo "</tr>";
        $i++;
    }
    echo "</table>";
}
echo "</div>";
require_once 'view/footer.php';



