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

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>AEN - OnlineAdmin</title>
		<meta name="Description" lang="en" content="Bienvenue sur le site QuizAndCo">
	</head>
	<body><br>
		<br><a href="contactuser.php">Contacter Utilisateur</a>
		<br><a href="myinfoadmin.php">Modifier mes informations</a>
		<br><a href="king.php">Modifier un utilisateur</a>
		<br><a href="checkFactures.php">Voir les factures</a>
		<br><a href="modifyService.php">Modifier un service</a>
		<br><a href="modifyActivity.php">Modifier une activite</a>
        <br><a href="modifyLessons.php">voir leçons</a>
		<br><a href="logout.php">Deconnexion</a>
	</body>
</html>
