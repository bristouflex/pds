<?php
require "init.php";

$price = 0;

$bdd = connectBdd();

$price = $_SESSION["panier"]->getTotal();


if (!$_SESSION['panier']->isEmpty()) {
    $path = "factures/" . $_SESSION['user']->getEmail() . "_" . date('Y-m-d_H-i-s') . ".pdf";

    $query = $bdd->prepare(" INSERT INTO facture (idUser,adresseIP,montant,chemin,ispaid)
	VALUES (:idUser, :adresseIP, :montant, :chemin, :ispaid)");

    $query->execute([
        "idUser" => $_SESSION['user']->getId(),
        "adresseIP" => $_SERVER["REMOTE_ADDR"],
        "montant" => $price,
        "chemin" => $path,
        "ispaid" => 0
    ]);

    $query = $bdd->prepare("SELECT MAX(id) FROM facture WHERE idUser = :id");
    $query->execute(["id" => $_SESSION['user']->getId()]);
    $verif = $query->fetch();
    $factureID = $verif[0];
}

if ($_SESSION['panier']->getAtterissage()) { // Atterissage
    //$_SESSION['panier']->getAtterissage()->getGrpAcou(); // acoustique
    //$_SESSION['panier']->getAtterissage()[1]; // balisage
    //$_SESSION['panier']->getAtterissage()[2]; // avion
    //$_SESSION['panier']->getAtterissage()[3]; // debut


    $query = $bdd->prepare(" INSERT INTO options_atterissage (grpacoustique,frais_dossier,avion,facture,debut)
	VALUES (:grpacoustique, :frais_dossier, :avion, :facture, :debut)");
    $query->execute([
        "grpacoustique" => $_SESSION['panier']->getAtterissage()->getGrpAcou(),
        "frais_dossier" => 0,
        "avion" => $_SESSION['panier']->getAtterissage()->getAvion(),
        "facture" => $factureID,
        "debut" => $_SESSION['panier']->getAtterissage()->getDebut()
    ]);
}

if ($_SESSION['panier']->getStationnement()) { // Stationnement
    //$_SESSION['panier']->getStationnement()->getAbris(); // abris
    //$_SESSION['panier']->getStationnement()->getCategorie(); // categorie
    //$_SESSION['panier']->getStationnement()[2]; // debut
    //$_SESSION['panier']->getStationnement()[3]; // fin


    $query = $bdd->prepare("INSERT INTO options_stationnement (abris,categorie,facture,debut,fin)
	VALUES (:abris, :categorie, :facture, :debut, :fin)");
    $query->execute([
        "abris" => $_SESSION['panier']->getStationnement()->getAbris(),
        "categorie" => $_SESSION['panier']->getStationnement()->getCategorie(),
        "facture" => $factureID,
        "debut" => $_SESSION['panier']->getStationnement()->getDebut(),
        "fin" => $_SESSION['panier']->getStationnement()->getFin()
    ]);
}

if ($_SESSION['panier']->getNettoyage()) { // Nettoyage
    //$_SESSION['panier']->getNettoyage()->[0]; // produit
    //$_SESSION['panier']->getNettoyage()->[1]; // debut


    $query = $bdd->prepare("INSERT INTO options_nettoyage (produits,facture,debut)
	VALUES (:produits, :facture, :debut)");
    $query->execute([
        "produits" => $_SESSION['panier']->getNettoyage()->getProduit(),
        "facture" => $factureID,
        "debut" => $_SESSION['panier']->getNettoyage()->getDebut()
    ]);
}

if ($_SESSION['panier']->getAvitaillement()) { // Avitaillement
    //$_SESSION['panier']->getAvitaillement()->[0]; // essence
    //$_SESSION['panier']->getAvitaillement()->[1]; // debut

    $query = $bdd->prepare("INSERT INTO options_avitaillement (produit,facture,debut)
	VALUES (:produit, :facture, :debut)");
    $query->execute([
        "produit" => $_SESSION['panier']->getAvitaillement()->getProduit(),
        "facture" => $factureID,
        "debut" => $_SESSION['panier']->getAvitaillement()->getDebut()
    ]);
}

if ($_SESSION['panier']->getBapteme()) { // bapteme
    $query = $bdd->prepare("INSERT INTO options_bapteme (instructeur,date,facture,bapteme)
    VALUES (:instructeur, :date, :facture, :bapteme)");
    $query->execute([
        "instructeur" => $_SESSION['panier']->getBapteme()->getInstructeur(),
        "date" => $_SESSION['panier']->getBapteme()->getDate(),
        "facture" => $factureID,
        "bapteme" => $_SESSION['panier']->getBapteme()->getDate()
    ]);
}

if ($_SESSION['panier']->getParachute()) { // parachute
    $query = $bdd->prepare("INSERT INTO options_parachute (parachute,debut,facture)
    VALUES (:parachute, :debut, :facture)");
    $query->execute([
        "parachute" => $_SESSION['panier']->getParachute()->getParachute(),
        "debut" => $_SESSION['panier']->getParachute()->getDebut(),
        "facture" => $factureID
    ]);
}

if ($_SESSION['panier']->getLecon()) { // lecon
    $query = $bdd->prepare("INSERT INTO options_lecon (instructeur, date, lecon, facture)
        VALUES (:instructeur, :date, :lecon, :facture)");
    $query->execute([
        "instructeur" => $_SESSION["panier"]->getLecon()->getInstructeur(),
        "date" => $_SESSION["panier"] > getLecon()->getDate(),
        "lecon" => $_SESSION["panier"]->getLecon()->getLecon(),
        "facture" => $factureID
    ]);
}


if ($_SESSION['panier']->getLocationUlm()) { // location_ulm
    $query = $bdd->prepare("INSERT INTO options_location_ulm (location_ulm,date,facture)
        VALUES (:location_ulm,:date,:facture)");
    $query->execute([
        "location_ulm" => $_SESSION["panier"]->getLocationUlm()->getLocationUlm(),
        "date" => $_SESSION["panier"]->getLocationUlm()->getDate(),
        "facture" => $factureID
    ]);
}


if($_SESSION["panier"]->getCotisation){ // license cotisation
    $query = $bdd->prepare("INSERT INTO options_cotisation (cotisation,license,debut,inscrit,facture)
   VALUES (:cotisation,:license,:date,:inscrit,:facture)");
    $query->execute( [
        "cotisation" => $_SESSION["panier"]->getCotisation()->getCotisation(),
        "license" => $_SESSION["panier"]->getCotisation()->getLicense(),
        "date" => $_SESSION["panier"]->getCotisation()->getDebut(),
        "inscrit" =>$_SESSION["user"]->getId(),
        "facture" => $factureID
    ]);
}
ob_start();

echo "Facture Pour : " . $_SESSION['user']->getEmail() . "<br><br>";
echo "Fait le : " . date('Y-m-d H:i:s') . "<br><br>";

if ($_SESSION['panier']->getAtterissage()) {
    echo "Atterissage :<br><br>";
    echo "Groupe Acoustique : " . $_SESSION['panier']->getAtterissage()->getGrpAcou() . "<br>";
    echo "Balisage : " . $_SESSION['panier']->getAtterissage()->getBalisage() . "<br>";
    echo "Avion : " . $_SESSION['panier']->getAtterissage()->getAvion() . "<br>";
    echo "Debut : " . $_SESSION['panier']->getAtterissage()->getDebut() . "<br>";
    echo "Prix :" . $_SESSION['panier']->getAtterissage()->getPrix() . "<br><br>";
}
if ($_SESSION['panier']->getStationnement()) {
    echo "Stationnement :<br><br>";
    echo "Abris : " . $_SESSION['panier']->getStationnement()->getAbris() . "<br>";
    echo "Categorie : " . $_SESSION['panier']->getStationnement()->getCategorie() . "<br>";
    echo "Début : " . $_SESSION['panier']->getStationnement()->getDebut() . "<br>";
    echo "Fin : " . $_SESSION['panier']->getStationnement()->getFin() . "<br>";
    echo "Prix :" . $_SESSION['panier']->getStationnement()->getPrix() . "<br><br>";
}
if ($_SESSION['panier']->getNettoyage()) {
    echo "Nettoyage :<br><br>";
    echo "Produit : " . $_SESSION['panier']->getNettoyage()->getProduit() . "<br>";
    echo "Début : " . $_SESSION['panier']->getNettoyage()->getDebut() . "<br>";
    echo "Prix :" . $_SESSION['panier']->getNettoyage()->getPrix() . "<br><br>";
}
if ($_SESSION['panier']->getAvitaillement()) {
    echo "Avitaillement :<br><br>";
    echo "Essence : " . $_SESSION['panier']->getAvitaillement()->getProduit() . "<br>";
    echo "Début : " . $_SESSION['panier']->getAvitaillement()->getDebut() . "<br>";
    echo "Prix :" . $_SESSION['panier']->getAvitaillement()->getPrix() . "<br><br>";
}
if ($_SESSION['panier']->getBapteme()) {
    echo "Bapteme :<br><br>";
    echo "Bapteme de type : " . $_SESSION['panier']->getBapteme()->getBapteme() . "<br>";
    echo "Instructeur : " . $_SESSION['panier']->getBapteme()->getInstructeur() . "<br>";
    echo "Début : " . $_SESSION['panier']->getBapteme()->getDate() . "<br>";
    echo "Prix :" . $_SESSION['panier']->getBapteme()->getPrix() . "<br><br>";
}
if ($_SESSION['panier']->getParachute()) {
    echo "Parachute :<br><br>";
    echo "Parachute de type : " . $_SESSION['panier']->getParachute()->getParachute() . "<br>";
    echo "Début : " . $_SESSION['panier']->getParachute()->getDebut() . "<br>";
    echo "Prix :" . $_SESSION['panier']->getParachute()->getPrix() . "<br><br>";
}
if ($_SESSION['panier']->getLecon()) {
    echo "Lecon :<br><br>";
    echo "Lecon de type : " . $_SESSION['panier']->getLecon()->getLecon() . "<br>";
    echo "Instructeur : " . $_SESSION['panier']->getLecon()->getInstructeur() . "<br>";
    echo "Début : " . $_SESSION['panier']->getLecon()->getLecon() . "<br>";
    echo "Prix :" . $_SESSION['panier']->getLecon()->getPrix() . "<br><br>";
}
if ($_SESSION['panier']->getLocationUlm()) {
    echo "Location :<br><br>";
    echo "Location de type : " . $_SESSION['panier']->getLocationUlm()->getLocationUlm() . "<br>";
    echo "Début : " . $_SESSION['panier']->getLocationUlm()->getDate() . "<br>";
    echo "Prix :" . $_SESSION['panier']->getLocationUlm()->getPrix() . "<br><br>";
}

if($_SESSION["panier"]->getCotisation()){
    echo "Cotisation et licenses :<br><br>";
    echo "Cotisation : " . $_SESSION['panier']->getCotisation()->getCotisation() .  "<br>";
    echo "License : " . $_SESSION['panier']->getCotisation()->getLicense() .  "<br>";
    echo "Début : " . $_SESSION['panier']->getCotisation()->getDebut() .  "<br>";
    echo "Prix :" . $_SESSION['panier']->getCotisation()->getPrix() . "<br><br>";
}

if (!$_SESSION['panier']->isEmpty()) {
    echo "Prix total : " . $price . "<br>";
}
$content = ob_get_clean();
require_once("html2pdf/html2pdf.class.php");
try {
    $html2pdf = new HTML2PDF("P", "A4", "fr");
    // $html2pdf->setModeDebug();
    $html2pdf->setDefaultFont("Arial");
    $html2pdf->writeHTML($content);
    $html2pdf->Output($path, "F");
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}

$_SESSION["panier"] = new Panier();

if ($_SESSION["user"]->getIsMember()) {
    header('Location: myactivity.php');
} else {
    header('Location: myservice.php');
}
