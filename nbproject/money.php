<?php
require "init.php";
	
if (!isConnected()) {
	unset($_SESSION["email"]);
	unset($_SESSION["isMember"]);
	header("Location: login.php");
}

?>

<?php 
  
if(isset($_SESSION['error_subscribe']) ){
	$_POST = $_SESSION;
	echo "<ul>";
	foreach ($_SESSION['error_subscribe'] as $error) {
		echo "<li>".$list_of_errors[$error];
	}
	echo "</ul>";
}?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>AEN - Ajouter du crédit</title>
		<meta name="Description" lang="en" content="Bienvenue sur le site de l'AEN">
                <?php 
                    require 'header.php';
                    welcome();  
                    showmoney();
                ?>
		<br><br>
		<form method="POST" action="moneyupdate.php">
		<input type="number" name="montant" step="5" value="0" min="0" max="1000" required> €<br><br>
		<input type="password" name="password1" placeholder="Mot de passe" required><br><br>
 		<input type="password" name="password2" placeholder="Confirmation" required><br><br>
		<input type="submit" value="Valider"><br>
	</body>
</html>