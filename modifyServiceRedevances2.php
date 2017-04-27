<?php

require "init.php";

$bdd = connectBdd();
$query = $bdd->prepare('UPDATE redevances SET ht = :ht, tva = :tva, ttc=:ttc WHERE nom = :nom');
$query->execute([  "ht" => $_POST['ht'],"tva" => $_POST['tva'], "ttc" => $_POST['ttc'], "nom" => $_GET['nom'] ]);
header("Location: modifyService.php");
?>