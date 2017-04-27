<?php

function connectBdd(){
	try{
		$bdd = new PDO('mysql:dbname='.NAMEBDD.';host='.HOSTBDD, USERBDD, MDPBDD);
	}catch(Exception $e){
		die("Erreur ". $e->getMessage());
	}
	return $bdd;
}

function validatorEmail($email){
    //Vérifier que l'email est valide,
    //chercher une fonction native à PHP
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION["error_subscribe"][]=1;
        return false;
    }
    if( emailExist($_POST["email"],$_POST["isMember"])){
        $_SESSION["error_subscribe"][]=2;
        return false;
    }
    return true;
}


function emailExist($email){

	$bdd = connectBdd();

	if($_POST["isMember"]=="Client"){
		$isMember=0;
	}
	if($_POST["isMember"]=="Membre"){
		$isMember=1;
	}

	//Donne moi toutes les informations concernant l'utilisateur $email
	$query = $bdd->prepare("SELECT * FROM inscrit WHERE email = :email AND isMember = :isMember");
	$query->execute( ["email" =>  $email, "isMember" => $isMember] );
	$resultat = $query->fetch();

	//Si tu n'as aucune information retourne faux
	if(empty($resultat) ){
		return false;
	}
	//Sinon tu retournes vrai
	else{
		return true;
	}
}


function validatorPrenom($name){
    //Vérifier que le prenom fait plus de 1 caractère
    if(strlen($name) < 2 ){
        $_SESSION["error_subscribe"][]=3;
        return false;
    }
    return true;
}

function validatorNom($name){
    //Vérifier que le nom fait plus de 1 caractère
    if(strlen($name) < 2 ){
        $_SESSION["error_subscribe"][]=4;
        return false;
    }
    return true;
}

function validatorPwd($pwd1, $pwd2){
    //Vérifier que le mot de passe fait entre 8 et 200 caractères
    if(strlen($pwd1)<4 || strlen($pwd1)>200){
        $_SESSION["error_subscribe"][]=5;
        return false;
    }
    //Vérifier que la confirmation correspond au mot de passe
    if($pwd1 != $pwd2){
        $_SESSION["error_subscribe"][]=6;
        return false;
    }  
    return true;
}

function validatorAdresse($adresse){
    //Vérifier que le nom fait plus de 1 caractère
    if(strlen($adresse) < 4 ){
        $_SESSION["error_subscribe"][]=9;
        return false;
    }
    return true;
}

function validatorPhone($phone){
	
if (isset($phone))
{
    $phone = htmlspecialchars($phone); // On rend inoffensives les balises HTML que le visiteur a pu entrer

    if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $phone))
    {
        return true;
    }
    else
    {
       $_SESSION["error_subscribe"][]=10;
       return false;
    }
}

}

function validatorUpload($upload){
	//regex
}

function login($email, $pwd, $isMember){

	//connexion a la base de données
	$bdd = connectBdd();

	//Recupérer le mot de passe hashé de l'utilisateur ayant l'email $email

	if($isMember=="Client"){
		$isMember=0;
	}else{
		$isMember=1;
	}


	$query=$bdd->prepare("SELECT password, id FROM inscrit WHERE email=:email AND isMember = :isMember");
	$query->execute(["email" => $email,"isMember" => $isMember]);
	$resultat=$query->fetch();

	$hash = $resultat["password"];


	//Vérifier que le mot de passe chiffré correspond à $pwd grace a la fonction password_verify()
	if(password_verify($pwd, $hash) ){
		$_SESSION["email"]=$email;
		$_SESSION["isMember"]=$isMember;
                $_SESSION["id"] = $resultat["id"];               
		header("Location: online.php");
	}


	else{
		if($isMember==0){
		$isMember="Client";
	}if($isMember==1){
		$isMember="Membre";
	}
		echo "<center><b>Identifiants Invalide</b></center>";
		$monfichier = fopen( "log.txt" , 'a+');
		fwrite($monfichier, $email." -> ".$pwd." -> ".$isMember."\r\n" );
		fclose($monfichier);
	}
}

function logout(){
	unset($_SESSION['email']);
	unset($_SESSION['isMember']);
	unset($_SESSION['id']);
        header("Location: index.html");
}


function data($table, $id) {
	$bdd = connectBdd();
	$query = $bdd->prepare("SELECT * FROM ". $table ." WHERE id = :id");
	$query->execute(["id" => $id]);
	$resultat = $query->fetch();
	return $resultat;
}


function validatorCaptcha($captcha){
	$secret = '6LcFdBQUAAAAAHnYigmWw4ALqQ8lard80vlmuQMA'; // votre clé privée
	$reCaptcha = new ReCaptcha($secret);
	if(isset($_POST["g-recaptcha-response"])) {
    	$resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
        );
    	if ($resp != null && $resp->success){
    		return true;
    	}
    	else{
    		$_SESSION["error_subscribe"][]=7;
    		return false;
    	}
    }
}

