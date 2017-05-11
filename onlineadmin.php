<?php
require "init.php";

if (isset($_SESSION['email'])) {
	
unset($_SESSION["error_subscribe"]);
	
}else{
	unset($_SESSION["email"]);
	header("Location: loginadmin.php");
}
require_once 'view-back/header.php';
require_once 'view-back/menu.php';
?>
    <script src="js/ajax.js"></script>
<div id="content">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Back-office AEN</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h1 align="center" class="box-title">Bienvenu sur notre Back-office</h1>
                        <div class="row">
                            <h2 align="center">Bienvenue sur le back-office d'AEN!</h2>
                            <p align="center"> Vous pouvez gérer les prix ainsi que les demandes des clients via les outils mis à votre disposition!</p>
                        </div>
                        <div class="row">
                            <div id="options_b"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php
    require_once "view-back/footer.php";