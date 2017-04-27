<?php

require 'init.php';

$error = 0;

$bdd = connectBdd();
$query = $bdd->prepare("SELECT prix FROM lecon WHERE id = :id");


$query->execute([ "id" => $_POST["lecon"]]);
$verif = $query->fetch();
$prix = $verif[0]; // prix lecon
if (verifDateService(strtotime($_POST["debut"])) == FALSE) {
    echo '<b> vous devez reserver avant 24h!</b><br>';
    $error = 1;
}

if(respectAerodromSchedule($_POST["debut"]) != 1){
    echo "<b>l'aerodrome est fermé aux horaires demandés</b><br>";
    $error = 1;
}

if(availableVehicule(1, $_POST["debut"]) != 1){
    echo "<b>il n'y a pas d'avions disponibles à cet horaire, essayez d'en prendre une autre</b></br>";
    $error = 1;
}

if(instructorAvailable($_POST["instructeur"], $_POST["debut"])){
    echo "<b>l'instructeur que vous avez choisi n'est pas disponible sur ce créneau</b></br>";
    $error = 1;
}

$debut = $_POST["debut"];
$instructeur = $_POST["instructeur"];
$lecon = $_POST["lecon"];

$_SESSION["panier"][6] = array();

if ($error != 1) {
    $_SESSION["panier"]->setLecon(new Lecon($instructeur, $prix, $debut, $lecon));
  //  $_SESSION["panier"][6] = [$lecon, $instructeur, $prix, $debut];
}else {
    unset($_SESSION["panier"][6]);
}
?>
