<?php

require 'init.php';

$error = 0;

$bdd = connectBdd();
$query = $bdd->prepare("SELECT prix FROM bapteme WHERE id = :id");


$query->execute([ "id" => $_POST["bapteme"]]);
$verif = $query->fetch();
$prix = $verif[0]; // prix bapteme
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

if(instructorAvailable($_POST["instructeur"], $_POST["debut"])){
    echo "<b>l'instructeur que vous avez choisi n'est pas disponible sur ce créneau</b></br>";
    $error = 1;
}

$debut = $_POST["debut"];
$instructeur = $_POST["instructeur"];
$bapteme = $_POST["bapteme"];

if ($error != 1) {
    $_SESSION["panier"]-> setBapteme(new Bapteme($bapteme, $instructeur, $prix, $debut));
  //  $_SESSION["panier"][4] = [$bapteme, $instructeur, $prix, $debut];
}else {
    $_SESSION["panier"]->setBapteme(null);
}
?>
