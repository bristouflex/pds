<?php

require 'initValidate.php';

$error = 0;

$bdd = connectBdd();
$query = $bdd->prepare("SELECT prix FROM location_ulm WHERE id = :id");


$query->execute([ "id" => $_POST["location_ulm"]]);
$verif = $query->fetch();
$prix = $verif[0]; // prix location
if (verifDateService(strtotime($_POST["debut"])) == FALSE) {
    echo '<b> vous devez reserver avant 24h!</b><br>';
    $error = 1;
}

if(respectAerodromSchedule($_POST["debut"]) != 1){
    echo "<b>l'aerodrome est fermé aux horaires demandés</b><br>";
    $error = 1;
}

if(availableVehicule(3, $_POST["debut"]) != 1){
    echo "<b>il n'y a pas d'avions disponibles à cet horaire, essayez d'en prendre une autre</b></br>";
    $error = 1;
}

$debut = $_POST["debut"];

$location = $_POST["location_ulm"];


if ($error != 1) {
    $_SESSION["panier"]-> setLocationUlm( new LocationUlm($location, $prix, $debut));
    echo "<p align='center'>achat effectué</p>";
}else {
    $_SESSION["panier"]->setLocationUlm(null);
}
?>
