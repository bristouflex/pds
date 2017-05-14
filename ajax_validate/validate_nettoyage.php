<?php

require 'initValidate.php';
$error = 0;
$bdd = connectBdd();


$query = $bdd->prepare("SELECT ttc FROM produits WHERE nom = :nom");
$query->execute([ "nom" => $_POST["produit"]]);
$verif = $query->fetch();
$prix = $verif[0]; // prix produit
if (verifDateService(strtotime($_POST["debut"])) == FALSE) {
    echo '<b> vous devez reserver avant 24h!</b><br>';
    unset($_SESSION["panier"][2]);
    $error = 1;
}
$find = canReserve($_POST["debut"]);

if($find == 0){
    echo '<p><b>vous devez reserver un atterissage avant de de demander un tel service</b></p>';
    $error = 1;
}
if ($error != 1 && $find == 1) {

    $_SESSION["panier"]->setNettoyage(new Nettoyage($_POST["produit"], $_POST["debut"], $prix));
    echo "<p align='center'>achat effectué</p>";
}else{
    $_SESSION["panier"]->setNettoyage(null);
}
?>
