<?php
/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 11/05/2017
 * Time: 17:24
 */

require 'initprintback.php';

if (isConnected()) {
    unset($_SESSION["error_subscribe"]);
} else {
    logout();
}

echo '<script src="js/ajax.js"></script>';
$bdd = connectBdd();

if(isset($_POST["id_plane"])){
    $query = $bdd->prepare("UPDATE detention_avion SET supprime = 1 WHERE id = :id");
    $query->execute([
        "id" => $_POST["id_plane"]
    ]);
}

echo "<h3 class=\"m_1\" align=\"center\">Liste de vos avions</h3>";

$query = $bdd->prepare("SELECT * FROM detention_avion WHERE inscrit = :id AND supprime = 0");
$query->execute([
   "id" => $_SESSION["user"]->getId()
]);
echo "<table class='table-responsive table table-bordered'>";
echo "<tr><th>nom</th><th>type</th><th>superficie</th><th>poids</th><th>supprimer</th></tr>";
while($liste = $query->fetch()){
    echo '<tr>';
        echo '<td>'.nl2br(htmlspecialchars($liste["nom"])).'</td>
                <td>'.$liste["type_avion"].'</td>
                <td>'.$liste["superficie"].'</td>
                <td>'.$liste["poids"].'</td>
                <td><button class="btn" onclick="delete_user_plane('.$liste["id"].')">supprimer</button></td>';
    echo '</tr>';
}
echo '</table>';


