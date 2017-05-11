<?php
require "init.php";

if (!backisConnected()) {
    session_destroy();
    header("location: index.php");
}

$i = 0;
echo '<div id="page-wrapper">
           <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Back-office AEN</h4>
                    </div>
                </div>
            <div class="row">
            <div class="col-md-12">
                <div class="white-box" id="liste_utilisateurs">
                    <h3 class="box-title">Modifier un service</h3>';
echo "<table class='table-bordered table table-responsive'>";
$bdd = connectBdd();
$answer = $bdd->query('SELECT * FROM inscrit');
while ($data = $answer->fetch()) {
    if ($i == 0) {
        echo "<tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Email</th><th>Password</th><th>Birth</th><th>Genre</th><th>Adresse</th><th>Phone</th><th>Identity</th><th>Credit</th><th>IsMember</th><th>Statut</th></tr>";
        $i = 1;
    }
    echo "<tr>";
    echo "<td>" . $data['id'] . "</td>";
    echo "<td>" . $data['nom'] . "</td>";
    echo "<td>" . $data['prenom'] . "</td>";
    echo "<td>" . $data['email'] . "</td>";
    echo "<td>" . $data['password'] . "</td>";
    echo "<td>" . $data['birth'] . "</td>";
    echo "<td>" . $data['genre'] . "</td>";
    echo "<td>" . $data['adresse'] . "</td>";
    echo "<td>" . $data['phone'] . "</td>";
    echo "<td>" . $data['identity'] . "</td>";
    echo "<td>" . $data['credit'] . "</td>";
    echo "<td>" . $data['isMember'] . "</td>";
    echo "<td>" . $data['statut'] . "</td>";
    echo "<td><a class='boutonstylee' href='activateking.php?id=" . $data['id'] . "'>PARDON</a></td>";
    echo "<td><a class='boutonstylee' href='deleteking.php?id=" . $data['id'] . "'>BAN HAMMER</a></td>";
    echo "</tr>";
}
echo "</table>";

?>
        </div>
        </div>
    </div>
</div>

