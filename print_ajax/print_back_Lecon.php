<?php

require 'initprintback.php';


echo "<table class='table table-bordered table-responsive'>";
    echo "<tr><th>ID</th><th>Prix</th></tr>";
    $bdd = connectBdd();
    $answer = $bdd->query ('SELECT * FROM lecon');
    while($data = $answer->fetch()){
        echo "<tr>";        
        echo "<td>".$data['id']."</td>";
        echo "<td><input type='text' id='prix".$data['id']."' value='".$data['prix']."' placeholder='prix' </td>";
        echo "<td><button class='btn' onclick='update_lecon_modification(".$data['id'].")'>Modifier</button></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
