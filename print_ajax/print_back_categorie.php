<?php

require 'initprintback.php';

$i=0;
echo "<br><br>";
echo "<table>";
    $bdd = connectBdd();
    $answer = $bdd->query ('SELECT * FROM categorie');
    while($data = $answer->fetch()){
        if ($i==0) {
            echo "<tr><td><b>ID</b></td><td><b>Nom</b></td><td><b>Type</b></td><td><b>HT</b></td><td><b>TTC</b></td></tr>";
            $i=1;
        }      
         echo "<tr>";
        
        echo "<td>".$data['id']."</td>";
        echo "<td>".$data['nom']."</td>";
        echo "<td>".$data['type']."</td>";
        echo "<td>".$data['ht']."</td>";        
        echo "<td>".$data['ttc']."</td>";
        echo "<td><a class='boutonstylee' href='modifyServiceCategorie.php?id=".$data['id']."'>Modifier</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
