<?php

require 'init.php';
$bdd=connectBdd();

$query=$bdd->query("SELECT * FROM location_ulm");
$resultat = $query -> fetchall();

if(empty($resultat)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<form>";
    foreach($resultat as list($id, $prix)){
        echo "<input type='radio' name='location_ulm'   value=\"".$id."\" 
        required>Location d'ULM : Prix TTC : ".$prix."<br>";
    }
}
echo "<input type='datetime-local' name='debut_location_ulm' required>";
echo "<input type='button' value='Valider Location ULM' onclick='checker_location_ulm()'";
echo '</form>';

?>