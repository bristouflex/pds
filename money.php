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
    logout();
}

require_once 'view/header.php';
require_once 'view/menu.php';

?>

    <!-- CONTENU DE LA PAGE -->
    <div class="col-md-9">
        <h3 class="m_1" align="center">Ajouter du crédit</h3><br><br>

        <form method="POST" action="moneyupdate.php">
            <div class="form-group row">
                <label for="argent" class="col-md-offset-2 col-md-2 col-form-label">Montant (€)</label>
                <div class="col-md-2">
                    <input class="form-control" type="number" name="montant" step="5" value="0" min="0" max="10000"
                           id="argent" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pwd_argent" class="col-md-offset-2 col-md-2 col-form-label">mot de passe</label>
                <div class="col-md-3">
                    <input class="form-control" type="password" name="password1" placeholder="Mot de passe" id="pwd_argent" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pwd_argent_confirm" class="col-md-offset-2 col-md-2 col-form-label">confirmation</label>
                <div class="col-md-3">
                    <input class="form-control" type="password" name="password2" placeholder="Confirmation" id="pwd_argent_confirm" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3 col-md-offset-4">
                    <button value="submit" class="btn btn-secondary btn-lg btn-block" >valider</button>
                </div>
            </div>
        </form>
    </div>


<?php
require_once 'view/footer.php';