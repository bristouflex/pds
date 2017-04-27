<?php

require "init.php";

$bdd = connectBdd();
$query = $bdd->prepare("SELECT * FROM avion WHERE id=:id");
$query->execute(["id" => $_GET['id']]);
$result = $query->fetch();

echo "Les informations de ".$_GET["id"]." sont : <br><br>";
echo '<form method="post" action="modifyServiceAvion2.php?id='.$_GET['id'].'">';
echo 'HT : <input type="text" name="ht" value="'.$result["ht"].'"><br>';
echo 'TVA : <input type="text" name="tva" value="'.$result["tva"].'"><br>';
echo 'TTC : <input type="text" name="ttc" value="'.$result["ttc"].'"><br><br>';
echo '<input type="submit" value="Modifier">';
echo '</form>';	

?>