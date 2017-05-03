<?php
require "init.php";


if(!backisConnected()){
    session_destroy();
    header("location: ../index.php");
}
welcomeadmin();

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