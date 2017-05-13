<?php
require 'initprintback.php';

echo "<table class='table table-bordered table-responsive'>";
    $bdd = connectBdd();
    echo "<tr><th>ID</th><th>Prix</th></tr>";
    $answer = $bdd->query ('SELECT * FROM location_ulm');
    while($data = $answer->fetch()){
        echo "<tr>";        
        echo "<td>".$data['id']."</td>";
        echo "<td><input type='text' id='prix".$data['id']."' value='".$data['prix']."' placeholder='prix' </td>";
        echo "<td><button class='btn' onclick='update_location_ulm_modification(".$data['id'].")'>Modifier</button></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
