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
<script language="JavaScript" type="text/javascript" src="js/ajax.js"></script>
<br><br><a href="onlineadmin.php">Retour</a>
<br><br>
<button type="button" onclick="t_all()">Voir toutes les factures</button>
<div id="options_bill"></div>
<button type="button" onclick="t_paid()">Voir les factures payées</button>
<div id="options_paid_bill"></div>
<button type="button" onclick="t_notpaid()">Voir les factures non payées</button>
<div id="options_unpaid_bill"></div>