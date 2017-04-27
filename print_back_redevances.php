<?php

require 'init.php';

$i=0;
echo "<br><br>";
echo "<table>";
    $bdd = connectBdd();
    $answer = $bdd->query ('SELECT * FROM redevances');
    while($data = $answer->fetch()){
        if ($i==0) {
            echo "<tr><b>Nom</b></td><td><b>HT</b></td><td><b>TVA</b></td><td><td><b>TTC</b></td></tr>";
            $i=1;
        }
         echo "<tr>";

        echo "<td>".$data['nom']."</td>";
        echo "<td>".$data['ht']."</td>";
        echo "<td>".$data['tva']."</td>";
        echo "<td>".$data['ttc']."</td>";
        echo "<td><a class='boutonstylee' href='modifyServiceRedevances.php?nom=".$data['nom']."'>Modifier</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
