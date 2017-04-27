<?php 
require "init.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>AEN - AdminLogin</title>
		<meta name="Description" lang="en" content="Bienvenue sur le site QuizAndCo">
	</head>
	<body>
		<h1>Connexion</h1><br>
		<b>Veuillez entrer vos identifiants de boss.</b><br>
		
		<?php			
		if(isset($_POST['email']) && isset($_POST['pwd']) ){
			loginadmin($_POST['email'], $_POST['pwd']);
		}
		?>

		<form method="POST">
			<input type="email" name="email" placeholder="E-mail">
			<input type="password" name="pwd" placeholder="Mot de passe">
			<input type="submit" value="Se connecter">
		</form>
	</body>
</html>