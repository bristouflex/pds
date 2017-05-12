<?php

require "init.php";

if (isConnected()) {
    /* $bdd = connectBdd();
      $query2 = $bdd->prepare("SELECT identity FROM inscrit WHERE email = :email");
      $query2 -> execute(["email" => $_SESSION["email"]]);
      $resultat2 = $query2 -> fetch();
      echo $resultat2; */

    unset($_SESSION["error_subscribe"]);
} else {
    unset($_SESSION["User"]);
    header("Location: index.php");
}

require_once 'view/header.php';
require_once 'view/menu.php';


echo "<div class=\"col-md-9\">";
echo "<h2 align='center'>Liste des éléments du panier:</h2>";
if ($_SESSION["panier"]->getCotisation()) {
    echo "Cotisation: ";
    echo "<ul class='list-group>' <li class='list-group-item'>". "License:    ";
    echo $_SESSION['panier']->getCotisation()->getLicense();
    echo "</li><li class='list-group-item'>". "Cotisation:    ";
    echo $_SESSION['panier']->getCotisation()->getCotisation();
    echo "</li><li class='list-group-item'>". "Date:    ";
    echo $_SESSION['panier']->getCotisation()->getDebut();
    echo "</li><li class='list-group-item'>". "Prix:    ";
    echo $_SESSION['panier']->getCotisation()->getPrix();
    echo "</li><li class='list-group-item'>";
    echo "<a href='destroybracket.php?type=cotisation'>Annuler cet article</a></ul>";

}

if ($_SESSION['panier']->getLocationUlm()) {
    echo "location ulm: <ul class='list-group>'";
    echo "<li class='list-group-item'>". "Ulm:    ";
    echo $_SESSION['panier']->getLocationUlm()->getLocationUlm();
    echo "</li><li class='list-group-item'>". "Date:    ";
    echo $_SESSION['panier']->getLocationUlm()->getDate();
    echo "</li><li class='list-group-item'>". "Prix:    ";
    echo $_SESSION['panier']->getLocationUlm()->getPrix();
    echo "</li><li class='list-group-item'>";
    echo "<a href='destroybracket.php?type=locationUlm'>Annuler cet article</a></ul>";

}

if ($_SESSION['panier']->getLecon()) {
    echo "lecon: <ul class='list-group>'";
    echo "<li class='list-group-item'>". "Leçon:    ";

    echo $_SESSION['panier']->getLecon()->getLecon();
    echo "</li><li class='list-group-item'>". "Instructeur:    ";
    echo $_SESSION['panier']->getLecon()->getInstructeur();
    echo "</li><li class='list-group-item'>". "Date:    ";
    echo $_SESSION['panier']->getLecon()->getDate();
    echo "</li><li class='list-group-item'>". "Prix:    ";
    echo $_SESSION['panier']->getLecon()->getPrix();
    echo "</li><li class='list-group-item'>";
    echo "<a href='destroybracket.php?type=lecon'>Annuler cet article</a></ul>";

}

if ($_SESSION['panier']->getParachute()) {
    echo "parachute<ul class='list-group>'";
    echo "</li><li class='list-group-item'>". "Date:    ";
    echo $_SESSION['panier']->getParachute()->getDebut();
    echo "<li class='list-group-item'>"."Parachute:    ";
    echo $_SESSION['panier']->getParachute()->getParachute();
    echo "</li><li class='list-group-item'>". "Prix:    ";
    echo $_SESSION['panier']->getParachute()->getPrix();
    echo "</li><li class='list-group-item'>";
    echo "<a href='destroybracket.php?type=parachute'>Annuler cet article</a></ul>";

}


