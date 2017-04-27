<?php

require 'init.php';

$idfacture = $_GET['idfacture'];

$bdd = connectBdd();

$query = $bdd->prepare("SELECT ispaid FROM facture WHERE id = :id");
    $query->execute([ "id" => $idfacture]);
    $verif = $query->fetch();
    $already = $verif[0];

    if($already == 0){

$query = $bdd->prepare("DELETE FROM options_atterissage WHERE facture = :id");
$query->execute([ "id" => $idfacture]);

$query = $bdd->prepare("DELETE FROM options_nettoyage WHERE facture = :id");
$query->execute([ "id" => $idfacture]);

$query = $bdd->prepare("DELETE FROM options_stationnement WHERE facture = :id");
$query->execute([ "id" => $idfacture]);

$query = $bdd->prepare("DELETE FROM options_avitaillement WHERE facture = :id");
$query->execute([ "id" => $idfacture]);

$query = $bdd->prepare("DELETE FROM facture WHERE id = :id");
$query->execute([ "id" => $idfacture]);
	}


if(!$_SESSION["user"]->getIsMember()){
	header("Location: myservice.php");
}else {
    header("Location: myactivity.php");
}

?>
