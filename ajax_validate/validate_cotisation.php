<?php

require 'initValidate.php';

$error = 0;

$cotisation = $_POST["cotisation"];
$license = $_POST["license"];


if($_POST["cotisation"] == "undefined" || $_POST["cotisation"] == "undefined"){
    echo "<b>tous les champs sont à remplir!</b>";
    $error = 1;
}

$bdd = connectBdd();
$query = $bdd->prepare("SELECT prix FROM cotisation WHERE id = :id");
$query->execute([ "id" => $_POST["cotisation"]]);
$verif = $query->fetch();
$prix = $verif[0]; // prix cotisation


$query = $bdd->prepare("SELECT prix FROM license WHERE id = :id");
$query->execute([ "id" => $_POST["license"]]);
$verif = $query->fetch();
$prix += $verif[0]; // prix license



if ($error != 1) {
    $_SESSION["panier"]->setCotisation(new Cotisation($cotisation, $license, date("Y-m-d"), $prix));
}else {
    $_SESSION["panier"]->setCotisation(null);
}

?>