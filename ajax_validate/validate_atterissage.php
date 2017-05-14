<?php

require 'initValidate.php';
$error = 0;
$bdd = connectBdd();
$query = $bdd->prepare("SELECT ttc, periode FROM avion WHERE id = :id");
$query->execute([ "id" => $_POST["avion"]]);
$infos = $query->fetch();
$prix = $infos['ttc']; // prix avion
if(!empty($_POST["debut"])){
    $heure = ($_POST["debut"][11]) . ($_POST["debut"][12]);
    $heure = (int) $heure;
    if ($heure >= 6 && $heure <= 22) {
        $query = $bdd->prepare("SELECT jour_soir FROM grpacoustique WHERE numero = :numero ");
        $query->execute([ "numero" => $_POST["categorie"]]);
        $verif = $query->fetch();
        $prix *= $verif[0];
    } else {
        $query = $bdd->prepare("SELECT nuit FROM grpacoustique WHERE numero = :numero ");
        $query->execute([ "numero" => $_POST["categorie"]]);
        $verif = $query->fetch();
        $prix *= $verif[0];
    }

    if(!respectLandingChoice($_POST["debut"], $infos["periode"])){
        echo '<b> Le jour selectionné ne correspond pas à l\'offre!</b><br>';
        $error = 1;
    }

}
else{
    echo "<p><b> veuillez saisir une heure d'arrivée</b></p>";
    $error = 1;
}


$query = $bdd->prepare("SELECT ttc FROM redevances WHERE nom = 'balisage' ");
$query->execute();
$verif = $query->fetch();
if (verifDateService(strtotime($_POST["debut"])) == FALSE) {
    echo '<b> vous devez reserver avant 24h!</b><br>';
    $error = 1;
}
if(landingPossible($_POST["debut"]) != 1){
    echo "<b> vous ne pouvez pas atterrir à cette heure-ci </b><br>";
    $error = 1;
}
if(!empty($_POST['reduc']) && $_POST['reduc'] == 1){
    $prix /= 2;
}
$prix += $verif[0]; // redevance balisage

if ($error != 1) {
    $_SESSION["panier"]->setAtterissage(new Atterissage($_POST['categorie'], 0,  $_POST["avion"], $prix, $_POST["debut"], $verif[0]));
    echo "<p align='center'>achat effectué</p>";
}else {
    $_SESSION["panier"]->setAtterissage(null);
}
?>
