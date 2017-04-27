<?php

//$query = $bdd->prepare("SELECT * FROM options_stationnement, facture WHERE:debut >= debut AND :debut <= fin && :fin >= debut AND  :fin <= fin
//AND options_stationnement.facture = facture.
//")
//$query->execute( [ "debut" => $_POST["debut"], "fin" => $_POST["fin"], "iduser" => $_SESSION['id']]);
//$verif = $query->fetch();




 require_once "init.php";
  if(!isConnected()){
  header("location: login.php");
  }


if (isset($_SESSION['panier'][7])) {
    echo "location ulm: <br>";
    echo "<br>";
    $max = count($_SESSION['panier'][7]) / 3;
    $indice = 0;
    for ($i = 0; $i < $max; $i++) {
        echo $_SESSION['panier'][7][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][7][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][7][$indice++];
        echo "<br>";
        echo "<a href='destroybracket.php?inf=7'>Annuler ce panier</a><br>";
    }
}

if (isset($_SESSION['panier'][6])) {
    echo "lecon: <br>";
    echo "<br>";
    $max = count($_SESSION['panier'][6]) / 4;
    $indice = 0;
    for ($i = 0; $i < $max; $i++) {
        echo $_SESSION['panier'][6][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][6][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][6][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][6][$indice++];
        echo "<br>";
        echo "<a href='destroybracket.php?inf=6'>Annuler ce panier</a><br>";
    }
}

if (isset($_SESSION['panier'][5])) {
    echo "parachute: <br>";
    echo "<br>";
    $max = count($_SESSION['panier'][5]) / 3;
    $indice = 0;
    for ($i = 0; $i < $max; $i++) {
        echo $_SESSION['panier'][5][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][5][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][5][$indice++];
        echo "<br>";
        echo "<a href='destroybracket.php?inf=5'>Annuler ce panier</a><br>";
    }
}


if (isset($_SESSION['panier'][4])) {
    echo "bapteme: <br>";
    echo "<br>";
    $max = count($_SESSION['panier'][4]) / 4;
    $indice = 0;
    for ($i = 0; $i < $max; $i++) {
        echo $_SESSION['panier'][4][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][4][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][4][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][4][$indice++];
        echo "<br>";
        echo "<a href='destroybracket.php?inf=4'>Annuler ce panier</a><br>";
    }
}

if (isset($_SESSION['panier'][3])) {
    echo "avitaillement: <br>";
    echo "<br>";
    $max = count($_SESSION['panier'][3]) / 3;
    $indice = 0;
    for ($i = 0; $i < $max; $i++) {
        echo $_SESSION['panier'][3][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][3][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][3][$indice++];
        echo "<br>";
        echo "<a href='destroybracket.php?inf=3'>Annuler ce panier</a><br>";
    }
}

if (isset($_SESSION['panier'][2])) {
    echo "nettoyage: <br>";
    echo "<br>";
    $max = count($_SESSION['panier'][2]) / 3;
    $indice = 0;
    for ($i = 0; $i < $max; $i++) {
        echo $_SESSION['panier'][2][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][2][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][2][$indice++];
        echo "<br>";
        echo "<a href='destroybracket.php?inf=2'>Annuler ce panier</a><br>";
    }
}

if (isset($_SESSION['panier'][1])) {
    echo "stationnement : <br>";
    echo "<br>";
    $max = count($_SESSION['panier'][1]) / 5;
    $indice = 0;
    for ($i = 0; $i < $max; $i++) {
        echo $_SESSION['panier'][1][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][1][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][1][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][1][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][1][$indice++];
        echo "<br>";
        echo "<a href='destroybracket.php?inf=1'>Annuler ce panier</a><br>";
    }
}

if (isset($_SESSION['panier'][0])) {
    echo "atterissage: <br>";
    echo "<br>";
    $max = count($_SESSION['panier'][0]) / 5;
    $indice = 0;
    for ($i = 0; $i < $max; $i++) {
        echo $_SESSION['panier'][0][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][0][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][0][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][0][$indice++];
        echo "<br>";
        echo $_SESSION['panier'][0][$indice++];
        echo "<br>";
        echo "<a href='destroybracket.php?inf=0'>Annuler ce panier</a><br>";
    }
}

if (!isset($_SESSION['panier'][0]) && !isset($_SESSION['panier'][1]) && !isset($_SESSION['panier'][2]) && !isset($_SESSION['panier'][3]) && !isset($_SESSION['panier'][4]) && !isset($_SESSION['panier'][5]) && !isset($_SESSION['panier'][6]) && !isset($_SESSION['panier'][7])) {
    echo "<br>";
    echo "<b>Votre panier est vide</b>";
    echo "<br>";
} else {
    echo "<br>";
    echo "<a href='validatebracket.php'>Valider mon panier</a>";
    echo "<br>";
}
?>
