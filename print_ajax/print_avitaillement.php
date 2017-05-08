<?php
require 'initprintback.php';
$bdd=connectBdd();
echo "<link href=\"css/bootstrap.min.css\" rel='stylesheet' type='text/css'/>";
$query=$bdd->query("SELECT * FROM produits WHERE type='avitaillement'");
$resultat = $query -> fetchall();
echo '<form>';
if(empty($resultat)){
    echo '<h3> erreur </h3>';
}
else{
    echo '<div class="table-responsive table-bordered table-inverse">';
    echo '<table class="table ">';
    echo '<tr>
            <th>type</th>
            <th>ht</th>
            <th>tva</th>
            <th>ttc</th>
          </tr>';

    foreach($resultat as list($nom, $type, $ht, $tva, $ttc)){
        echo '<tr>';
        echo '<td>'.$nom.' </td>';
        echo '<td>'.$ht.' </td>';
        echo '<td>'.$tva.' </td>';
        echo '<td>'.$ttc.' </td>';
        echo '<td>'."<input type='radio' name='essence'  value=\"".$nom."\" required>".'</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo  '</div>';
    echo "<input type='datetime-local' name='debut_avitaillement' required>";
echo "<input type='button' value='Valider Avitaillement' onclick='checker_avitaillement()' required>";

echo "</form>";
}
