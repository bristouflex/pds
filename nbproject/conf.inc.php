<?php
	
	$list_of_errors = [
						1 => "Email invalide", // email non conforme (accents, caractères spéciaux)
						2 => "Email deja utilise pour ce type de compte", // email déjà présent pour le compte client ou membre
						3 => "Prenom invalide", // prenom non conforme (chiffres..) < 2
						4 => "Nom invalide", // nom non conforme (chiffres...) < 2
						5 => "Mot de passe invalide (4 caractères minimum)", // pass < 4 char
						6 => "Les mots de passe ne correspondent pas", // mdp 1 =/= mdp 2
						7 => "Le captcha est incorrect", // captcha google
						8 => "CGU non validés", // cgu non cochés
						9 => "Adresse invalide", // caractères spéciaux < 4
						10 => "Téléphone invalide", // non conforme
						11 => "Vous devez uploader un fichier de type png, bmp, jpg, jpeg",
						12 =>"Mot de passe errone",
						13 => "Echec de l\'upload !",
						14 => "Le fichier est trop gros..."
						
						];

	$list_of_genre = [1=> "Homme", 2=> "Femme"];
	$list_of_accounts = [1=> "Client", 2=> "Membre"];


 	define("USERBDD", "root");
 	define("MDPBDD", "");
 	define("HOSTBDD", "localhost");
 	define("NAMEBDD", "pds");

?>