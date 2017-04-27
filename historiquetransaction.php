<?php
require "init.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>AEN - Historique Transactions</title>
        <meta name="Description" lang="en" content="Bienvenue sur le site de l'AEN">

        <?php
        if (isConnected()) {
            require 'header.php';
            welcome();
            showmoney();


            $bdd = connectBdd();
            $query = $bdd->prepare("SELECT id FROM inscrit WHERE email = :email AND isMember=:isMember");
            $query->execute([ "email" => $_SESSION["user"]->getEmail(), "isMember" => $_SESSION["user"]->getIsMember()]);
            $verif = $query->fetch();
            $_SESSION['id'] = $verif[0];


            $query = $bdd->prepare("SELECT * FROM historiquetransaction WHERE idUser = :id");
            $query->execute([ "id" => $_SESSION['id']]);
            $verif = $query->fetch();

            if (empty($verif)) {

                echo "<br><br>Votre historique de transaction est vide <br>";
            } else {

                echo "<br><br><b>Votre historique de transaction est :</b><br><br>";
                echo "<table border=1 CELLPADDING=5>";
                $i = 1;
                $query = $bdd->prepare("SELECT * FROM historiquetransaction WHERE idUser = :id");
                $query->execute([ "id" => $_SESSION['id']]);
                while ($data = $query->fetch()) {
                    echo "<tr>";
                    echo "<td>ID : " . $i . "</td>";
                    echo "<td>Adresse IP : " . $data['adresseIP'] . "</td>";
                    echo "<td>Date : " . $data['date'] . "</td>";
                    echo "<td>Montant : " . $data['montant'] . "</td>";
                    echo "</tr>";
                    $i++;
                }
                echo "</table>";
            }
        } else {
            unset($_SESSION["user"]);
            header("Location: login.php");
        }
        ?>

        <br><a href="online.php">Retour au menu</a>
    </body>
</html>
