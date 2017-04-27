<?php require "init.php"; ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>AEN - Modifier</title>
        <meta name="Description" lang="en" content="AEN modifier">
    </head>
    <body>
     <h1>Mes informations personelles Admin</h1>
<a href="onlineadmin.php">Retour au menu</a><br>

    <?php
echo "<br>";
echo "Veuillez remplir tous les champs !<br>";

$bdd = connectBdd();
$query = $bdd->prepare("SELECT id FROM administrateur WHERE email = :email");
  $query->execute( [ "email" => $_SESSION['email']] );
  $verif = $query->fetch();
  $_SESSION['id']=$verif[0];

if (isset($_POST['password1']) && isset($_POST['password2'])){
	
	validatorPwd($_POST['password1'],$_POST['password2']);
    
	if (!empty($_POST["password1"])){
		validatorPwd($_POST['password1'],$_POST['password2']);
		$_POST["password1"] = password_hash($_POST["password1"], PASSWORD_DEFAULT);
	}
	
	
	if (isset($_SESSION['error_subscribe'])) {
		$_POST = $_SESSION;
		echo '<ul>';
		foreach($_SESSION['error_subscribe'] as $error) echo '<li>' .$list_of_errors[$error];
		echo '</ul>';
		unset($_SESSION['error_subscribe']);
	} else {

		$bdd = connectBdd();
		$query = $bdd->prepare('UPDATE administrateur SET password = :password WHERE id = :id');
		$query->execute([  "password" => $_POST['password1'], "id" => $_SESSION['id']]);
		header('Location: onlineadmin.php');
	}
}

if(isset($_SESSION['email'])) {
	$infos = data("administrateur", $_SESSION['id']); // fct//
	if (!empty($infos) && empty($_POST)) $_POST = $infos;
	else if (empty($infos)) header('Location: onlineadmin.php');

	echo '<form method="post" actions="myinfoadmin.php">';
	echo '<p><input type="password" name="password1" placeholder="Mot de passe :"></p>';
	echo '<p><input type="password" name="password2" placeholder="Confirmation :"></p>';
	echo '<input type="submit" value="Modifier">';
	echo '</form>';	

} else {header('Location: loginadmin.php');}
?>
         
 </body>
</html>