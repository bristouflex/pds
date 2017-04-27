<?php

require "init.php";

$bdd = connectBdd();
$query = $bdd->prepare('UPDATE avion SET ht = :ht, tva =:tva, ttc=:ttc WHERE id = :id');
$query->execute([  "ht" => $_POST['ht'], "tva" => $_POST['tva'], "ttc" => $_POST['ttc'], "id" => $_GET['id'] ]);
header("Location: modifyService.php");
?>