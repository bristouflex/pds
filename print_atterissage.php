<?php
require 'init.php';
$bdd=connectBdd();



$query=$bdd->query("SELECT id,type,periode,ht,tva,ttc FROM avion");
$resultat = $query -> fetchall();

if(empty($resultat)){
    echo '<h3> erreur </h3>';
}
else{
    foreach($resultat as list($id,$type,$periode,$ht, $tva, $ttc)){
        echo "<input type='radio' name='vroomvroom'   value=\"".$id."\" required>Avion".$type."Periode ".$periode." Prix HT ".$ht." Prix TVA  ".$tva." Prix TTC ".$ttc."<br>";
    }
}

$query=$bdd->query("SELECT * FROM grpacoustique");
$resultat = $query -> fetchall();
echo "<form>";
if(empty($resultat)){
    echo '<h3> erreur </h3>';
}
else{
    foreach($resultat as list($numero,$jour_soir,$nuit)){
        echo "<input type='radio' name='categorie'   value=\"".$numero."\" required>groupe accoustique ". $numero."<br> créneau horraire atterissage: <br>";
        echo "<h3> 6h-22h: ".$jour_soir." €    ";
        echo " 22h-6h: ".$nuit."€  <br> </h3>";
    }
}
echo "<input type='datetime-local' name='debut_atterissage' required>"; //on détermine le prix à payer en fonction de l'heure selectionnée
echo "<button type=\"button\" class=\"btn btn-secondary btn-lg btn-block\" onclick=\"checker_atterissage()\">valider avitaillement</button>";
echo "</form>";


