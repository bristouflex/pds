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
        $query->execute(["id" => $_POST["avion"]]);
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
            if ($avion["type_avion"] == "helicoptere" || $avion["type_avion"] == "ULM") {
                if (strstr($type, "reacteur")) { //les hélicoptères et les ULM sont considérés comme des avions à réacteur
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
        echo "<input type='hidden' id='reduc' value='1'>";
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
        echo "<input type='hidden' id='reduc' value='0'>";
    }
}
echo "</div>";
echo "</table></div>";
echo '<div class="table-responsive table-bordered"> <table class="table">';
echo '<tr> 
    <th>groupe accoustique</th>
    <th>prix jour (6h - 22h)</th>
    <th>prix nuit (6h - 22h)</th>
    </tr>';
$query = $bdd->query("SELECT * FROM grpacoustique");
$resultat = $query->fetchall();
if (empty($resultat)) {
    echo '<h3> erreur </h3>';
} else {
    if (isset($avion)) {
        if ($avion["type_avion"] == "helicoptere" || $avion["type_avion"] == "ULM") {
            foreach ($resultat as list($numero, $jour_soir, $nuit)) {
                if ($numero == "1" || $numero == "2") {
                    echo "<tr>";
                    echo "<td>" . $numero . "</td>";
                    echo "<td>" . $jour_soir . " € </td>";
                    echo "<td>" . $nuit . "€</td>";
                    echo "<td><input type='radio' name='categorie' value='" . $numero . "' required></td>";
                    echo "</tr>";
                }
            }
        } else {
            foreach ($resultat as list($numero, $jour_soir, $nuit)) {
                echo "<tr>";
                echo "<td>" . $numero . "</td>";
                echo "<td>" . $jour_soir . " € </td>";
                echo "<td>" . $nuit . "€</td>";
                echo "<td><input type='radio' name='categorie' value='" . $numero . "' required></td>";
                echo "</tr>";
            }
        }
    } else {
        foreach ($resultat as list($numero, $jour_soir, $nuit)) {
            echo "<tr>";
            echo "<td>" . $numero . "</td>";
            echo "<td>" . $jour_soir . " € </td>";
            echo "<td>" . $nuit . "€</td>";
            echo "<td><input type='radio' name='categorie' value='" . $numero . "' required></td>";
            echo "</tr>";
        }
    }
}
echo "</table></div>";
echo "<p align='center'><input type='datetime-local' name='debut_atterissage' required></p>"; //on détermine le prix à payer en fonction de l'heure selectionnée
echo "<button type=\"button\" class=\"btn btn-secondary btn-lg btn-block\" onclick=\"checker_atterissage()\">valider avitaillement</button>";
echo "</table></div>";

