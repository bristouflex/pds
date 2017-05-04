<?php
require 'init.php';
$bdd = connectBdd();
echo "<link href=\"css/bootstrap.min.css\" rel='stylesheet' type='text/css'/>";
$query = $bdd->query("SELECT * FROM abris");
$resultat = $query ->fetchall();
echo '<div class="table-responsive table-bordered table-inverse">';
echo '<table class="table">';
echo '<tr> 
    <th>Profil</th>
    <th>Ht</th>
    <th>Tva</th>
    <th>Ttc</th>
    </tr>
';
if(empty($resultat)){
    echo '<h3> erreur </h3>';
}

else{

    echo "<form>";
    foreach($resultat as list($nom, $type, $ht, $tva, $ttc)){
        if( $nom == "Exterieur"){
            $exterieur = $ttc." par m² au sol";
            $afficheExterieur = "<tr>".
            "<td> Abris d'intérieur </td> ".
            "<td>".$exterieur."</td>".
            "<td></td>".
            "<td><input type='number' name='S' value='0' min='0' max='4000'></td> ".
            "<td><input type='radio' name='abris' value='exterieur' required></td>".
            "</tr>";
        }
        else{
            echo "<tr>";
            echo "<td>".$nom."</td>";
            echo "<td>".$ht."</td>";
            echo "<td>".$tva."</td>";
            echo "<td>".$ttc."</td>";
            echo "<td><input type='radio' name='abris' value='".$nom."'></td>";
            echo "</tr>";
        }
    }
    echo $afficheExterieur;


}
echo '</table></div>';


$query = $bdd->query("SELECT * FROM categorie");
$resultat = $query ->fetchall();

if(empty($resultat)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<br>Categorie:<br>";
    echo '<div class="table-responsive table-bordered table-inverse">';
    echo '<table class="table">';
    echo '<tr> 
    <th>Nom</th>
    <th>Catégorie</th>
    <th>HT</th>
    <th>TTC</th>
    </tr>
';
    foreach($resultat as list($id,$nom,$type,$ht,$ttc)){
        echo "<tr>";
        echo "<td>".$nom."</td>";
        echo "<td>".$type."</td>";
        echo "<td>".$ht."</td>";
        echo "<td>".$ttc."</td>";
        echo "<td><input type='radio' name='cat' value=\"".$id."\" required></td>";
        echo "</tr>";

    }
}
echo "</table>";
echo "<input type='datetime-local' name='debut_stationnement' required>";
echo "<input type='datetime-local' name='fin' required>";
echo "<input type='button' value='Valider Stationnement' onclick='checker_stationnement()'>";
echo "</form>";



