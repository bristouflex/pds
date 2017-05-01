<?php
require 'init.php';
$bdd = connectBdd();

$query = $bdd->query("SELECT * FROM abris");
$resultat = $query ->fetchall();
if(empty($resultat)){
    echo '<h3> erreur </h3>';
}

else{
    echo "Abris d'intérieur : <br><br> ";
    echo "<form>";
    foreach($resultat as list($nom, $type, $ht, $tva, $ttc)){
        if( $nom == "Exterieur"){
            $exterieur = $ttc." par m² au sol";
        }

        else{

            echo "<input type='radio' name='abris' value='  " . $nom. " '  > Profil : ".$nom." Prix HT ".$ht." Prix TVA  ".$tva." Prix TTC ".$ttc."<br>";
        }
    }

    echo "<input type='radio' name='abris' value='exterieur' required>Exterieur<br>";
    echo $exterieur;
    echo "<input type='number' name='S' value='0' min='0' max='4000'> m²<br><br>";
}


$query = $bdd->query("SELECT * FROM categorie");
$resultat = $query ->fetchall();

if(empty($resultat)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<br>Categorie:<br>";
    foreach($resultat as list($id,$nom,$type,$ht,$ttc)){
        echo "<input type='radio' name='cat' value=\"".$id."\" required> Nom : ".$nom."Categorie".$type."Prix HT".$ht."Prix TTC".$ttc."<br><br>";
    }
}
echo "<input type='datetime-local' name='debut_stationnement' required>";
echo "<input type='datetime-local' name='fin' required>";
echo "<input type='button' value='Valider Stationnement' onclick='checker_stationnement()'";
echo "</form>";



