<?php

require "init.php";

$bdd = connectBdd();
$query = $bdd->prepare('UPDATE bapteme SET prix=:prix WHERE id = :id');
$query->execute(["prix" => $_POST['prix'], "id" => $_GET['id'] ]);
header("Location: modifyActivity.php");
?>