<?php

require "init.php";

$bdd = connectBdd();
if(isset($_POST['prix']) && $_POST['prix'] != ""){
    $tva = $_POST['prix'] * 0.2;
    $ttc = $_POST['prix'] + $tva;
    $query = $bdd->prepare('UPDATE produits SET ht = :prix, tva = :tva, ttc = :ttc WHERE nom = :id');
    $query->execute([
        "prix" => $_POST['prix'],
        "tva" => $tva,
        "ttc" => $ttc,
        "id" => $_POST['id']
    ]);
}
echo '<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Back-office AEN</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Modifier un service</h3>
                    <div class="row">
                        <ul class="list-inline">
                            <li><button type="button" class="btn" onclick="tb_abris()">Abris</button></li>
                            <li><button type="button" class="btn" onclick="tb_avion()">Avion</button></li>
                            <li><button type="button" class="btn" onclick="tb_categorie()">Categorie</button></li>
                            <li><button type="button" class="btn" onclick="tb_grpacoustique()">Groupe Acoustique</button></li>
                            <li><button type="button" class="btn" onclick="tb_produit()">Produit</button></li>
                            <li><button type="button" class="btn" onclick="tb_redevances()">Redevances</button></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div id="options_b">';
echo "<table class='table table-bordered table-responsive'>";
echo "<tr><th>Nom</th><th>Type</th><th>HT</th><th>TVA</th><th>TTC</th></tr>";
$bdd = connectBdd();
$answer = $bdd->query ('SELECT * FROM produits');
while($data = $answer->fetch()){
    echo "<tr>";
    echo "<td>".$data['nom']."</td>";
    echo "<td>".$data['type']."</td>";
    echo "<td><input type='text' id='prix".$data['nom']."' value='".$data['ht']."' placeholder='prix' </td>";
    echo "<td>" . $data['tva'] . "</td>";
    echo "<td>" . $data['ttc'] . "</td>";
    echo "<td><button class='btn' onclick='update_produit_modification(\"" . $data['nom'] . "\")'>Modifier</button></td>";
    echo "</tr>";
}
echo "</table>";
echo '                  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';