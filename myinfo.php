<?php
    require "init.php";
    if(!isConnected()){
        header("location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>AEN - Modifier</title>
        <meta name="Description" lang="en" content="AEN modifier">

    <?php
    require 'header.php';
    welcome();
    showmoney();
    echo '<h1>Mes informations personelles</h1>';
echo "<br>";
echo "Veuillez remplir tous les champs !<br>";

    $bdd = connectBdd();

if (isset($_POST['adresse']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['phone'])){

	validatorPwd($_POST['password1'],$_POST['password2']);
    validatorAdresse($_POST['adresse']);
    validatorPhone($_POST['phone']);

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
		$query = $bdd->prepare('UPDATE inscrit SET password = :password, adresse =:adresse, phone=:phone WHERE id = :id');
		$query->execute([  "password" => $_POST['password1'], "adresse" => $_POST['adresse'], "phone" => $_POST['phone'], "id" => $_SESSION["user"]->getId()  ]);
		header('Location: online.php');
	}
}

if (isset($_SESSION["user"])) {
	$infos = data("inscrit", $_SESSION["user"]->getId()); // fct//
	if (!empty($infos) && empty($_POST)) $_POST = $infos;
	else if (empty($infos)) header('Location: online.php');

	echo '<form method="post" actions="myinfo.php">';
	echo '<p><input type="password" name="password1" placeholder="Mot de passe :"></p>';
	echo '<p><input type="password" name="password2" placeholder="Confirmation :"></p>';
    echo '<p>Adresse : <input type="text" name="adresse" placeholder="adresse" value="'. $infos['adresse'] .'"></p>';
    echo '<p>Telephone : <input type="text" name="phone" placeholder="telephone" value="'. $infos['phone'] .'"></p>';
	echo '<input type="submit" value="Modifier">';
	echo '</form>';

} else {header('Location: login.php');}
?>

 </body>
</html>
