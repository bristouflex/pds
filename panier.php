<?php

//$query = $bdd->prepare("SELECT * FROM options_stationnement, facture WHERE:debut >= debut AND :debut <= fin && :fin >= debut AND  :fin <= fin
//AND options_stationnement.facture = facture.
//")
//$query->execute( [ "debut" => $_POST["debut"], "fin" => $_POST["fin"], "iduser" => $_SESSION['id']]);
//$verif = $query->fetch();


require_once "init.php";
if ( ! isConnected()) {
	header( "location: login.php" );
}


if ($_SESSION['panier']->getLocationUlm()) {
	echo "location ulm: <br>";
    echo "<br>";
	echo $_SESSION['panier']->getLocationUlm()->getLocationUlm();
	echo "<br>";
	echo $_SESSION['panier']->getLocationUlm()->getDate();
	echo "<br>";
	echo $_SESSION['panier']->getLocationUlm()->getPrix();
	echo "<br>";
	echo "<a href='destroybracket.php?inf=7'>Annuler ce panier</a><br>";

}

if ($_SESSION['panier']->getLecon()) {
	echo "lecon: <br>";
	echo "<br>";

	echo $_SESSION['panier']->getLecon()->getLecon();
	echo "<br>";
	echo $_SESSION['panier']->getLecon()->getInstructeur();
	echo "<br>";
	echo $_SESSION['panier']->getLecon()->getDate();
	echo "<br>";
	echo $_SESSION['panier']->getLecon()->getPrix();
	echo "<br>";
	echo "<a href='destroybracket.php?inf=6'>Annuler ce panier</a><br>";

}

if ($_SESSION['panier']->getParachute()) {
	echo "parachute: <br>";
	echo "<br>";

	echo $_SESSION['panier']->getParachute()->getParachute();
	echo "<br>";
	echo $_SESSION['panier']->getParachute()->getDebut();
	echo "<br>";
	echo $_SESSION['panier']->getParachute()->getPrix();
	echo "<br>";
	echo "<a href='destroybracket.php?inf=5'>Annuler ce panier</a><br>";

}


if ($_SESSION['panier']->getBapteme()) {
	echo "bapteme: <br>";
	echo "<br>";

	echo $_SESSION['panier']->getBapteme()->getBapteme();
	echo "<br>";
	echo $_SESSION['panier']->getBapteme()->getInstructeur();
	echo "<br>";
	echo $_SESSION['panier']->getBapteme()->getDate();
	echo "<br>";
	echo $_SESSION['panier']->getBapteme()->getPrix();
	echo "<br>";
	echo "<a href='destroybracket.php?inf=4'>Annuler ce panier</a><br>";

}

if ($_SESSION['panier']->getAvitaillement()) {
	echo "avitaillement: <br>";
	echo "<br>";

	echo $_SESSION['panier']->getAvitaillement()->getProduit();
	echo "<br>";
	echo $_SESSION['panier']->getAvitaillement()->getDebut();
	echo "<br>";
	echo $_SESSION['panier']->getAvitaillement()->getPrix();
	echo "<br>";
	echo "<a href='destroybracket.php?inf=3'>Annuler ce panier</a><br>";

}

if ($_SESSION['panier']->getNettoyage()) {
	echo "nettoyage: <br>";
	echo "<br>";

	echo $_SESSION['panier']->getNettoyage()->getProduit();
	echo "<br>";
	echo $_SESSION['panier']->getNettoyage()->getDebut();
	echo "<br>";
	echo $_SESSION['panier']->getNettoyage()->getPrix();
	echo "<br>";
	echo "<a href='destroybracket.php?inf=2'>Annuler ce panier</a><br>";

}

if ($_SESSION['panier']->getStationnement()) {
	echo "stationnement : <br>";
	echo "<br>";

	echo $_SESSION['panier']->getStationnement()->getAbris();
	echo "<br>";
	echo $_SESSION['panier']->getStationnement()->getCategorie();
	echo "<br>";
	echo $_SESSION['panier']->getStationnement()->getDebut();
	echo "<br>";
	echo $_SESSION['panier']->getStationnement()->getFin();
	echo "<br>";
	echo $_SESSION['panier']->getStationnement()->getPrix();
	echo "<br>";
	echo "<a href='destroybracket.php?inf=1'>Annuler ce panier</a><br>";

}

if ($_SESSION['panier']->getAtterissage()) {
	echo "atterissage: <br>";
	echo "<br>";

	echo $_SESSION['panier']->getAtterissage()->getGrpAcou();
	echo "<br>";
	echo $_SESSION['panier']->getAtterissage()->getBalisage();
	echo "<br>";
	echo $_SESSION['panier']->getAtterissage()->getAvion();
	echo "<br>";
	echo $_SESSION['panier']->getAtterissage()->getDebut();
	echo "<br>";
	echo $_SESSION['panier']->getAtterissage()->getPrix();
	echo "<br>";
	echo "<a href='destroybracket.php?inf=0'>Annuler ce panier</a><br>";

}

if ($_SESSION['panier']->isEmpty()) {
	echo "<br>";
	echo "<b>Votre panier est vide</b>";
	echo "<br>";
} else {
	echo "<br>";
	echo "<a href='validatebracket.php'>Valider mon panier</a>";
	echo "<br>";
}
?>
