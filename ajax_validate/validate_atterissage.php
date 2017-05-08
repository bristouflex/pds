<?php

require 'initValidate.php';
$error = 0;
$bdd = connectBdd();
$query = $bdd->prepare("SELECT ttc FROM avion WHERE id = :id");
$query->execute([ "id" => $_POST["avion"]]);
$verif = $query->fetch();
$prix = $verif[0]; // prix avion
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
$prix += $verif[0]; // redevance balisage

if ($error != 1) {
    $_SESSION["panier"]->setAtterissage(new Atterissage($_POST['categorie'], $verif[0],  $_POST["avion"], $prix, $_POST["debut"], $verif[0]));
  //  $_SESSION["panier"][0] = [ $_POST['categorie'], $verif[0], $_POST["avion"], $_POST["debut"], $prix];
}else {
    $_SESSION["panier"]->setAtterissage(null);
}
?>
