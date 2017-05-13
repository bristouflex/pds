<?php

require 'initprintback.php';

echo "<table class='table table-bordered table-responsive'>";
    $bdd = connectBdd();
    $answer = $bdd->query ('SELECT * FROM abris');
    echo "<tr><th>Nom</th><th>Type</th><th>HT</th><th>TVA</th><th>TTC</th></tr>";
    while($data = $answer->fetch()){
         echo "<tr>";
        
        echo "<td>".$data['nom']."</td>";
        echo "<td>".$data['type']."</td>";
        echo "<td><input type='text' id='prix".$data['nom']."' value='".$data['ht']."' placeholder='prix' </td>";
        echo "<td>".$data['tva']."</td>";
        echo "<td>".$data['ttc']."</td>";
        echo "<td><button class='btn' onclick='update_abris_modification(\"".$data['nom']."\")'>Modifier</button></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