if ($_SESSION['panier']->getBapteme()) {
    echo "bapteme: <ul class='list-group>'";
    echo "<li class='list-group-item'>". "Bapteme:    ";

    echo $_SESSION['panier']->getBapteme()->getBapteme();
    echo "</li><li class='list-group-item'>". "Instructeur:    ";
    echo $_SESSION['panier']->getBapteme()->getInstructeur();
    echo "</li><li class='list-group-item'>". "Date:    ";
    echo $_SESSION['panier']->getBapteme()->getDate();
    echo "</li><li class='list-group-item'>". "Prix:    ";
    echo $_SESSION['panier']->getBapteme()->getPrix();
    echo "</li><li class='list-group-item'>";
    echo "<a href='destroybracket.php?type=bapteme'>Annuler cet article</a></ul>";

}

if ($_SESSION['panier']->getAvitaillement()) {
    echo "avitaillement: <ul class='list-group>'";
    echo "<li class='list-group-item'>". "Produit:    ";

    echo $_SESSION['panier']->getAvitaillement()->getProduit();
    echo "</li><li class='list-group-item'>". "Date:    ";
    echo $_SESSION['panier']->getAvitaillement()->getDebut();
    echo "</li><li class='list-group-item'>". "Prix:    ";
    echo $_SESSION['panier']->getAvitaillement()->getPrix();
    echo "</li><li class='list-group-item'>";
    echo "<a href='destroybracket.php?type=avitaillement'>Annuler cet article</a></ul>";

}

if ($_SESSION['panier']->getNettoyage()) {
    echo "nettoyage: <ul class='list-group>'";
    echo "<li class='list-group-item'>". "Produit:    ";

    echo $_SESSION['panier']->getNettoyage()->getProduit();
    echo "</li><li class='list-group-item'>". "Date:    ";
    echo $_SESSION['panier']->getNettoyage()->getDebut();
    echo "</li><li class='list-group-item'>". "Prix:    ";
    echo $_SESSION['panier']->getNettoyage()->getPrix();
    echo "</li><li class='list-group-item'>";
    echo "<a href='destroybracket.php?type=nettoyage'>Annuler cet article</a></ul>";

}

if ($_SESSION['panier']->getStationnement()) {
    echo "stationnement :<ul class='list-group>'";
    echo "<li class='list-group-item'>". "Abris:    ";

    echo $_SESSION['panier']->getStationnement()->getAbris();
    echo "</li><li class='list-group-item'>". "Catégorie:    ";
    echo $_SESSION['panier']->getStationnement()->getCategorie();
    echo "</li><li class='list-group-item'>". "Date de début:    ";
    echo $_SESSION['panier']->getStationnement()->getDebut();
    echo "</li><li class='list-group-item'>". "Date de fin:    ";
    echo $_SESSION['panier']->getStationnement()->getFin();
    echo "</li><li class='list-group-item'>"."Prix:    ";
    echo $_SESSION['panier']->getStationnement()->getPrix();
    echo "</li><li class='list-group-item'>";
    echo "<a href='destroybracket.php?type=stationnement'>Annuler cet article</a></ul>";

}

if ($_SESSION['panier']->getAtterissage()) {
    echo "atterissage: <ul class='list-group>'";
    echo "<li class='list-group-item'>". "Groupe accoustique:    ";

    echo $_SESSION['panier']->getAtterissage()->getGrpAcou();
    echo "</li><li class='list-group-item'>"."Balisage:    ";
    echo $_SESSION['panier']->getAtterissage()->getBalisage();
    echo "</li><li class='list-group-item'>"."Avion:    ";
    echo $_SESSION['panier']->getAtterissage()->getAvion();
    echo "</li><li class='list-group-item'>"."Début:    ";
    echo $_SESSION['panier']->getAtterissage()->getDebut();
    echo "</li><li class='list-group-item'>"."Prix:    ";
    echo $_SESSION['panier']->getAtterissage()->getPrix();
    echo "</li><li class='list-group-item'>";
    echo "<a href='destroybracket.php?type=atterissage'>Annuler cet article</a></ul>";

}


if ($_SESSION['panier']->isEmpty()) {
    echo "<h1 align='center'><b>Votre panier est vide</b></h1>";
} else {
    echo "<a href='ajax_validate/validatebracket.php'><button class='btn-lg btn-secondary btn-block'>Valider mon panier</button></a></p>";
}

require_once 'view/footer.php';
?>
