<?php

require 'init.php';

$error = 0;

$bdd = connectBdd();
$query = $bdd->prepare("SELECT prix FROM parachute WHERE id = :id");


$query->execute([ "id" => $_POST["parachute"]]);
$verif = $query->fetch();
$prix = $verif[0]; // prix parachute
if (verifDateService(strtotime($_POST["debut"])) == FALSE) {
    echo '<b> vous devez reserver avant 24h!</b><br>';
    $error = 1;
}

if(respectAerodromSchedule($_POST["debut"]) != 1){
    echo "<b>l'aerodrome est fermé aux horaires demandés</b><br>";
    $error = 1;
}

if(availableVehicule(2, $_POST["debut"]) != 1){
    echo "<b>il n'y a pas d'avions disponibles à cet horaire, essayez d'en prendre une autre</b></br>";
    $error = 1;
}

$debut = $_POST["debut"];
$parachute = $_POST["parachute"];


if ($error != 1) {
    $_SESSION["panier"]->setParachute(new Parachute($parachute, $prix, $debut));
  //  $_SESSION["panier"][5] = [$parachute, $prix, $debut];
} else {
    unset($_SESSION["panier"][5]);
}
?>
