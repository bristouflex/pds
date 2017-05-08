<?php

require "init.php";

if (isConnected()) {
    /* $bdd = connectBdd();
      $query2 = $bdd->prepare("SELECT identity FROM inscrit WHERE email = :email");
      $query2 -> execute(["email" => $_SESSION["email"]]);
      $resultat2 = $query2 -> fetch();
      echo $resultat2; */

    unset($_SESSION["error_subscribe"]);
} else {
    unset($_SESSION["User"]);
    header("Location: index.php");
}

require_once 'view/header.php';
require_once 'view/menu.php';
echo "<div class=\"col-md-9\">";

$bdd = connectBdd();

echo "<h3 align='center'>Liste des Activités</h3>";

echo "<br><br>Pour payer une facture, entrez votre mot de passe et selectionner 'payer' pour la facture correspondante<br><br>";

echo "<form method='POST' action='myactivity.php' enctype='multipart/form-data'>";
echo "Veuillez entrer votre mot de passe avant de payer une facture !";
echo "<div class=\"form-group row\">
                <label for=\"password_pay\" class=\"col-md-offset-2 col-md-2 col-form-label\">mot de passe</label>
                <div class=\"col-md-2\">
                   <input type='password' name='password' placeholder='Mot de passe' id='password_pay' required>
                </div>
            </div>";

echo "<div class=\"form-group row\">
                <label for=\"password_pay_conf\" class=\"col-md-offset-2 col-md-2 col-form-label\">confirmation</label>
                <div class=\"col-md-2\">
                   <input type='password' name='password2' placeholder='Confirmation' id='password_pay_conf' required>
                </div>
            </div>";

echo "<div class=\"form-group row\">
                <div class=\"col-md-3 col-md-offset-4\">
                    <button value=\"submit\" class=\"btn btn-secondary btn-lg btn-block\" >valider</button>
                </div>
            </div>";
echo "</form>";

if (isset($_POST['password']) && isset($_POST['password2'])) {
    $bdd = connectBdd();
    $query = $bdd->prepare("SELECT password FROM inscrit WHERE email=:email AND isMember = :isMember");
    $query->execute(["email" => $_SESSION['user']->getEmail(), "isMember" => $_SESSION['user']->getIsMember()]);
    $resultat = $query->fetch();

    $hash = $resultat["password"];

    if (password_verify($_POST['password'], $hash)) {
        $_SESSION['paypass'] = 1;
    } else {
        echo "<br><br>Mot de passe erroné ou non correspondant<br><br>";
    }
} else {
    echo "<br><br>Vous n'avez pas encore entré votre mot de passe permettant de valider une facture<br><br>";
}

echo "<table class='table table-bordered table-responsive'>";
$i = 1;

echo "<tr> <th>Numéro</th> <th>Adresse IP</th> <th>Montant</th> <th>Facture</th> <th>Status</th> <th>Payer</th> <th>Supprimer</th></tr>";
$query = $bdd->prepare("SELECT * FROM facture WHERE idUser = :id");
$query->execute(["id" => $_SESSION['user']->getId()]);
while ($data = $query->fetch()) {
    echo "<tr>";
    echo "<td>" . $i . "</td>";
    echo "<td>" . $data['adresseIP'] . "</td>";
    echo "<td>" . $data['montant'] . "</td>";
    echo "<td>" . "<a href=" . $data['chemin'] . ">Télécharger</a>" . "</td>";
    echo "<td>";
    echo $data['ispaid'] ? "payée" : "non payée" . "</td>";
    echo "<td><a href='payfacture.php?idfacture=$data[id]'>Payer</a></td>";
    if ($data['ispaid'] == 0) {
        echo "<td><a href='deletefacture.php?idfacture=$data[id]'>Supprimer</a></td>";
    }
    echo "</tr>";
    $i++;
}
echo "</table>";


?>
</div>

<?php
require_once 'view/footer.php';
