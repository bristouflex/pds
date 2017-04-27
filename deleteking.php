<?php
require "init.php";

if(isset($_SESSION["email"])){
$activated=0;
$bdd=connectBdd();
$query=$bdd->prepare("UPDATE inscrit SET statut=:active WHERE id=:id");
$query->execute([ "active"=>$activated, "id"=>$_GET['id']  ]);
}

header("Location: king.php");


?>
