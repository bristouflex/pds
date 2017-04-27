<?php 
require "init.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>AEN login</title>
		<meta name="Description" lang="en" content="Page de connexion">
	</head>
	<body>
		<h1>AEN - Connexion</h1>
		<a href="register.php">Inscription</a><br><br>
		<b>Veuillez entrer vos identifiants.</b><br>
		
		<?php			
		if(isset($_POST['email']) && isset($_POST['pwd']) ){
			login($_POST['email'], $_POST['pwd'],$_POST['isMember']);
		} 
		?>

		<form method="POST">
			<input type="email" name="email" placeholder="E-mail">
			<input type="password" name="pwd" placeholder="Mot de passe">
			Type de compte : <select name="isMember">
		<?php 
		foreach ($list_of_accounts as $account) {
			echo "<option ".((isset($_POST["isMember"]) && $account == $_POST["isMember"])?"selected='selected'":"").">".$account."</option>";
		}
		?>
		</select><br><br>
			<input type="submit" value="Se connecter">
		</form>
	</body>
</html>