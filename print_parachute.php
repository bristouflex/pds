<?php
require 'init.php';
$bdd=connectBdd();

$query=$bdd->query("SELECT * FROM parachute");
$resultat = $query -> fetchall();

if(empty($resultat)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<form>";
    foreach($resultat as list($id, $nom, $prix)){
        echo "<input type='radio' name='parachute'   value=\"".$id."\" required>Parachute ".$nom. " Prix TTC : ".$prix."<br>";
    }
}
echo "<input type='datetime-local' name='debut_parachute' required>";
echo "<input type='button' value='Valider Parachute' onclick='checker_parachute()'";
echo '</form>';

?>