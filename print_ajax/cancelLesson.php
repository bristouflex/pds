<?php
/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 03/05/2017
 * Time: 20:18
 */
require_once 'initprintback.php';
if(!backisConnected()){
    session_destroy();
    header("location: ../index.php");
}else {
    if (!isset($_POST["id"]) || !isset($_POST["user"]) || !isset($_POST["facture"])) {
        header("location: ../modifyLessons.php");
    }
}
$bdd = connectBdd();
$query = $bdd->prepare("UPDATE options_lecon SET annule = 1 WHERE id = :id");
$query->execute([
    "id" => $_POST["id"]
]);
giveMoneyBack($_POST["user"], $_POST["facture"]);
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
    $userId = $query2->fetch();
    $query3 = $bdd->prepare("SELECT nom, prenom FROM inscrit WHERE id = :id"); // on récupère l'utilisateur correspondant à la facture
    $query3->execute([
        "id" => $userId[0]
    ]);
    $user = $query3->fetch();

    $query4 = $bdd->prepare("SELECT nom, prenom FROM instructeur WHERE id = :id"); // on récupère le professeur correspondant à la facture
    $query4->execute([
        "id" => $result["instructeur"]
    ]);
    $instructeur = $query4->fetch();
    echo '<tr>
        <td>'.$user["nom"]." ".$user["prenom"].'</td> 
        <td>'.$result["date"].'</td>     
        <td>'.$instructeur["prenom"].' '.$instructeur["nom"].'</td> 
        <td>'.$result["annule"].'</td>
        <td><button type="button" onclick="cancelLesson('.$result["id"],$userId[0],$result["facture"].')">annuler</button></td>  
</tr>'; //on a besoin de l'id de la lecon, de celui de l'utilisateur et de celui de la facture pour annuler et rembourser
}

echo '</table>';
