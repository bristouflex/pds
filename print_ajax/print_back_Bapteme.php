<?php

require 'initprintback.php';

$i=0;
echo "<br><br>";
echo "<table>";
    $bdd = connectBdd();
    $answer = $bdd->query ('SELECT * FROM bapteme');
    while($data = $answer->fetch()){
        if ($i==0) {
            echo "<tr><td><b>ID</b></td><td><b>Prix</b></td></tr>";
            $i=1;
        }      
        echo "<tr>";        
        echo "<td>".$data['id']."</td>";
        echo "<td>".$data['prix']."</td>";
        echo "<td><a class='boutonstylee' href='modifyActivityBapteme.php?id=".$data['id']."'>Modifier</a></td>";
        echo "</tr>";
    }
    echo "</table>";
?>
