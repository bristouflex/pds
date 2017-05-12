<?php
/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 11/05/2017
 * Time: 19:49
 */

require "init.php";

if (isConnected()) {
    unset($_SESSION["error_subscribe"]);
} else {
    logout();
}
$bdd = connectBdd();
if(isset($_POST["type"]) && $_POST["nom"] != "" && isset($_POST["superficie"]) && isset($_POST["poids"])){
    $query = $bdd->prepare("INSERT INTO detention_avion (type_avion, nom, superficie, poids, supprime, inscrit) VALUE (:type, :nom, :superficie, :poids, :supprime, :inscrit)");
    $query->execute([
        "type" => $_POST["type"],
        "nom" => $_POST["nom"],
        "superficie" => $_POST["superficie"],
        "poids" => $_POST["poids"],
        "supprime" => 0,
        "inscrit" => $_SESSION["user"]->getId()
    ]);
    echo "<h1 align='center'>Votre Avion a bien été ajouté</h1>";
    echo "<p align='center'><button class='btn-primary btn' onclick='display_user_plane()'>retour</button></p>";

}else {

    echo '<form>
    <div class="form-group row">
        <label for="nom" class="col-md-offset-2 col-md-2 col-form-label">nom de l\'avion</label>
        <div class="col-md-3">
            <input class="form-control" type="text" name="nom" value="" placeholder="nom de l\'avion" id="nom" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="poids_avion" class="col-md-offset-2 col-md-2 col-form-label">poids de l\'avion (tonnes)</label>
        <div class="col-md-2">
            <input class="form-control" type="number" name="poids" step="0.01" value="0.1" min="0.01" max="10"
                   id="poids_avion" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="superficie_avion" class="col-md-offset-2 col-md-2 col-form-label">superficie de l\'avion (m²)</label>
        <div class="col-md-2">
            <input class="form-control" type="number" name="superficie" step="0.1" value="10" min="10" max="200"
                   id="superficie_avion" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="types_avions" class="col-md-offset-2 col-md-2 col-form-label">type</label>
        <div class="col-md-2">
            <select class="form-control" id="types_avions" name="type">
                <option value="mono-turbine">mono-turbine</option>
                <option value="reacteur">réacteur</option>
                <option value="helicoptere">hélicoptère</option>
                <option value="ULM">ULM</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-3 col-md-offset-4">
            <button type="button" class="btn btn-secondary btn-lg " onclick="display_user_plane()">Annuler</button>
            <button type="button" class="btn btn-primary btn-lg " onclick="add_plane()">valider</button>
        </div>
    </div>
</form>';

}
?>




