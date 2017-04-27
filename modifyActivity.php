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
<button type="button" onclick="tb_Bapteme()">Bapteme</button>
<div id="options_b_Bapteme"></div>
<button type="button" onclick="tb_Cotisation()">Cotisation</button>
<div id="options_b_Cotisation"></div>
<button type="button" onclick="tb_Lecon()">Lecon</button>
<div id="options_b_Lecon"></div>
<button type="button" onclick="tb_LocationULM()">LocationULM</button>
<div id="options_b_LocationULM"></div>
<button type="button" onclick="tb_Parachute()">Parachute</button>
<div id="options_b_Parachute"></div>