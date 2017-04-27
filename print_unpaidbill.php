<?php
require 'init.php';
$bdd=connectBdd();


echo "<table border=1 CELLPADDING=5>";
$i = 1;


$query = $bdd->prepare("SELECT * FROM facture WHERE isPaid = 0");
$query->execute();
while ($data = $query->fetch()) {
    echo "<tr>";
    echo "<td>ID : " . $i . "</td>";
    $query2 = $bdd->prepare("SELECT email FROM inscrit WHERE id=:idUser");
    $query2->execute(["idUser" => $data["idUser"]]);
    $data2 = $query2->fetch();
    echo "<td>USER : ".$data2["email"]."</td>";
    echo "<td>Adresse IP : " . $data['adresseIP'] . "</td>";
    echo "<td>Montant : " . $data['montant'] . "</td>";
    echo "<td>Facture : " ."<a href=".$data['chemin'].">Télécharger</a>". "</td>";
    echo "</tr>";
    $i++;
}
echo "</table>";
