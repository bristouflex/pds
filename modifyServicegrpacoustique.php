<?php

require "init.php";

$bdd = connectBdd();
$query = $bdd->prepare("SELECT * FROM grpacoustique WHERE numero=:numero");
$query->execute(["numero" => $_GET['numero']]);
$result = $query->fetch();

echo "Les informations de ".$_GET["numero"]." sont : <br><br>";
echo '<form method="post" action="modifyServicegrpacoustique2.php?numero='.$_GET['numero'].'">';
echo 'jour_soir : <input type="text" name="jour_soir" value="'.$result["jour_soir"].'"><br>';
echo 'nuit : <input type="text" name="nuit" value="'.$result["nuit"].'"><br><br>';
echo '<input type="submit" value="Modifier">';
echo '</form>';	

?>