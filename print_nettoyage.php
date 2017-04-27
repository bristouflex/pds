<?php
require 'init.php';
$bdd=connectBdd();

$query=$bdd->query("SELECT * FROM produits WHERE type='nettoyage'");
$resultat = $query -> fetchall();

if(empty($resultat)){
    echo '<h3> erreur </h3>';
}
else{
    echo "<form>";
    foreach($resultat as list($nom, $type, $ht, $tva, $ttc)){
        echo "<input type='radio' name='produit'   value=\"".$nom."\" required>Produit".$nom." Prix HT ".$ht." Prix TVA  ".$tva." Prix TTC ".$ttc."<br>";
    }
}
echo "<input type='datetime-local' name='debut_nettoyage' required>";
echo "<input type='button' value='Valider Nettoyage' onclick='checker_nettoyage()'";
echo '</form>';