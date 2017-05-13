<?php

require 'initprintback.php';


echo "<table class='table table-bordered table-responsive'>";
echo "<tr><th>ID</th><th>Type</th><th>Prix</th></tr>";
$bdd = connectBdd();
$answer = $bdd->query('SELECT * FROM cotisation');
while ($data = $answer->fetch()) {
    echo "<tr>";
    echo "<td>" . $data['id'] . "</td>";
    echo "<td>" . $data['type'] . "</td>";
    echo "<td><input class='form-control' type='text' id='prix" . $data['id'] . "' value='" . $data['prix'] . "' placeholder='prix' </td>";
    echo "<td><button class='btn' onclick='update_cotisation_modification(" . $data['id'] . ")'>Modifier</button></td>";
    echo "</tr>";
}
echo "</table>";
?>