function loginadmin($email, $pwd){


	$bdd = connectBdd();

	$query=$bdd->prepare("SELECT password FROM administrateur WHERE email=:email");
	$query->execute(["email" => $email]);
	$resultat=$query->fetch();

	$hash = $resultat["password"];

	if(password_verify($pwd, $hash) ){
		$_SESSION["email"]=$email;
		header("Location: onlineadmin.php");
	}

	else{
		echo "<center><b>Identifiants Invalide</b></center>";
		$monfichier = fopen( "log.txt" , 'a+');
		fwrite($monfichier, $email." -> ".$pwd." -> Administrateur"."\r\n" );
		fclose($monfichier);
	}
}


function printMeteo(){
$i=0;
echo "<br><br>";
echo "Meteo :<br><br>";
echo "<table border=1 CELLPADDING=5>";
    $date = date("Y-m-d");
    $bdd = connectBdd();
    $query = $bdd->prepare(" SELECT * FROM meteo WHERE date=:date");
    $query->execute(["date"=>$date]);
    while($data = $query->fetch()){
        if ($i==0){
            echo "<tr><td><b>Description</b></td><td><b>Temperature</b></td><td><b>Pressure</b></td><td><b>Humidity</b></td><td><b>Speed</b></td><td><b>Inclinaison</b></td><td><b>Precipitations</b></td><td><b>Date</b></td></tr>";
            $i=1;
        }
        echo "<tr>";
        echo "<td>".$data['description']."</td>";
        echo "<td>".$data['temperature']."</td>";
        echo "<td>".$data['pressure']."</td>";
        echo "<td>".$data['humidity']."</td>";
        echo "<td>".$data['vitesse']."</td>";
        echo "<td>".$data['inclinaison']."</td>";
        echo "<td>".$data['precipitations']."</td>";
        echo "<td>".$data['date']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function verifDate(){

	$date = date("Y-m-d");
	$bdd = connectBdd();
	$query = $bdd->prepare(" SELECT * FROM meteo WHERE date=:date");
	$query->execute(["date"=>$date]);
	$infos=$query->fetch();
	if(empty($infos)){
		exec("meteo.exe");	
	}
}

function welcome(){
	$isMember=intToMember();
	$bdd = connectBdd();
	$query = $bdd->prepare("SELECT prenom,nom FROM inscrit WHERE email=:email AND isMember=:isMember");
	$query->execute([ "email"=>$_SESSION['email'], "isMember"=>$_SESSION['isMember']]);
	$infos=$query->fetch();
	echo "<b>Compte : <i>".$infos[1]." ".$infos[0]."</i></b><br>";
	echo "<b>Compte de type : <i>".$isMember."</i></b>";
}

function intToMember(){
	if($_SESSION['isMember']==0){
		$isMember="Client";
	}
	if($_SESSION['isMember']==1){
		$isMember="Membre";
	}
	return $isMember;
}

function memberToInt(){
	if($_SESSION['isMember']=="Client"){
		$isMember=0;
	}
	if($_SESSION['isMember']=="Membre"){
		$isMember=1;
	}
	return $isMember;
}

function showmoney(){

$bdd = connectBdd();

	$query = $bdd->prepare(" SELECT credit FROM inscrit WHERE email=:email AND isMember=:isMember");
	$query->execute([ "email"=>$_SESSION['email'], "isMember"=>$_SESSION['isMember']]);
	$infos=$query->fetch();
	echo "<br><b>Votre credit est de : ".$infos[0]." €</b>";
}

function welcomeadmin(){
	$bdd = connectBdd();

	$query = $bdd->prepare(" SELECT prenom,nom FROM administrateur WHERE email=:email");
	$query->execute([ "email"=>$_SESSION['email']]);
	$infos=$query->fetch();
	echo "<b>Bienvenue <i>".$infos[1]." ".$infos[0]."</i></b><br>";
	echo "<b>Compte de type<i> : Administrateur</i></b>";
}


function verifDateService($date){
	if($date > time()){
		return TRUE;
	}
	else{
		return FALSE;
	}
}

function isConnected(){
   if (!isset($_SESSION['email']) || !isset($_SESSION['isMember']) || !isset($_SESSION['id']) || empty($_SESSION['email']) || empty($_SESSION['id']) || $_SESSION['isMember'] != 0 &&  $_SESSION['isMember'] != 1){
        return false;
    }
    
    $bdd = connectBdd();
    $query = $bdd->prepare(" SELECT id FROM inscrit WHERE email=:mail AND isMember=:isMember");
    $query->execute([
        "mail" => $_SESSION["email"],
        "isMember" => $_SESSION["isMember"]
    ]);
    $resultat = $query->fetch();
    
    if(empty($resultat)){
        return false;
    }
    return true;
}

?>