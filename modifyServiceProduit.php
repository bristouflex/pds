<?php

require "init.php";

$bdd = connectBdd();
$query = $bdd->prepare("SELECT * FROM produits WHERE nom=:nom");
$query->execute(["nom" => $_GET['nom']]);
$result = $query->fetch();

echo "Les informations de ".$_GET["nom"]." sont : <br><br>";
echo '<form method="post" action="modifyServiceProduit2.php?nom='.$_GET['nom'].'">';
echo 'HT : <input type="text" name="ht" value="'.$result["ht"].'"><br>';
echo 'TVA : <input type="text" name="tva" value="'.$result["tva"].'"><br>';
echo 'TTC : <input type="text" name="ttc" value="'.$result["ttc"].'"><br><br>';
echo '<input type="submit" value="Modifier">';
echo '</form>';	

?>