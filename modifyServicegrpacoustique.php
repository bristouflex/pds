<?php

require "init.php";

$bdd = connectBdd();

if(isset($_POST['prix']) && $_POST['prix'] != "" && isset($_POST['prix2']) && $_POST['prix2'] != ""){
    $query = $bdd->prepare('UPDATE grpacoustique SET jour_soir = :jour, nuit = :nuit WHERE numero = :id');
    $query->execute([
        "jour" => $_POST['prix'],
        "nuit" => $_POST['prix2'],
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
$bdd = connectBdd();
echo "<tr><th>Numero</th><th>Jour_Soir</th><th>Nuit</th></tr>";
$answer = $bdd->query('SELECT * FROM grpacoustique');
while ($data = $answer->fetch()) {
    echo "<tr>";
    echo "<td>" . $data['numero'] . "</td>";
    echo "<td><input type='text' id='jour".$data['numero']."' value='".$data['jour_soir']."' placeholder='prix' </td>";
    echo "<td><input type='text' id='nuit".$data['numero']."' value='".$data['nuit']."' placeholder='prix' </td>";
    echo "<td><button class='btn' onclick='update_grpacoustique_modification(\"" . $data['numero'] . "\")'>Modifier</button></td>";
    echo "</tr>";
}
echo "</table>";
echo '                  </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';