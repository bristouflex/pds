<?php

require 'init.php';

if (isset($_SESSION['paypass']) && $_SESSION['paypass'] == 1) {
    $_SESSION['paypass'] = 0;
    unset($_SESSION['paypass']);

    $idfacture = $_GET['idfacture'];

    $bdd = connectBdd();

    $query = $bdd->prepare("SELECT ispaid FROM facture WHERE id = :id");
    $query->execute([ "id" => $idfacture]);
    $verif = $query->fetch();
    $already = $verif[0];


    if ($already == 0) { // si pas déjà payé
        $query = $bdd->prepare("SELECT credit FROM inscrit WHERE id = :id");
        $query->execute([ "id" => $_SESSION["user"]->getId()]);
        $verif = $query->fetch();
        $money = $verif[0];

        $query = $bdd->prepare("SELECT montant,chemin FROM facture WHERE id = :id");
        $query->execute([ "id" => $idfacture]);
        $verif = $query->fetch();
        $topay = $verif[0];
        $path = $verif[1];

        if ($money >= $topay) {
            $query = $bdd->prepare("UPDATE inscrit SET credit=:credit WHERE id = :id"); // update credit
            $query->execute([ "credit" => $money - $topay, "id" => $_SESSION["user"]->getId()]);
            $_SESSION["user"]->remCredit($topay); //on met à jour le crédit de l'utilisateur
            $query = $bdd->prepare("UPDATE facture SET ispaid=:ispaid WHERE id = :id"); // update ispaid
            $query->execute([ "ispaid" => 1, "id" => $idfacture]);

            $query = $bdd->prepare("INSERT INTO historiquetransaction (idUser,adresseIP,date,montant,link) VALUES (:idUser, :adresseIP, :date, :montant, :link)");
            $query->execute([
                "idUser" => $_SESSION["user"]->getId(),
                "adresseIP" => $_SERVER["REMOTE_ADDR"],
                "date" => date("Y-m-d H-i-s"),
                "montant" => -$topay,
                "link" => $path
            ]);
        } else { // si pas assez de money
            // return erreur pas assez d'argent
        }
    }
}
if(!$_SESSION["user"]->getIsMember()){
	header("Location: myservice.php");
}else {
    header("Location: myactivity.php");
}
?>
