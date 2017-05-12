<?php
/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 12/05/2017
 * Time: 16:37
 */
require 'initprintback.php';
$bdd = connectBdd();
$query = $bdd->query("SELECT id,type,periode,ht,tva,ttc FROM avion");
$resultat = $query->fetchall();

echo '<table class="table">';
echo '<tr> 

    <th>Avion</th>
    <th>Periode</th>
    <th>ht</th>
    <th>tva</th>
    <th>ttc</th>
    </tr>';
$query = $bdd->query("SELECT id,type,periode,ht,tva,ttc FROM avion");
$resultat = $query->fetchall();
echo "<div id='liste_options_avions'>";
if (empty($resultat)) {
    echo '<h3> erreur </h3>';
} else {

    if (isset($_POST["avion"]) && $_POST["avion"] != "autre" && $_POST["avion"] != "") {
        $query = $bdd->prepare("SELECT * FROM detention_avion WHERE id = :id"); //on cherche la catégorie à laquelle appartient l'avion
        $query->execute(["id"=> $_POST["avion"]]);
        $avion = $query->fetch();
        foreach ($resultat as list($id, $type, $periode, $ht, $tva, $ttc)) {
            if (strstr($type, $avion["type_avion"])) { //on n'affiche que les infos sur le type de l'avion enregistré
                echo "<tr>";
                echo "<td>" . $type . "</td>";
                echo "<td>" . $periode . "</td>";
                echo "<td>" . $ht . "</td>";
                echo "<td>" . $tva . "</td>";
                echo "<td>" . $ttc . "</td>";
                echo "<td><input type='radio' name='vroomvroom' value=\"" . $id . "\" required></td>";
                echo "</tr>";
            }
        }
    } else {
        foreach ($resultat as list($id, $type, $periode, $ht, $tva, $ttc)) {
            if (strstr($periode, "nb")) {
                echo "<tr>";
                echo "<td>" . $type . "</td>";
                echo "<td>" . $periode . "</td>";
                echo "<td>" . $ht . "</td>";
                echo "<td>" . $tva . "</td>";
                echo "<td>" . $ttc . "</td>";
                echo "<td><input type='radio' name='vroomvroom' value=\"" . $id . "\" required></td>";
                echo "</tr>";
            }

        }
    }
}
echo "</div>";
echo "</table></div>";
