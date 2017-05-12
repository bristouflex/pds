<?php
/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 12/05/2017
 * Time: 18:24
 */
require 'initprintback.php';

$bdd = connectBdd();
$query = $bdd->query("SELECT * FROM abris");
$resultat = $query->fetchall();
echo '<div class="table-responsive table-bordered table-inverse">';
echo '<table class="table">';
echo '<tr> 
    <th>Profil</th>
    <th>Ht</th>
    <th>Tva</th>
    <th>Ttc</th>
    </tr>
';
if (empty($resultat)) {
    echo '<h3> erreur </h3>';
} else {

    echo "<form>";
    if (isset($_POST["avion"]) && $_POST["avion"] != "autre" && $_POST["avion"] != "") {
        $query = $bdd->prepare("SELECT * FROM detention_avion WHERE id = :id"); //on cherche la catégorie à laquelle appartient l'avion
        $query->execute(["id"=> $_POST["avion"]]);
        $avion = $query->fetch();
        if ($avion["poids"] >= 0.5 && $avion["poids"] < 1 && $avion["superficie"] > 100){   //on met dans value la valeur que l'on mettra dans l'input
            $value = "0.5 <= M < 1T et 100m2 < S";
        }
        if ($avion["poids"] >= 0.5 && $avion["poids"] < 1 && $avion["superficie"] < 100 && $avion["superficie"] >= 60){
            $value = "0.5 <= M < 1T et 60m2 <= S < 100m2";
        }
        if ($avion["poids"] >= 0.5 && $avion["poids"] < 1 && $avion["superficie"] < 60){
            $value = "0.5 <= M < 1T et S < 60m2";
        }
        if ($avion["poids"] > 1 && $avion["superficie"] > 100){
            $value = "1T < M et 100m2 < S";
        }
        if ($avion["poids"] > 1 && $avion["superficie"] < 100 && $avion["superficie"] >= 60){
            $value = "1T < M et 60m2 <= S < 100m2";
        }
        if ($avion["poids"] > 1 && $avion["superficie"] < 60){
            $value = "1T < M et S < 60m2";
        }
        if ($avion["poids"] < 0.5 && $avion["superficie"] > 100){
            $value = "M < 0.5T et 100m2 < S";
        }
        if ($avion["poids"] < 0.5 && $avion["superficie"] < 100 && $avion["superficie"] >= 60){
            $value = "M < 0.5T et 60m2 <= S < 100m2";
        }
        if ($avion["poids"] < 0.5 && $avion["superficie"] < 60){
            $value = "M < 0.5T et S < 60m2";
        }
        $query = $bdd->prepare("SELECT ttc FROM abris WHERE nom = :nom");
        $query->execute(["nom" => "Exterieur"]);
        $prixExt = $query->fetch();
        $query = $bdd->prepare("SELECT ttc FROM abris WHERE nom = :nom");
        $query->execute(["nom" => $value]);
        $prixInt = $query->fetch();
        echo '<div class="table-responsive table-bordered table-inverse">';
        echo '<table class="table">';
        echo '<tr> 
            <th>Type</th>
            <th>Prix</th>
            <th>Choix</th>
            </tr>
';
        echo "<input type='hidden' name='S' value='".$avion['superficie']."'>";
        echo "<tr><td>exterieur</td><td>".$prixExt['ttc']*$avion["superficie"]."</td><td><input type='radio' name='abris' value='exterieur' required></td></tr>";
        echo "<td>interrieur</td><td>".$prixInt['ttc']."</td><td><input type='radio' name='abris' value='".$value."' required'></td>";

    } else {
        foreach ($resultat as list($nom, $type, $ht, $tva, $ttc)) {
            if ($nom == "Exterieur") {
                $exterieur = $ttc . " par m² au sol";
                $afficheExterieur = "<tr>" .
                    "<td> Abris d'intérieur </td> " .
                    "<td>" . $exterieur . "</td>" .
                    "<td></td>" .
                    "<td><input type='number' name='S' value='0' min='0' max='4000'></td> " .
                    "<td><input type='radio' name='abris' value='exterieur' required></td>" .
                    "</tr>";
            } else {
                echo "<tr>";
                echo "<td>" . $nom . "</td>";
                echo "<td>" . $ht . "</td>";
                echo "<td>" . $tva . "</td>";
                echo "<td>" . $ttc . "</td>";
                echo "<td><input type='radio' name='abris' value='" . $nom . "'></td>";
                echo "</tr>";
            }
        }
        echo $afficheExterieur;
    }



}
echo '</table></div>';


$query = $bdd->query("SELECT * FROM categorie");
$resultat = $query->fetchall();

if (empty($resultat)) {
    echo '<h3> erreur </h3>';
} else {
    echo "<br>Categorie:<br>";
    echo '<div class="table-responsive table-bordered table-inverse">';
    echo '<table class="table">';
    echo '<tr> 
    <th>Nom</th>
    <th>Catégorie</th>
    <th>HT</th>
    <th>TTC</th>
    </tr>
';
    if (isset($_POST["avion"]) && $_POST["avion"] != "autre" && $_POST["avion"] != "") {
        foreach ($resultat as list($id, $nom, $type, $ht, $ttc)) {
            echo "<tr>";
            echo "<td>" . $nom . "</td>";
            echo "<td>" . $type . "</td>";
            echo "<td>" . $ht . "</td>";
            echo "<td>" . $ttc . "</td>";
            echo "<td><input type='radio' name='cat' value=\"" . $id . "\" required></td>";
            echo "</tr>";

        }
    } else {
        foreach ($resultat as list($id, $nom, $type, $ht, $ttc)) {
            if (strstr($nom, "non-base")) {
                echo "<tr>";
                echo "<td>" . $nom . "</td>";
                echo "<td>" . $type . "</td>";
                echo "<td>" . $ht . "</td>";
                echo "<td>" . $ttc . "</td>";
                echo "<td><input type='radio' name='cat' value=\"" . $id . "\" required></td>";
                echo "</tr>";
            }
        }
    }
}
echo "</table>";
echo "<input class='form-control' type='datetime-local' name='debut_stationnement' required>";
echo "<input class='form-control'  type='datetime-local' name='fin' required>";
echo "<input type='button' class='btn' value='Valider Stationnement' onclick='checker_stationnement()'>";
