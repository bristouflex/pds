<?php

require 'initprintback.php';

$i=0;
echo "<br><br>";
echo "<table>";
    $bdd = connectBdd();
    $answer = $bdd->query ('SELECT * FROM grpacoustique');
    while($data = $answer->fetch()){
        if ($i==0) {
            echo "<tr><td><b>Numero</b></td><td><b>Jour_Soir</b></td><td><b>Nuit</b></td></tr>";
            $i=1;
        }      
         echo "<tr>";
        
        echo "<td>".$data['numero']."</td>";
        echo "<td>".$data['jour_soir']."</td>";
        echo "<td>".$data['nuit']."</td>";
        echo "<td><a class='boutonstylee' href='modifyServicegrpacoustique.php?numero=".$data['numero']."'>Modifier</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
