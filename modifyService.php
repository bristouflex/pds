<?php
require "init.php";


if (isset($_SESSION['email'])) {
	
unset($_SESSION["error_subscribe"]);

welcomeadmin();
	
}else{
	unset($_SESSION["email"]);
	header("Location: loginadmin.php");
}

?>
<script src="js/ajax.js"></script>
<br><br><a href="onlineadmin.php">Retour</a>
<br><br>
<button type="button" onclick="tb_abris()">Abris</button>
<div id="options_b_abris"></div>
<button type="button" onclick="tb_avion()">Avion</button>
<div id="options_b_avion"></div>
<button type="button" onclick="tb_categorie()">Categorie</button>
<div id="options_b_categorie"></div>
<button type="button" onclick="tb_grpacoustique()">Groupe Acoustique</button>
<div id="options_b_grpacoustique"></div>
<button type="button" onclick="tb_produit()">Produit</button>
<div id="options_b_produit"></div>
<button type="button" onclick="tb_redevances()">Redevances</button>
<div id="options_b_redevances"></div>
