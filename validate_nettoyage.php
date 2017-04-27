<?php

require 'init.php';
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
$_SESSION["panier"][2] = array();
$find = canReserve($_POST["debut"]);
echo $find;
if($find == 0){
    echo 'vous devez reserver un atterissage avant de de demander un tel service <br>';
    unset($_SESSION["panier"][2]);
}
if ($error != 1 && $find == 1) {
    $_SESSION["panier"][2] = [$_POST["produit"], $_POST["debut"], $prix];
}
?>
