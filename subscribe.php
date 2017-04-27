<?php 

require "init.php";
require 'recaptchalib.php';
require 'uploadFile.php';

if(isset($_POST["nom"]) &&
   isset($_POST["prenom"]) &&
   isset($_POST["email"]) &&
   isset($_POST["password1"]) &&
   isset($_POST["password2"]) &&
   isset($_POST["adresse"]) &&
   isset($_POST["phone"])){

    $_POST["nom"] = strtolower(trim($_POST["nom"]));
    $_POST["prenom"] = strtolower(trim($_POST["prenom"]));
    $_POST["email"] = strtolower(trim($_POST["email"]));
    $_POST["phone"] = trim($_POST["phone"]);

    unset($_SESSION["error_subscribe"]);

//Vérifier si le nom est >2 et ne contient que des lettres A-Z ou a-z (on autorise le - aussi)
//Vérifier si le prenom est >2 et ne contient que des lettres A-Z ou a-z (on autorise le - aussi)
//Vérifier si le mail existe déjà pour le type de compte
// Vérifier si le mail est conforme
// Vérifier si le mot de passe est assez long
// Vérifier si les mots de passe sont valides ==
// Vérifier si le captcha est bien fait
// Vérifier si les CGU sont coché
// Vérifier si l'addresse > 4 char
// Vérifier si le téléphone est correct regex
// Vérifier si le chemin de la carte d'identité est upload

    validatorEmail($_POST["email"]); // email correct et non existant | ERR 1 & 2
    validatorPrenom($_POST["prenom"]); // prenom correct ERR 3
    validatorNom($_POST["nom"]); // nom correct ERR 4
    validatorPwd($_POST["password1"], $_POST["password2"]); // pass < 4 > 80 | ERR 5 & 6
   validatorCaptcha($_POST["g-recaptcha-response"]);
   
   //Verification pour l'upload du fIichier
  
  

    if(!isset($_POST["cgu"])){
        $_SESSION["error_subscribe"][]=8; // CGU UNCHECKED |ERR 8
        $error = true;
    }

      validatorAdresse($_POST["adresse"]); // adr < 4 |ERR 9

     validatorPhone($_POST["phone"]); // err 10

      //validatorUpload($????); VERIF UPLOAD |ERR11
    
    if(isset($_SESSION["error_subscribe"])){
        $_SESSION = array_merge($_SESSION, $_POST);
        header("Location: register.php");
    }else{
        // Crédit 0 et statut tel que défini en bdd  0 et 1 de base

    if($_POST["isMember"]=="Client"){
        $isMember=0;
    }
    if($_POST["isMember"]=="Membre"){
        $isMember=1;
    }


        $test1 = "blablabla";
        $test2=0;
        $test3=1;

        $bdd=connectBdd();   
        $query = $bdd->prepare(" INSERT INTO inscrit (nom,prenom,email,password,birth,genre,adresse,phone,identity,credit,statut,isMember) VALUES (:nom, :prenom, :email, :password, :birth, :genre, :adresse, :phone,:identity, :credit, :statut, :isMember)");

        $_POST["password1"] = password_hash($_POST["password1"], PASSWORD_DEFAULT);
        $query->execute( [
    	   "nom" => $_POST["nom"],
           "prenom" => $_POST["prenom"],
    	   "email" => $_POST["email"],
    	   "password" => $_POST["password1"],
           "birth" => $_POST["birth"],
           "genre" => $_POST["genre"],
           "adresse" => $_POST["adresse"],
           "phone" => $_POST["phone"],
           "identity" => "upload/".$_FILES['avatar']['name'],
           "credit" => $test2,
           "statut" => $test3,
           "isMember" => $isMember
            ]);


        header("Location: index.html");
    }
}