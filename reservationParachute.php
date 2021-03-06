<?php
/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 01/05/2017
 * Time: 20:21
 */
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

?>
    <div class="col-md-9">
        <div class="dreamcrub">
            <ul class="breadcrumbs">
                <li class="home">
                    <a href="online.php" title="accueil">Home</a>&nbsp;
                    <span>&gt;</span>
                </li>
            </ul>
            <ul class="previous">
                <li><a href="online.php">accueil</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="singel_right">
            <div class="labout span_1_of_a1">
                <div class="flexslider">
                    <img class="img-responsive" src="images/parachute.jpg" />
                </div>
            </div>
            <div class="cont1 span_2_of_a1 simpleCart_shelfItem">
                <h1>Parachute</h1>

                <h2 class="quick">Description</h2>
                <p> Découvrez les joies du saut en parachute!</p><br><br><br>
                <div class="btn_form button item_add item_1">
                    <form>
                        <?php
                        if(checkCotisation() || $_SESSION["user"]->getIsMember() == 0) {
                            echo "<p align='center'><button type=\"button\" class=\"btn btn-secondary btn-lg btn-block\" onclick=\"t6()\">réserver mon saut en parachute </button></p> ";
                        }else{
                            echo "Vous devez d'abord payer une Cotisation ainsi qu'une license et une assurance avant d'acceder à cet espace membre<br><br>";
                            echo '<p align=\'center\'><button type="button" onclick="t10()">Cotisation et licenses</button></p> ';
                            echo '<div id="options_cotisation"></div>';
                        }
                        ?>
                    </form>
                </div>
                <div id="options_parachute"></div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
    </div>
    </div>
    </div>


    </div>
<?php
require_once 'view/footer.php';
