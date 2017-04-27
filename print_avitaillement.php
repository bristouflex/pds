<?php
require 'init.php';
$bdd=connectBdd();

$query=$bdd->query("SELECT * FROM produits WHERE type='avitaillement'");
$resultat = $query -> fetchall();
echo '<form>';
if(empty($resultat)){
    echo '<h3> erreur </h3>';
}
else{
    foreach($resultat as list($nom, $type, $ht, $tva, $ttc)){
        echo "<input type='radio' name='essence'   value=\"".$nom."\" required>Produit".$nom." Prix HT ".$ht." Prix TVA  ".$tva." Prix TTC ".$ttc."<br>";
    }

echo "<input type='button' value='Valider Avitaillement' onclick='checker_avitaillement()' required>";
echo "<input type='datetime-local' name='debut_avitaillement' required>";
echo "</form>";
}
