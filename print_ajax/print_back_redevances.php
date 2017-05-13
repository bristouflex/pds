<?php

require 'initprintback.php';


echo "<table class='table table-bordered table-responsive'>";
echo "<tr><th>Nom</th><th>HT</th><th>TVA</th><th>TTC</th></tr>";
    $bdd = connectBdd();
    $answer = $bdd->query ('SELECT * FROM redevances');
    while($data = $answer->fetch()){
        echo "<tr>";
        echo "<td>".$data['nom']."</td>";
        echo "<td><input type='text' id='prix".$data['nom']."' value='".$data['ht']."' placeholder='prix' </td>";
        echo "<td>" . $data['tva'] . "</td>";
        echo "<td>" . $data['ttc'] . "</td>";
        echo "<td><button class='btn' onclick='update_redevance_modification(\"" . $data['nom'] . "\")'>Modifier</button></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
