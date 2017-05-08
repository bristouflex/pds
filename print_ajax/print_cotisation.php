<?php

require 'initprintback.php';
$bdd=connectBdd();
echo "<link href=\"css/bootstrap.min.css\" rel='stylesheet' type='text/css'/>";
$query=$bdd->query("SELECT * FROM cotisation");
$resultat = $query -> fetchall();

$query=$bdd->query("SELECT * FROM license");
$variable = $query -> fetchall();

if(empty($resultat) || empty($variable)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<form>";
    echo '<div class="table-responsive table-bordered table-inverse">';
    echo '<table class="table ">';
    echo '<tr>
            <th>type de cotisation</th>
            <th>ttc</th>       
          </tr>';
    foreach($resultat as list($id,$type, $prix)){
        echo '<tr>';
        echo '<td>'.$type.' </td>';
        echo '<td>'.$prix.' </td>';
        echo '<td>'."<input type='radio' name='cotisation'  value=\"".$id."\" required>".'</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<table class="table ">';
    echo '<tr>
            <th>type de license</th>
            <th>ttc</th>       
          </tr>';
    foreach($variable as list($id,$type, $prix)){
        echo '<tr>';
        echo '<td>'.$type.' </td>';
        echo '<td>'.$prix.' </td>';
        echo '<td>'."<input type='radio' name='license' value=\"".$id."\" required>".'</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
echo "<input type='button' value='Valider cotisation' onclick='checker_cotisation()'";
echo '</form>';
}
?>