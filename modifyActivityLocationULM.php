<?php

require "init.php";

$bdd = connectBdd();
$query = $bdd->prepare("SELECT * FROM location_ulm WHERE id=:id");
$query->execute(["id" => $_GET['id']]);
$result = $query->fetch();

echo "Les informations de ".$_GET["id"]." sont : <br><br>";
echo '<form method="post" action="modifyActivityLocationULM2.php?id='.$_GET['id'].'">';
echo 'Prix : <input type="text" name="prix" value="'.$result["prix"].'"><br>';
echo '<input type="submit" value="Modifier">';
echo '</form>';	
?>