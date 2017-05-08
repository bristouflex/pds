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

echo '<h1 align="center">Mes informations personelles</h1>';
echo "<br>";

$bdd = connectBdd();

if (isset($_POST['adresse']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['phone'])) {

    validatorPwd($_POST['password1'], $_POST['password2']);
    validatorAdresse($_POST['adresse']);
    validatorPhone($_POST['phone']);

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
        $query = $bdd->prepare('UPDATE inscrit SET password = :password, adresse =:adresse, phone=:phone WHERE id = :id');
        $query->execute(["password" => $_POST['password1'], "adresse" => $_POST['adresse'], "phone" => $_POST['phone'], "id" => $_SESSION["user"]->getId()]);
        header('Location: online.php');
    }
}

if (isset($_SESSION["user"])) {
    $infos = data("inscrit", $_SESSION["user"]->getId()); // fct//
    if (!empty($infos) && empty($_POST)) $_POST = $infos;
    else if (empty($infos)) header('Location: online.php');

    echo '<form method="post" actions="myinfo.php">';
    echo "<div class=\"form-group row\">
                <label for=\"password_pay\" class=\"col-md-offset-2 col-md-2 col-form-label\">Mot de passe</label>
                <div class=\"col-md-2\">
                   <input class=\"form-control\" type='password' name='password1' placeholder='Mot de passe' id='password_pay' required>
                </div>
            </div>";
    echo "<div class=\"form-group row\">
                <label for=\"password_pay_conf\" class=\"col-md-offset-2 col-md-2 col-form-label\">Confirmation</label>
                <div class=\"col-md-2\">
                   <input class=\"form-control\" type='password' name='password2' placeholder='Confirmation' id='password_pay_conf' required>
                </div>
            </div>";
    echo "<div class=\"form-group row\">
                <label for=\"text_adresse\" class=\"col-md-offset-2 col-md-2 col-form-label\">Adresse</label>
                <div class=\"col-md-2\">                 
                   <textarea class=\"form-control\" name='adresse' placeholder='adresse' id='text_adresse'>". $infos['adresse'] ."</textarea>
                </div>
            </div>";
    echo "<div class=\"form-group row\">
                <label for=\"text_adresse\" class=\"col-md-offset-2 col-md-2 col-form-label\">Phone</label>
                <div class=\"col-md-2\">
                   <input class=\"form-control\" type='text'  name='phone' placeholder='adresse' value='" . $infos['phone'] ."'  id='text_adresse' required>
                </div>
            </div>";
    echo "<div class=\"form-group row\">              
                <div class=\"col-md-3 col-md-offset-4\">
                    <button value=\"submit\" class=\"btn btn-secondary btn-lg btn-block\" >modifier</button>
                </div>
            </div>";
    echo '';
    echo '</form>';

} else {
    header('Location: login.php');
}
echo "</div>";
require_once 'view/footer.php';
?>

