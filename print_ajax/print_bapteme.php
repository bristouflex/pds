<?php

require 'initprintback.php';
$bdd=connectBdd();
echo "<link href=\"css/bootstrap.min.css\" rel='stylesheet' type='text/css'/>";
$query=$bdd->query("SELECT * FROM bapteme");
$resultat = $query -> fetchall();

$query=$bdd->query("SELECT * FROM instructeur");
$variable = $query -> fetchall();

if(empty($resultat) || empty($variable)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<div class='form-group' align='center'><form>";
    foreach($resultat as list($id, $prix)){
        echo "<div class='radio'> <input type='radio' name='bapteme' value=\"".$id."\" 
        required>Bapteme de l'air : Prix TTC : ".$prix."</div>";
    }
    foreach ($variable as list($id, $name, $prenom)) {
    	echo "<div class='radio'><input type='radio' name='instructeur' value=\"".$id."\" 
        required>Instructeur :".$prenom." ".$name."</div>";
    }
}
echo "<input type='datetime-local' name='debut_bapteme' required>";
echo "<input type='button' value='Valider Bapteme' onclick='checker_bapteme()'";
echo '</form></div>';

?>