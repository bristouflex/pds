<?php
require 'init.php';
$bdd=connectBdd();

echo "<link href=\"css/bootstrap.min.css\" rel='stylesheet' type='text/css'/>";
echo '<div class="table-responsive table-bordered"> <table class="table">';
echo '<tr> 

    <th>Avion</th>
    <th>Periode</th>
    <th>ht</th>
    <th>tva</th>
    <th>ttc</th>
    </tr>';
$query=$bdd->query("SELECT id,type,periode,ht,tva,ttc FROM avion");
$resultat = $query -> fetchall();

if(empty($resultat)){
    echo '<h3> erreur </h3>';
}
else{
    foreach($resultat as list($id,$type,$periode,$ht, $tva, $ttc)){
        echo "<tr>";
        echo "<td>".$type."</td>";
        echo "<td>".$periode."</td>";
        echo "<td>".$ht."</td>";
        echo "<td>".$tva."</td>";
        echo "<td>".$ttc."</td>";
        echo "<td><input type='radio' name='vroomvroom' value=\"".$id."\" required></td>";
        echo "</tr>";
    }
}
echo "</table></div>";
echo '<div class="table-responsive table-bordered"> <table class="table">';
echo '<tr> 
    <th>groupe accoustique</th>
    <th>prix jour (6h - 22h)</th>
    <th>prix nuit (6h - 22h)</th>
    </tr>';
$query=$bdd->query("SELECT * FROM grpacoustique");
$resultat = $query -> fetchall();
if(empty($resultat)){
    echo '<h3> erreur </h3>';
}
else{
    foreach($resultat as list($numero,$jour_soir,$nuit)){
        echo "<tr>";
        echo "<td>". $numero."</td>";
        echo "<td>".$jour_soir." € </td>";
        echo "<td>".$nuit."€</td>";
        echo "<td><input type='radio' name='categorie' value='".$numero."' required></td>";
        echo "</tr>";
    }
}
echo "</table></div>";
echo "<p align='center'><input type='datetime-local' name='debut_atterissage' required></p>"; //on détermine le prix à payer en fonction de l'heure selectionnée
echo "<button type=\"button\" class=\"btn btn-secondary btn-lg btn-block\" onclick=\"checker_atterissage()\">valider avitaillement</button>";
echo "</table></div>";


