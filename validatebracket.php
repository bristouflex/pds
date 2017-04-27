<?php
require "init.php";

$price = 0;

$bdd=connectBdd();

if(isset($_SESSION['panier'][0])){
	$price += $_SESSION['panier'][0][4];
}
if(isset($_SESSION['panier'][1])){
	$price += $_SESSION['panier'][1][4];
}
if(isset($_SESSION['panier'][2])){
	$price += $_SESSION['panier'][2][2];
}
if(isset($_SESSION['panier'][3])){
	$price += $_SESSION['panier'][3][2];
}
if(isset($_SESSION['panier'][4])){
    $price += $_SESSION['panier'][4][2];
}
if(isset($_SESSION['panier'][5])){
    $price += $_SESSION['panier'][5][1];
}
if(isset($_SESSION['panier'][6])){
    $price += $_SESSION['panier'][6][2];
}
if(isset($_SESSION['panier'][7])){
    $price += $_SESSION['panier'][7][1];
}


if(isset($_SESSION['panier'][0]) || isset($_SESSION['panier'][1]) || isset($_SESSION['panier'][2]) || isset($_SESSION['panier'][3]) || isset($_SESSION['panier'][4]) || isset($_SESSION['panier'][5]) || isset($_SESSION['panier'][6]) || isset($_SESSION['panier'][7])){
    $path = "factures/".$_SESSION['user']->getEmail()."_".date('Y-m-d_H-i-s').".pdf";

$query = $bdd->prepare(" INSERT INTO facture (idUser,adresseIP,montant,chemin,ispaid)
	VALUES (:idUser, :adresseIP, :montant, :chemin, :ispaid)");
        $query->execute( [
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

if(isset($_SESSION['panier'][0])){ // Atterissage
	//$_SESSION['panier'][0][0]; // acoustique
	//$_SESSION['panier'][0][1]; // balisage
	//$_SESSION['panier'][0][2]; // avion
	//$_SESSION['panier'][0][3]; // debut


	$query = $bdd->prepare(" INSERT INTO options_atterissage (grpacoustique,frais_dossier,avion,facture,debut)
	VALUES (:grpacoustique, :frais_dossier, :avion, :facture, :debut)");
        $query->execute( [
    	   "grpacoustique" => $_SESSION['panier'][0][0],
           "frais_dossier" => 0,
    	   "avion" => $_SESSION['panier'][0][2],
    	   "facture" => $factureID,
           "debut" => $_SESSION['panier'][0][3]
            ]);
}

if(isset($_SESSION['panier'][1])){ // Stationnement
	//$_SESSION['panier'][1][0]; // abris
	//$_SESSION['panier'][1][1]; // categorie
	//$_SESSION['panier'][1][2]; // debut
	//$_SESSION['panier'][1][3]; // fin


	$query = $bdd->prepare("INSERT INTO options_stationnement (abris,categorie,facture,debut,fin)
	VALUES (:abris, :categorie, :facture, :debut, :fin)");
        $query->execute( [
    	   "abris" => $_SESSION['panier'][1][0],
           "categorie" => $_SESSION['panier'][1][1],
    	   "facture" => $factureID,
    	   "debut" => $_SESSION['panier'][1][2],
           "fin" => $_SESSION['panier'][1][3]
            ]);
}

if(isset($_SESSION['panier'][2])){ // Nettoyage
	//$_SESSION['panier'][2][0]; // produit
	//$_SESSION['panier'][2][1]; // debut



	$query = $bdd->prepare("INSERT INTO options_nettoyage (produits,facture,debut)
	VALUES (:produits, :facture, :debut)");
        $query->execute( [
    	   "produits" => $_SESSION['panier'][2][0],
    	   "facture" => $factureID,
    	   "debut" => $_SESSION['panier'][2][1]
            ]);
}

if(isset($_SESSION['panier'][3])){ // Avitaillement
	//$_SESSION['panier'][3][0]; // essence
	//$_SESSION['panier'][3][1]; // debut



	$query = $bdd->prepare("INSERT INTO options_avitaillement (produit,facture,debut)
	VALUES (:produit, :facture, :debut)");
        $query->execute( [
    	   "produit" => $_SESSION['panier'][3][0],
    	   "facture" => $factureID,
    	   "debut" => $_SESSION['panier'][3][1]
            ]);
}

if(isset($_SESSION['panier'][4])){ // bapteme
    $query = $bdd->prepare("INSERT INTO options_bapteme (instructeur,date,facture,bapteme)
    VALUES (:instructeur, :date, :facture, :bapteme)");
    $query->execute( [
    "instructeur" => $_SESSION['panier'][4][1],
    "date" => $_SESSION['panier'][4][3],
    "facture" => $factureID,
    "bapteme" => $_SESSION['panier'][4][0]
     ]);
}

if(isset($_SESSION['panier'][5])){ // parachute
    $query = $bdd->prepare("INSERT INTO options_parachute (parachute,debut,facture)
    VALUES (:parachute, :debut, :facture)");
    $query->execute( [
    "parachute" => $_SESSION['panier'][5][1],
    "debut" => $_SESSION['panier'][5][2],
    "facture" => $factureID
     ]);
}

if(isset($_SESSION['panier'][6])){ // lecon
    $query = $bdd->prepare("INSERT INTO options_lecon (instructeur, date, lecon, facture)
        VALUES (:instructeur, :date, :lecon, :facture)");
    $query->execute( [
    "instructeur" => $_SESSION["panier"][6][1],
    "date" => $_SESSION["panier"][6][3],
    "lecon" => $_SESSION["panier"][6][0],
    "facture" => $factureID
     ]);
}


if(isset($_SESSION['panier'][7])){ // location_ulm
$query = $bdd->prepare("INSERT INTO options_location_ulm (location_ulm,date,facture)
        VALUES (:location_ulm,:date,:facture)");
    $query->execute( [
    "location_ulm" => $_SESSION["panier"][7][0],
    "date" => $_SESSION["panier"][7][2],
    "facture" => $factureID
     ]);
}

ob_start();

    echo "Facture Pour : " . $_SESSION['user']->getEmail() . "<br><br>";
    echo "Fait le : " . date('Y-m-d H:i:s') . "<br><br>";

    if(isset($_SESSION['panier'][0])){
    echo "Atterissage :<br><br>";
    echo "Groupe Acoustique : " . $_SESSION['panier'][0][0] .  "<br>";
    echo "Balisage : " . $_SESSION['panier'][0][1] . "<br>";
    echo "Avion : " . $_SESSION['panier'][0][2] . "<br>";
    echo "Debut : " . $_SESSION['panier'][0][3] . "<br>";
    echo "Prix :" . $_SESSION['panier'][0][4] . "<br><br>";
    }
    if(isset($_SESSION['panier'][1])){
    echo "Stationnement :<br><br>";
    echo "Abris : " . $_SESSION['panier'][1][0] .  "<br>";
    echo "Categorie : " . $_SESSION['panier'][1][1] .  "<br>";
    echo "Début : " . $_SESSION['panier'][1][2] .  "<br>";
    echo "Fin : " . $_SESSION['panier'][1][3] .  "<br>";
    echo "Prix :" . $_SESSION['panier'][1][4] . "<br><br>";
    }
    if(isset($_SESSION['panier'][2])){
     echo "Nettoyage :<br><br>";
     echo "Produit : " . $_SESSION['panier'][2][0] .  "<br>";
     echo "Début : " . $_SESSION['panier'][2][1] .  "<br>";
    echo "Prix :" . $_SESSION['panier'][2][2] . "<br><br>";
    }
    if(isset($_SESSION['panier'][3])){
         echo "Avitaillement :<br><br>";
     echo "Essence : " . $_SESSION['panier'][3][0] .  "<br>";
     echo "Début : " . $_SESSION['panier'][3][1] .  "<br>";
    echo "Prix :" . $_SESSION['panier'][3][2] . "<br><br>";
    }
    if(isset($_SESSION['panier'][4])){
         echo "Bapteme :<br><br>";
     echo "Bapteme de type : " . $_SESSION['panier'][4][0] .  "<br>";
     echo "Instructeur : " . $_SESSION['panier'][4][1] .  "<br>";
    echo "Début : " . $_SESSION['panier'][4][3] .  "<br>";
    echo "Prix :" . $_SESSION['panier'][4][2] . "<br><br>";
    }
    if(isset($_SESSION['panier'][5])){
         echo "Parachute :<br><br>";
     echo "Parachute de type : " . $_SESSION['panier'][5][0] .  "<br>";
    echo "Début : " . $_SESSION['panier'][5][2] .  "<br>";
    echo "Prix :" . $_SESSION['panier'][5][1] . "<br><br>";
    }
     if(isset($_SESSION['panier'][6])){
         echo "Lecon :<br><br>";
     echo "Lecon de type : " . $_SESSION['panier'][6][0] .  "<br>";
     echo "Instructeur : " . $_SESSION['panier'][6][1] .  "<br>";
    echo "Début : " . $_SESSION['panier'][6][3] .  "<br>";
    echo "Prix :" . $_SESSION['panier'][6][2] . "<br><br>";
    }
    if(isset($_SESSION['panier'][7])){
         echo "Location :<br><br>";
     echo "Location de type : " . $_SESSION['panier'][7][0] .  "<br>";
    echo "Début : " . $_SESSION['panier'][7][2] .  "<br>";
    echo "Prix :" . $_SESSION['panier'][7][1] . "<br><br>";
    }

    if (isset($_SESSION['panier'][0]) || isset($_SESSION['panier'][1]) || isset($_SESSION['panier'][2]) || isset($_SESSION['panier'][3]) || isset($_SESSION['panier'][4]) || isset($_SESSION['panier'][5]) || isset($_SESSION['panier'][6]) || isset($_SESSION['panier'][7])) {
        echo "Prix total : ".$price ."<br>";
    }

    $content = ob_get_clean();
   require_once("html2pdf/html2pdf.class.php");
    try
    {
        $html2pdf = new HTML2PDF("P", "A4", "fr");
      // $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont("Arial");
        $html2pdf->writeHTML($content);
        $html2pdf->Output($path,"F");
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

for($i=0;$i<8;$i++){
    unset($_SESSION['panier'][$i]);
}

if($_SESSION["user"]->getIsMember()){
header('Location: myactivity.php');
}else{
header('Location: myservice.php');
}

?>
