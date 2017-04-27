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
        <div class="content_grid">
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="single.html">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/pic1.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">Lorem Ipsum 2015</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="single.html">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/pic2.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">Lorem Ipsum 2015</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="sale-box1"><span class="on_sale1 title_shop">New</span></div>
                    </div>
                </a>
            </div>
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem last_1">
                <a href="single.html">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/pic3.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">Lorem Ipsum 2015</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="content_grid">
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="single.html">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/pic4.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">Lorem Ipsum 2015</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem">
                <a href="single.html">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/pic5.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">Lorem Ipsum 2015</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col_1_of_3 span_1_of_3 simpleCart_shelfItem last_1">
                <a href="single.html">
                    <div class="inner_content clearfix">
                        <div class="product_image">
                            <img src="images/pic6.jpg" class="img-responsive" alt=""/>
                            <a href="" class="button item_add item_1"> </a>
                            <div class="product_container">
                                <div class="cart-left">
                                    <p class="title">Lorem Ipsum 2015</p>
                                </div>
                                <span class="amount item_price">$45.00</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>

<?php
require_once 'view/footer.php';