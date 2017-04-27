<?php

require 'init.php';
$bdd=connectBdd();

$query=$bdd->query("SELECT * FROM bapteme");
$resultat = $query -> fetchall();

$query=$bdd->query("SELECT * FROM instructeur");
$variable = $query -> fetchall();

if(empty($resultat) || empty($variable)){
    echo '<h3> erreur </h3>';
}

else{
    echo "<form>";
    foreach($resultat as list($id, $prix)){
        echo "<input type='radio' name='bapteme' value=\"".$id."\" 
        required>Bapteme de l'air : Prix TTC : ".$prix."<br>";
    }
    foreach ($variable as list($id, $name, $prenom)) {
    	echo "<input type='radio' name='instructeur' value=\"".$id."\" 
        required>Instructeur :".$prenom." ".$name."<br>";
    }
}
echo "<input type='datetime-local' name='debut_bapteme' required>";
echo "<input type='button' value='Valider Bapteme' onclick='checker_bapteme()'";
echo '</form>';

?>