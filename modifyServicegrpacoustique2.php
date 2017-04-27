<?php

require "init.php";

$bdd = connectBdd();
$query = $bdd->prepare('UPDATE grpacoustique SET jour_soir = :jour_soir, nuit=:nuit WHERE numero = :numero');
$query->execute([  "jour_soir" => $_POST['jour_soir'], "nuit" => $_POST['nuit'], "numero" => $_GET['numero'] ]);
header("Location: modifyService.php");
?>