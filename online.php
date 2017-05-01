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
    header("Location: login.php");
}

require_once 'view/header.php';
require_once 'view/menu.php';

?>

<!-- CONTENU DE LA PAGE -->
    <div class="col-md-9">
        <h3 class="m_1">Nos Services</h3>


        <?php
        if ( $_SESSION["user"]->getIsMember() == 0 ) {
            echo '<div class="content_grid">
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="reservationAtterrissage.php">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/atterrissage.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">atterissage</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="reservationAvitaillement.php">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/avitaillement.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">avitaillement</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>                        
                    </div>
                </a>
            </div>
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem last_1">
                <a href="reservationNettoyage.php">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/nettoyage.png" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">nettoyage</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="clearfix"></div>
            </div>';
            echo '<div class="content_grid">
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="reservationStationnement.php">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/stationnement.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">stationnement</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="clearfix"></div>
        </div>';
        }
        if ( $_SESSION["user"]->getIsMember() != 0 ) {
                echo '<div class="content_grid">
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="reservationLecon.php">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/cours.png" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">cours</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="reservationBapteme.php">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/bapteme.png" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">bapteme de l\'air</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>                       
                    </div>
                </a>
            </div>
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem last_1">
                <a href="reservationParachute.php">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/parachute.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">parachute</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="clearfix"></div>
            </div>';
                echo '<div class="content_grid">
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="reservationLocationUlm.php">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/location.png" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">location</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="clearfix"></div>
        </div>';
        }
        ?>


    </div>

<?php
require_once 'view/footer.php';