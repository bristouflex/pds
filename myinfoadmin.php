<?php
require "init.php";
if (!backisConnected()) {
    session_destroy();
    header("location: ../index.php");
}


$bdd = connectBdd();
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
                    <h3 class="box-title">Voir les factures</h3>';
echo "<p>Veuillez remplir tous les champs!</p>";
if (isset($_POST['password1']) && isset($_POST['password2'])) {

    validatorPwd($_POST['password1'], $_POST['password2']);

    if (!empty($_POST["password1"])) {
        validatorPwd($_POST['password1'], $_POST['password2']);
        $_POST["password1"] = password_hash($_POST["password1"], PASSWORD_DEFAULT);
    }


    if (isset($_SESSION['error_subscribe'])) {
        $_POST = $_SESSION;
        echo '<ul>';
        foreach ($_SESSION['error_subscribe'] as $error) echo '<li>' . $list_of_errors[$error];
        echo '</ul>';
        unset($_SESSION['error_subscribe']);
    } else {

        $bdd = connectBdd();
        $query = $bdd->prepare('UPDATE administrateur SET password = :password WHERE id = :id');
        $query->execute(["password" => $_POST['password1'], "id" => $_SESSION['id']]);
        header('Location: onlineadmin.php');
    }
}

$infos = data("administrateur", $_SESSION['id']); // fct//
if (!empty($infos) && empty($_POST)) $_POST = $infos;
else if (empty($infos)) header('Location: onlineadmin.php');

echo '<form class="form-group" method="post" actions="myinfoadmin.php">';
echo '<p><input class="form-control" type="password" name="password1" placeholder="Mot de passe :"></p>';
echo '<p><input class="form-control" type="password" name="password2" placeholder="Confirmation :"></p>';
echo '<input class="btn" type="submit" value="Modifier">';
echo '</form>';


echo "</div>
            </div>
        </div>
    </div>";