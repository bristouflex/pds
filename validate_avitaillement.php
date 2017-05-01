<?php

require 'init.php';
$error = 0;
$bdd = connectBdd();


$query = $bdd->prepare("SELECT ttc FROM produits WHERE nom = :nom");
$query->execute([ "nom" => $_POST["essence"]]);
$verif = $query->fetch();
$prix = $verif[0]; // prix essence
if (verifDateService(strtotime($_POST["debut"])) == FALSE) {
    echo '<b> vous devez reserver avant 24h!</b><br>';
    $error = 1;
}
$find = canReserve($_POST["debut"]);

if($find == 0){
    echo '<b>vous devez reserver un atterissage avant de de demander un tel service</b> <br>';
    $$error = 1;
}
if ($error != 1 && $find == 1) {
    $_SESSION["panier"]-> setAvitaillement(new Avitaillement($_POST["essence"], $_POST["debut"], $prix)) ;
  //  $_SESSION["panier"][3] = [$_POST["essence"], $_POST["debut"], $prix];
}else{
    $_SESSION["panier"]->setAvitaillement(null);
}
?>
