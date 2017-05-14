<?php
require 'initprintback.php';
$bdd = connectBdd();

$query = $bdd->prepare("SELECT nom, id FROM detention_avion WHERE inscrit = :id AND supprime = 0");
$query->execute(["id" => $_SESSION["user"]->getId()]);


echo '<label for="liste_avions">Avion basés:</label>';
echo '<select class="custom-select form-control" id="liste_avions" onclick="update_atterissage_form()">';
echo "<option value=\"autre\">avion non basé</option>";
while ($avions = $query->fetch()) {
    echo "<option value='" . $avions["id"] . " '>" . $avions["nom"] . "</options>";
}

echo '</select>';
echo '<div class="table-responsive table-bordered" id="liste_atterissage">';
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
    echo "</div>";
    echo "</table>";
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
    foreach ($resultat as list($numero, $jour_soir, $nuit)) {
        echo "<tr>";
        echo "<td>" . $numero . "</td>";
        echo "<td>" . $jour_soir . " € </td>";
        echo "<td>" . $nuit . "€</td>";
        echo "<td><input type='radio' name='categorie' value='" . $numero . "' required></td>";
        echo "</tr>";
    }
}
echo "</table></div>";
echo "<p align='center'><input type='datetime-local' name='debut_atterissage' required></p>"; //on détermine le prix à payer en fonction de l'heure selectionnée
echo "<button type=\"button\" class=\"btn btn-secondary btn-lg btn-block\" onclick=\"checker_atterissage()\">valider avitaillement</button>";
echo "</table></div></div>";


