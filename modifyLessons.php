<?php
require "init.php";

/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 03/05/2017
 * Time: 12:32
 */
if(!backisConnected()){
    session_destroy();
    header("location: ../index.php");
}

echo "<div id=\"page-wrapper\">
    <div class=\"container-fluid\">
        <div class=\"row bg-title\">
            <div class=\"col-lg-3 col-md-4 col-sm-4 col-xs-12\">
                <h4 class=\"page-title\">Back-office AEN</h4>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"white-box\">
                    <h3 class=\"box-title\">Voir et annuler les leçons</h3>
                    <div class=\"row\">";

$bdd = connectBdd();

$query = $bdd->prepare("SELECT * FROM options_lecon WHERE annule = 0 ORDER BY DATE DESC"); // on cherche toutes les lecons non annulées
$query->execute();
echo '<div id="tableau"><table class="table-responsive table table-bordered"> 
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
        <td><button type="button" onclick="cancelLesson('.$result["id"].",".$userId[0].",".$result["facture"].')">annuler</button></td>  
</tr>'; //on a besoin de l'id de la lecon, de celui de l'utilisateur et de celui de la facture pour annuler et rembourser
}
echo '</table></div>';
echo "</div>                  
                </div>
            </div>
        </div>
    </div>";