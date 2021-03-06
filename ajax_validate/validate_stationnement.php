<?php

require 'initValidate.php';


$error = 0;
$bdd = connectBdd();
$query = $bdd->prepare("SELECT ttc FROM abris WHERE nom = :nom");
$query->execute(["nom" => $_POST["abris"]]);
$verif = $query->fetch();
if ($_POST["abris"] != 'exterieur') {
    $prix = $verif[0]; // prix abris
} else {
    $prix = $verif[0] * $_POST["surface"];
}

$nb_jours = strtotime($_POST["fin"]) - strtotime($_POST["debut"]);
$nb_jours /= 86400;
if ($nb_jours <= 1) { //on vérifie si la date est valide
    echo '<b> erreur date début et fin</b><br>';
    $error = 1;
}

if ($_POST["categorie"] >= 1 && $_POST["categorie"] <= 3) {
    $query = $bdd->prepare("SELECT ttc FROM categorie WHERE id = :id");
    $query->execute(["id" => $_POST["categorie"]]);
    $verif = $query->fetch();
    if ($nb_jours > 31) {
        $prix += $verif[0]*ceil($nb_jours/31); //on arrondi au nombre de mois superieur
    } else {
        $prix += $verif[0]; // prix categorie mensuel
    }
} else {
    $query = $bdd->prepare("SELECT ttc FROM categorie WHERE id = :id");
    $query->execute(["id" => $_POST["categorie"]]);
    $verif = $query->fetch();
    $nb_jours = (int)$nb_jours;
    $prix += $verif[0] * $nb_jours; // prix categorie journalier
}
if (verifDateService(strtotime($_POST["debut"])) == FALSE) {
    echo '<b> vous devez reserver avant 24h!</b><br>';
    $error = 1;
}
$query = $bdd->prepare("SELECT COUNT(*) FROM options_stationnement WHERE :debut >= debut AND :debut <= fin || :fin >= debut AND  :fin <= fin");
$query->execute(["debut" => $_POST["debut"], "fin" => $_POST["fin"]]);
$verif = $query->fetch();
$total = $verif[0];
if ($verif[0] >= 5) {
    $error = 1;
    echo '<b>erreur date impossible trop de stationnements</b><br>';
}
if (alreadyLanded($_POST["debut"]) != 1) {
    echo '<b>vous devez demander à atterir avant de demander à stationner</b><br>';
    $error = 1;
}
if ($error != 1) {
    $_SESSION["panier"]->setStationnement(new Stationnement($_POST["abris"], $_POST["categorie"], $_POST["debut"], $_POST["fin"], $prix));
    echo "<p align='center'>achat effectué</p>";

} else {
    $_SESSION["panier"]->setStationnement(null);
}
?>
