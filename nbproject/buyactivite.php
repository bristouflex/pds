<!DOCTYPE html>
<?php
    require "init.php";
    if(!isConnected()){
        header("location: login.php");
    }
    
?>
<html> 
	<head>
		<meta charset="utf-8">
		<title>AEN</title>
		<meta name="Description" content="Bienvenue sur le site de l'AEN">		
<?php 
require 'header.php';
    welcome();
    showmoney(); // Verif si y'a une cotisation dans la bdd sinon rien afficher
?>
<br>
<button type="button" onclick="t6()">Saut en parachute</button>
<div id="options_parachute"></div>
<button type="button" onclick="t7()">Baptême de l'air</button>
<div id="options_bapteme"></div>
<button type="button" onclick="t8()">Location d'ULM</button>
<div id="options_location_ulm"></div>
<button type="button" onclick="t9()">Brevet de pilote</button>
<div id="options_lecon"></div>
	</body>
</html>