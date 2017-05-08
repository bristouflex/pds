<?php

require 'initprintback.php';
$bdd=connectBdd();

$query=$bdd->query("SELECT * FROM location_ulm");
echo "<link href=\"css/bootstrap.min.css\" rel='stylesheet' type='text/css'/>";
$resultat = $query -> fetchall();

if(empty($resultat)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<form>";
    echo '<div class="table-responsive table-bordered">';
    echo '<table class="table ">';
    foreach($resultat as list($id, $prix)){
        echo "<tr>";
        echo "<td><input type='radio' name='location_ulm'   value=\"".$id."\" 
        required>Location d'ULM</td>";
        echo "<td> Prix TTC :".$prix."</td>";
        echo "</tr>";
    }
}
echo "</table>";
echo "<p align='center'> <input type='datetime-local' name='debut_location_ulm' required></p>";
echo "<br><p align='center'> <input type='button' value='Valider Location ULM' onclick='checker_location_ulm()' class='btn'></p>";
echo '</form>';

?>