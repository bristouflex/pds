<?php

require 'initprintback.php';
$bdd=connectBdd();
echo "<link href=\"css/bootstrap.min.css\" rel='stylesheet' type='text/css'/>";
$query=$bdd->query("SELECT * FROM lecon");
$resultat = $query -> fetchall();

$query=$bdd->query("SELECT * FROM instructeur");
$variable = $query -> fetchall();

if(empty($resultat) || empty($variable)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<div class='form-group' align='center'><form>";
    foreach($resultat as list($id, $prix)){
        echo "<div class='radio'><input type='radio' name='lecon'   value=\"".$id."\" 
        required>Lecon : Prix TTC : ".$prix."</div>";
    }
    foreach ($variable as list($id, $name, $prenom)) {
    	echo "<div class='radio'><input type='radio' name='instructeur' value=\"".$id."\" 
        required>Instructeur :".$prenom." ".$name."</div>";
    }
}
echo "<input type='datetime-local' name='debut_lecon' required><br>";
echo "<input type='button' class='btn' value='Valider Lecon' onclick='checker_lecon()'>";
echo '</form></div> ';

?>