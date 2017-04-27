 <?php 

require "init.php";

if (isset($_SESSION['email']) && isset($_SESSION['isMember'])) {
	
	if($_SESSION['isMember']=="Client"){
		$isMember=0;
	}
	if($_SESSION['isMember']=="Membre"){
	$isMember=1;
	}

 	if(isset($_POST["montant"]) &&
  		isset($_POST["password1"]) &&
 		isset($_POST["password2"])){
  
   		unset($_SESSION["error_subscribe"]);
	

	validatorPwd($_POST["password1"], $_POST["password2"]); // pass < 4 > 80 | ERR 5 & 6

	$bdd=connectBdd();
	$query=$bdd->prepare("SELECT id,password,credit FROM inscrit WHERE email=:email AND isMember = :isMember");
	$query->execute(["email" => $_SESSION["email"],"isMember" => $_SESSION["isMember"]]);
	$resultat=$query->fetch();

	$hash = $resultat["password"];
	$credit=$resultat["credit"];

	//Vérifier que le mot de passe chiffré correspond à $pwd grace a la fonction password_verify()
	if(!password_verify($_POST["password1"], $hash)){
		$_SESSION["error_subscribe"][]=12;
		$error=true;
	}


	if(isset($_SESSION["error_subscribe"])){
    	$_SESSION = array_merge($_SESSION, $_POST);
    	header("Location: money.php");
    }else{

		$bdd=connectBdd();

		$query=$bdd->prepare("UPDATE inscrit SET credit=:credit WHERE email=:email AND isMember=:isMember");
		$query->execute(["credit"=>$_POST['montant']+$credit,"email"=>$_SESSION["email"],"isMember"=>$_SESSION["isMember"]]);
        header("Location: online.php");

       
        $query = $bdd->prepare(" INSERT INTO historiquetransaction (idUser,adresseIP,date,montant,link) VALUES (:idUser, :adresseIP, :date, :montant, :link)");
        $query->execute( [
    	   "idUser" => $resultat["id"],
           "adresseIP" => $_SERVER["REMOTE_ADDR"],
    	   "date" => date("Y-m-d H-i-s"),
    	   "montant" => $_POST["montant"],
    	   "link" => ""
            ]);
	}

}else{
	unset($_POST["montant"]);
	unset($_POST["password1"]);
	unset($_POST["password2"]);
	header("Location: money.php");
}


}else{
		unset($_SESSION["email"]);
		unset($_SESSION["isMember"]);
		header("Location: login.php");
}
