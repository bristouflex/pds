 <?php

require "init.php";

if (isset($_SESSION["user"])){

	if($_SESSION["user"]->getIsMember()=="Client"){
		$isMember=0;
	}
	if($_SESSION["user"]->getIsMember()=="Membre"){
	$isMember=1;
	}

 	if(isset($_POST["montant"]) &&
  		isset($_POST["password1"]) &&
 		isset($_POST["password2"])){

   		unset($_SESSION["error_subscribe"]);


	validatorPwd($_POST["password1"], $_POST["password2"]); // pass < 4 > 80 | ERR 5 & 6

	$bdd=connectBdd();
	$query=$bdd->prepare("SELECT id,password FROM inscrit WHERE email=:email AND isMember = :isMember");
	$query->execute(["email" => $_SESSION["user"]->getEmail(),"isMember" => $_SESSION["user"]->getIsMember()]);
	$resultat=$query->fetch();

	$hash = $resultat["password"];

	//Vérifier que le mot de passe chiffré correspond à $pwd grace a la fonction password_verify()
	if(!password_verify($_POST["password1"], $hash)){
		$_SESSION["error_subscribe"][]=12;
		$error=true;
	}


	if(isset($_SESSION["error_subscribe"])){
    	$_SESSION = array_merge($_SESSION, $_POST);
    	header("Location: money.php");
    }else{
        $_SESSION["user"]->addCredit($_POST['montant']);
		$bdd=connectBdd();

		$query=$bdd->prepare("UPDATE inscrit SET credit=:credit WHERE email=:email AND isMember=:isMember");
		$query->execute([
                         "credit"=>$_SESSION["user"]->getCredit(),
                         "email"=>$_SESSION["user"]->getEmail(),
                         "isMember"=>$_SESSION["user"]->getIsMember()
                        ]);
        header("Location: online.php");


        $query = $bdd->prepare(" INSERT INTO historiquetransaction (idUser,adresseIP,date,montant) VALUES (:idUser, :adresseIP, :date, :montant)");
        $query->execute( [
    	   "idUser" => $resultat["id"],
           "adresseIP" => $_SERVER["REMOTE_ADDR"],
    	   "date" => date("Y-m-d"),
    	   "montant" => $_POST["montant"]
            ]);
	}

}else{
	unset($_POST["montant"]);
	unset($_POST["password1"]);
	unset($_POST["password2"]);
	header("Location: money.php");
}


}else{
		unset($_SESSION["user"]);
		header("Location: login.php");
}
