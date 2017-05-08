<?php
require 'initprintback.php';
$bdd=connectBdd();
echo "<link href=\"css/bootstrap.min.css\" rel='stylesheet' type='text/css'/>";
$query=$bdd->query("SELECT * FROM parachute");
$resultat = $query -> fetchall();

if(empty($resultat)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<div class='form-group' align='center'><form>";
    foreach($resultat as list($id, $nom, $prix)){
        echo "<div class='radio'><input type='radio' name='parachute'   value=\"".$id."\" required>Parachute ".$nom. " Prix TTC : ".$prix."</div>";
    }
}
echo "<input type='datetime-local' name='debut_parachute' required><br>";
echo "<input type='button' value='Valider Parachute' onclick='checker_parachute()'>";
echo '</form></div>';

?>