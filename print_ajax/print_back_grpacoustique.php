<?php

require 'initprintback.php';



echo "<table class='table table-bordered table-responsive'>";
$bdd = connectBdd();
echo "<tr><th>Numero</th><th>Jour_Soir</th><th>Nuit</th></tr>";
$answer = $bdd->query('SELECT * FROM grpacoustique');
while ($data = $answer->fetch()) {
    echo "<tr>";
    echo "<td>" . $data['numero'] . "</td>";
    echo "<td><input type='text' id='jour".$data['numero']."' value='".$data['jour_soir']."' placeholder='prix' </td>";
    echo "<td><input type='text' id='nuit".$data['numero']."' value='".$data['nuit']."' placeholder='prix' </td>";
    echo "<td><button class='btn' onclick='update_grpacoustique_modification(\"" . $data['numero'] . "\")'>Modifier</button></td>";
    echo "</tr>";
}
echo "</table>";
?>
