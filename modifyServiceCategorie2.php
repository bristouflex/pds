<?php

require "init.php";

$bdd = connectBdd();
$query = $bdd->prepare('UPDATE categorie SET ht = :ht, ttc=:ttc WHERE id = :id');
$query->execute([  "ht" => $_POST['ht'], "ttc" => $_POST['ttc'], "id" => $_GET['id'] ]);
header("Location: modifyService.php");
?>