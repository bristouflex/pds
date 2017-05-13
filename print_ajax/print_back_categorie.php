<?php

require 'initprintback.php';


echo "<table class='table table-bordered table-responsive'>";
    $bdd = connectBdd();
    echo "<tr><td>ID</td><td>Nom</td><td>Type</td><td>HT</td><td>TTC</td></tr>";
    $answer = $bdd->query ('SELECT * FROM categorie');
    while($data = $answer->fetch()){
        echo "<tr>";
        echo "<td>".$data['id']."</td>";
        echo "<td>".$data['nom']."</td>";
        echo "<td>".$data['type']."</td>";
        echo "<td><input type='text' id='prix".$data['id']."' value='".$data['ht']."' placeholder='prix' </td>";
        echo "<td>".$data['ttc']."</td>";
        echo "<td><button class='btn' onclick='update_categorie_modification(".$data['id'].")'>Modifier</button></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
