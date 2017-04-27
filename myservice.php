<?php

require "init.php";

if (!isConnected()) {
    header("location: index.php");
}
require 'header.php';
welcome();
showmoney();

$bdd = connectBdd();
echo "<br><br>Pour payer une facture, entrez votre mot de passe et selectionner 'payer' pour la facture correspondante";
echo "<br><br><b>Vos services sont :</b><br><br>";
echo "<table border=1 CELLPADDING=5>";
$i = 1;


echo "A FAIRE : cliquer sur blabla (chemin) pour telecharger la facture...<br> ajouter date creation de facture ???<br>";

$query = $bdd->prepare("SELECT * FROM facture WHERE idUser = :id");
$query->execute([ "id" => $_SESSION["user"]->getId()]);
while ($data = $query->fetch()) {
    echo "<tr>";
    echo "<td>ID : " . $i . "</td>";
    echo "<td>Adresse IP : " . $data['adresseIP'] . "</td>";
    echo "<td>Montant : " . $data['montant'] . "</td>";
    echo "<td>Facture : " . $data['chemin'] . "</td>";
    echo "<td>Payé ? : " . $data['ispaid'] . "</td>";
    echo "<td><a href='payfacture.php?idfacture=$data[id]'>Payer</a></td>";
    echo "</tr>";
    $i++;
}
echo "</table>";

echo "<form method='POST' action='myservice.php' enctype='multipart/form-data'>";
echo "<br><br>Veuillez entrer votre mot de passe avant de payer une facture !<br><br>";
echo "<input type='password' name='password' placeholder='Mot de passe' required><br><br>";
echo "<input type='password' name='password2' placeholder='Confirmation' required><br><br>";
echo "<input type='submit' value='Valider'>";

if (isset($_POST['password']) && isset($_POST['password2'])) {
    $bdd = connectBdd();
    $query = $bdd->prepare("SELECT password FROM inscrit WHERE email=:email AND isMember = :isMember");
    $query->execute(["email" => $_SESSION['user']->getEmail(), "isMember" => $_SESSION['user']->getIsMember()]);
    $resultat = $query->fetch();

    $hash = $resultat["password"];

    if (password_verify($_POST['password'], $hash)) {
        $_SESSION['paypass'] = 1;
    } else {
        echo "Mot de passe erroné ou non correspondant";
    }
} else {
    echo "Vous n'avez pas encore entré votre mot de passe permettant de valider une facture";
}
?>
