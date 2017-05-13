<?php

require 'initprintback.php';

echo "<table class='table table-bordered table-responsive'>";
echo "<tr><th>ID</th><th>Nom</th><th>Prix</th></tr>";
$bdd = connectBdd();
    $answer = $bdd->query ('SELECT * FROM parachute');
    while($data = $answer->fetch()){
        echo "<tr>";        
        echo "<td>".$data['id']."</td>";
        echo "<td><input type='text' id='nom".$data['id']."' value='".$data['nom']."' placeholder='nom' </td>";
        echo "<td><input type='text' id='prix".$data['id']."' value='".$data['prix']."' placeholder='prix' </td>";
        echo "<td><button class='btn' onclick='update_parachute_modification(".$data['id'].")'>Modifier</button></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
