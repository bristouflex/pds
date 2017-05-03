<?php
require "init.php";

/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 03/05/2017
 * Time: 12:32
 */

$bdd = connectBdd();

$query = $bdd->prepare("SELECT * FROM options_lecon WHERE annule = 0"); // on cherche toutes les lecons non annulées
$query->execute();
echo '<table> 
<tr>
    <th>utilisateur</th>
    <th>date</th>
    <th>professeur</th>
    <th>annulation</th>
    </tr>';

while($result = $query->fetch()){ //pour chaque resultat de la requête
    $query2 = $bdd->prepare("SELECT idUser FROM facture WHERE id = :id"); // on récupère l'id de l'utilisateur correspondant à la facture qui correspond à la lecon
    $query2->execute([
        "id" => $result["facture"]
    ]);
    $factureId = $query2->fetch();
    $query3 = $bdd->prepare("SELECT nom, prenom FROM inscrit WHERE id = :id"); // on récupère l'utilisateur correspondant à la facture
    $query3->execute([
        "id" => $factureId[0]
    ]);
    $user = $query3->fetch();
    echo '<tr>
        <td>'.$user["nom"]." ".$user["prenom"].'</td> 
        <td>'.$result["date"].'</td> 
        <td>'.$result["instructeur"].'</td>
        <td>'.$result["annule"].'</td> 
</tr>';
}

echo '</table>';