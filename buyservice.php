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
    </head>
<?php 
require 'header.php';
    welcome();
    showmoney();
?>
<br>
<button type="button" onclick="t1()">Stationnement</button>
<div id="options_stationnement"></div>
<button type="button" onclick="t2()">Atterrissage</button>
<div id="options_atterissage"></div>
<button type="button" onclick="t3()">Avitaillement</button>
<div id="options_avitaillement"></div>
<button type="button" onclick="t4()">Nettoyage</button>
<div id="options_nettoyage"></div>
	</body>
</html>