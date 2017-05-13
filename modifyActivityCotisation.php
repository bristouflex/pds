<?php

require "init.php";

$bdd = connectBdd();

if(isset($_POST['prix']) && $_POST['prix'] != ""){
    $query = $bdd->prepare('UPDATE cotisation SET prix = :prix WHERE id = :id');
    $query->execute([
        "prix" => $_POST['prix'],
        "id" => $_POST['id']
    ]);
    echo $_POST['id'];
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
                    <h3 class="box-title">Modifier une activité</h3>
                    <div class="row">
                        <ul class="list-inline">
                            <li><button type="button" class="btn" onclick="tb_Bapteme()">Bapteme</button></li>
                            <li><button type="button" class="btn" onclick="tb_Cotisation()">Cotisation</button></li>
                            <li><button type="button" class="btn" onclick="tb_Lecon()">Lecon</button></li>
                            <li><button type="button" class="btn" onclick="tb_LocationULM()">LocationULM</button></li>
                            <li><button type="button" class="btn" onclick="tb_Parachute()">Parachute</button></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div id="options_b">';

echo "<table class='table table-bordered table-responsive'>";
echo "<tr><th>ID</th><th>Type</th><th>Prix</th></tr>";
$bdd = connectBdd();
$answer = $bdd->query('SELECT * FROM cotisation');
while ($data = $answer->fetch()) {
    echo "<tr>";
    echo "<td>" . $data['id'] . "</td>";
    echo "<td>" . $data['type'] . "</td>";
    echo "<td><input class='form-control' type='text' id='prix" . $data['id'] . "' value='" . $data['prix'] . "' placeholder='prix' </td>";
    echo "<td><button class='btn' onclick='update_cotisation_modification(" . $data['id'] . ")'>Modifier</button></td>";
    echo "</tr>";
}
echo "</table>";

echo '</div>
                    </div>
                </div>
            </div>
        </div>
    </div>';



?>