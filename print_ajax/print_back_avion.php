<?php

require 'initprintback.php';


echo "<table class='table table-bordered table-responsive'>";
$bdd = connectBdd();
$answer = $bdd->query('SELECT * FROM avion');
echo "<tr><th>ID</th><th>Type</th><th>Periode</th><th>HT</th><th>TVA</th><th>TTC</th></tr>";
while ($data = $answer->fetch()) {

    echo "<tr>";

    echo "<td>" . $data['id'] . "</td>";
    echo "<td>" . $data['type'] . "</td>";
    echo "<td>" . $data['periode'] . "</td>";
    echo "<td><input type='text' id='prix".$data['id']."' value='".$data['ht']."' placeholder='prix' </td>";
    echo "<td>" . $data['tva'] . "</td>";
    echo "<td>" . $data['ttc'] . "</td>";
    echo "<td><button class='btn' onclick='update_avion_modification(" . $data['id'] . ")'>Modifier</button></td>";
    echo "</tr>";
}
echo "</table>";
?>
