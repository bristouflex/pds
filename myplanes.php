<?php

require "init.php";

if (isConnected()) {
    unset($_SESSION["error_subscribe"]);
} else {
    logout();
}

require_once 'view/header.php';
require_once 'view/menu.php';


?>

    <!-- CONTENU DE LA PAGE -->
    <div class="col-md-9">
        <div class="dreamcrub">
            <ul class="breadcrumbs">
                <li class="home">
                    <a href="online.php" title="accueil">Home</a>&nbsp;
                </li>
            </ul>
            <ul class="previous">
                <li><button class="btn btn-primary" onclick="form_add_plane()">Ajouter un avion</button> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div id="print_planes">
            <?php
            $bdd = connectBdd();
            echo "<h3 class=\"m_1\" align=\"center\">Liste de vos avions</h3>";

            $query = $bdd->prepare("SELECT * FROM detention_avion WHERE inscrit = :id AND supprime = 0");
            $query->execute([
                "id" => $_SESSION["user"]->getId()
            ]);
            echo "<table class='table-responsive table table-bordered'>";
            echo "<tr><th>noma</th><th>type</th><th>superficie</th><th>poids</th><th>supprimer</th></tr>";
            while($liste = $query->fetch()){
                echo '<tr>';
                echo '<td>'.$liste["nom"].'</td>
                <td>'.$liste["type_avion"].'</td>
                <td>'.$liste["superficie"].'</td>
                <td>'.$liste["poids"].'</td>
                <td><button class="btn" onclick="delete_user_plane('.$liste["id"].')">supprimer</button></td>';
                echo '</tr>';
            }
            echo '</table>';
            ?>
        </div>
    </div>


<?php
require_once 'view/footer.php';