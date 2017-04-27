<?php

require_once 'Classes/User.php';
require_once 'Classes/Panier.php';

function connectBdd() {
    try {
        $bdd = new PDO('mysql:dbname=' . NAMEBDD . ';host=' . HOSTBDD, USERBDD, MDPBDD);
    } catch (Exception $e) {
        die("Erreur " . $e->getMessage());
    }
    return $bdd;
}

function validatorEmail($email) {
    //Vérifier que l'email est valide,
    //chercher une fonction native à PHP
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error_subscribe"][] = 1;
        return false;
    }
    if (emailExist($_POST["email"], $_POST["isMember"])) {
        $_SESSION["error_subscribe"][] = 2;
        return false;
    }
    return true;
}

function emailExist($email) {

    $bdd = connectBdd();

    if ($_POST["isMember"] == "Client") {
        $isMember = 0;
    }
    if ($_POST["isMember"] == "Membre") {
        $isMember = 1;
    }

    //Donne moi toutes les informations concernant l'utilisateur $email
    $query = $bdd->prepare("SELECT * FROM inscrit WHERE email = :email AND isMember = :isMember");
    $query->execute(["email" => $email, "isMember" => $isMember]);
    $resultat = $query->fetch();

    //Si tu n'as aucune information retourne faux
    if (empty($resultat)) {
        return false;
    }
    //Sinon tu retournes vrai
    else {
        return true;
    }
}

function validatorPrenom($name) {
    //Vérifier que le prenom fait plus de 1 caractère
    if (strlen($name) < 2) {
        $_SESSION["error_subscribe"][] = 3;
        return false;
    }
    return true;
}

function validatorNom($name) {
    //Vérifier que le nom fait plus de 1 caractère
    if (strlen($name) < 2) {
        $_SESSION["error_subscribe"][] = 4;
        return false;
    }
    return true;
}

function validatorPwd($pwd1, $pwd2) {
    //Vérifier que le mot de passe fait entre 8 et 200 caractères
    if (strlen($pwd1) < 4 || strlen($pwd1) > 200) {
        $_SESSION["error_subscribe"][] = 5;
        return false;
    }
    //Vérifier que la confirmation correspond au mot de passe
    if ($pwd1 != $pwd2) {
        $_SESSION["error_subscribe"][] = 6;
        return false;
    }
    return true;
}

function validatorAdresse($adresse) {
    //Vérifier que le nom fait plus de 1 caractère
    if (strlen($adresse) < 4) {
        $_SESSION["error_subscribe"][] = 9;
        return false;
    }
    return true;
}

function validatorPhone($phone) {

    if (isset($phone)) {
        $phone = htmlspecialchars($phone); // On rend inoffensives les balises HTML que le visiteur a pu entrer

        if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $phone)) {
            return true;
        } else {
            $_SESSION["error_subscribe"][] = 10;
            return false;
        }
    }
}

function validatorUpload($upload) {
    //regex
}

function login($email, $pwd, $isMember) {

    //connexion a la base de données
    $bdd = connectBdd();

    //Recupérer le mot de passe hashé de l'utilisateur ayant l'email $email

    if ($isMember == "Client") {
        $isMember = 0;
    } else {
        $isMember = 1;
    }


    $query = $bdd->prepare("SELECT password, id, credit FROM inscrit WHERE email=:email AND isMember = :isMember");
    $query->execute(["email" => $email, "isMember" => $isMember]);
    $resultat = $query->fetch();

    $hash = $resultat["password"];


    //Vérifier que le mot de passe chiffré correspond à $pwd grace a la fonction password_verify()
    if (password_verify($pwd, $hash)) {
        $_SESSION["user"] = new User($resultat["id"], $email, $resultat["credit"], $isMember);
        $_SESSION["panier"] = new Panier();
        header("Location: online.php");
    } else {
        if ($isMember == 0) {
            $isMember = "Client";
        }if ($isMember == 1) {
            $isMember = "Membre";
        }
        echo "<center><b>Identifiants Invalide</b></center>";
        $monfichier = fopen("log.txt", 'a+');
        fwrite($monfichier, $email . " -> " . $pwd . " -> " . $isMember . "\r\n");
        fclose($monfichier);
    }
}

function logout() {
	session_destroy();
    header("Location: index.php");
}

function data($table, $id) {
    $bdd = connectBdd();
    $query = $bdd->prepare("SELECT * FROM " . $table . " WHERE id = :id");
    $query->execute(["id" => $id]);
    $resultat = $query->fetch();
    return $resultat;
}

function validatorCaptcha($captcha) {
    $secret = '6LcFdBQUAAAAAHnYigmWw4ALqQ8lard80vlmuQMA'; // votre clé privée
    $reCaptcha = new ReCaptcha($secret);
    if (isset($_POST["g-recaptcha-response"])) {
        $resp = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]
        );
        if ($resp != null && $resp->success) {
            return true;
        } else {
            $_SESSION["error_subscribe"][] = 7;
            return false;
        }
    }
}

function loginadmin($email, $pwd) {


    $bdd = connectBdd();

    $query = $bdd->prepare("SELECT password FROM administrateur WHERE email=:email");
    $query->execute(["email" => $email]);
    $resultat = $query->fetch();

    $hash = $resultat["password"];

    if (password_verify($pwd, $hash)) {
        $_SESSION["email"] = $email;
        header("Location: onlineadmin.php");
    } else {
        echo "<center><b>Identifiants Invalide</b></center>";
        $monfichier = fopen("log.txt", 'a+');
        fwrite($monfichier, $email . " -> " . $pwd . " -> Administrateur" . "\r\n");
        fclose($monfichier);
    }
}

function printMeteo() {
    $i = 0;
    echo "<br><br>";
    echo "Meteo :<br><br>";
    echo "<table border=1 CELLPADDING=5>";
    $date = date("Y-m-d");
    $bdd = connectBdd();
    $query = $bdd->prepare(" SELECT * FROM meteo WHERE date=:date");
    $query->execute(["date" => $date]);
    while ($data = $query->fetch()) {
        if ($i == 0) {
            echo "<tr><td><b>Description</b></td><td><b>Temperature</b></td><td><b>Pressure</b></td><td><b>Humidity</b></td><td><b>Speed</b></td><td><b>Inclinaison</b></td><td><b>Precipitations</b></td><td><b>Date</b></td></tr>";
            $i = 1;
        }
        echo "<tr>";
        echo "<td>" . $data['description'] . "</td>";
        echo "<td>" . $data['temperature'] . "</td>";
        echo "<td>" . $data['pressure'] . "</td>";
        echo "<td>" . $data['humidity'] . "</td>";
        echo "<td>" . $data['vitesse'] . "</td>";
        echo "<td>" . $data['inclinaison'] . "</td>";
        echo "<td>" . $data['precipitations'] . "</td>";
        echo "<td>" . $data['date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function verifDate() {

    $date = date("Y-m-d");
    $bdd = connectBdd();
    $query = $bdd->prepare(" SELECT * FROM meteo WHERE date=:date");
    $query->execute(["date" => $date]);
    $infos = $query->fetch();
    if (empty($infos)) {
        exec("meteo.exe");
    }
}

function welcome() {
    $isMember = intToMember();
    $bdd = connectBdd();
    $query = $bdd->prepare("SELECT prenom,nom FROM inscrit WHERE email=:email AND isMember=:isMember");
    $query->execute([ "email" => $_SESSION['user']->getEmail(), "isMember" => $_SESSION['user']->getIsMember()]);
    $infos = $query->fetch();
    echo "<b>Compte : <i>" . $infos[1] . " " . $infos[0] . "</i></b><br>";
    echo "<b>Compte de type : <i>" . $isMember . "</i></b>";
}

function intToMember() {
    if ($_SESSION["user"]->getIsMember() == 0) {
        $isMember = "Client";
    }
    if ($_SESSION["user"]->getIsMember() == 1) {
        $isMember = "Membre";
    }
    return $isMember;
}

function memberToInt() {
    if ($_SESSION["user"]->getIsMember() == "Client") {
        $isMember = 0;
    }
    if ($_SESSION["user"]->getIsMember() == "Membre") {
        $isMember = 1;
    }
    return $isMember;
}

function showmoney() {
    echo "<br><b>Votre credit est de : " . $_SESSION["user"]->getCredit() . " €</b>";
}

function welcomeadmin() {
    $bdd = connectBdd();

    $query = $bdd->prepare(" SELECT prenom,nom FROM administrateur WHERE email=:email");
    $query->execute([ "email" => $_SESSION['email']]);
    $infos = $query->fetch();
    echo "<b>Bienvenue <i>" . $infos[1] . " " . $infos[0] . "</i></b><br>";
    echo "<b>Compte de type<i> : Administrateur</i></b>";
}

function verifDateService($date) {
    if ($date > time()) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function isConnected() {
    if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
        return false;
    }
    $bdd = connectBdd();
    $query = $bdd->prepare(" SELECT id FROM inscrit WHERE email=:mail AND isMember=:isMember");
    $query->execute([
        "mail" => $_SESSION["user"]->getEmail(),
        "isMember" => $_SESSION["user"]->getIsMember()
    ]);
    $resultat = $query->fetch();

    if (empty($resultat)) {
        return false;
    }
    return true;
}

//cette fonction vérifie si un stationnement a été demandé à la date donnée en paramètre afin de vérifier si un service peux être demandé à cette date
function canReserve($debut) {
    if(isset($_SESSION["panier"][1])){
        if($debut > $_SESSION["panier"][1][2] && $debut < $_SESSION["panier"][1][3]){ //faire avec le $session panier!!!!!!
            return 1;
        }
    }
    $bdd = connectBdd();
    $query = $bdd->prepare("SELECT id FROM facture WHERE idUser = :id");
    $query->execute([ "id" => $_SESSION["user"]->getId()]);
    while ($factures = $query->fetch()) {
        $atterrissage = $bdd->prepare("SELECT debut, fin FROM options_stationnement WHERE facture = :facture");
        $atterrissage->execute([ "facture" => $factures[0]]);
        $resultat = $atterrissage->fetch();
        if (empty($resultat)) {
            continue;
        } else {
            if ($debut >= $resultat['debut'] && $debut <= $resultat['fin']) {
                return 1;
            }
        }
    }
    return 0;
}
//cette fonction prend en paramètre une date et un entier et vérifie si le type de véhicule indiqué est disponible à l'heure indiquée
function availableVehicule($vehicule, $date){
    $bdd = connectBdd();
    $before60 = date("Y-m-d H:i:s", strtotime($date)-(60*60));
    $after60 = date("Y-m-d H:i:s", strtotime($date)+(60*60));
    $before90 = date("Y-m-d H:i:s", strtotime($date)-(90*60));
    $after90 = date("Y-m-d H:i:s", strtotime($date)+(90*60));
    switch ($vehicule) {
        case 1: // avions école
            $req1 = $bdd->prepare('SELECT COUNT(*) as nb FROM vehicule WHERE type = \'avion ecole\'');
            $req1->execute();
            $nbPlanesSchool = $req1->fetch();
            $req2 = $bdd->prepare("SELECT COUNT(*) as nb FROM options_lecon WHERE date > :avant AND date < :apres");
            $req2->execute([
                "avant" => $before60,
                "apres" => $after60
            ]);
            $nbPlanesReserved = $req2->fetch();
            if($nbPlanesSchool["nb"] <= $nbPlanesReserved["nb"]){
                return 0;
            }else {
                 return 1;
            }
            break;

        case 2: // avions voyages
            $req1 = $bdd->prepare('SELECT COUNT(*) as nb FROM vehicule WHERE type = \'avion voyage\'');
            $req1->execute();
            $nbPlanesTrip = $req1->fetch();
            $req2 = $bdd->prepare("SELECT COUNT(*) as nb FROM options_parachute WHERE date > :avant AND date < :apres");
            $req2->execute([
                "avant" => $before90,
                "apres" => $after90
            ]);
            $nbPlanesReserved = $req2->fetch();
            if($nbPlanesTrip["nb"] <= $nbPlanesReserved["nb"]){
                return 0;
            }else {
                return 1;
            }
            break;

        case 3: // disponibilité ulm
            $req1 = $bdd->prepare('SELECT COUNT(*) as nb FROM vehicule WHERE type = \'ulm\'');
            $req1->execute();
            $nbULM = $req1->fetch();
            $req2 = $bdd->prepare("SELECT COUNT(*) as nb FROM options_bapteme WHERE date > :avant AND date < :apres");
            $req2->execute([
                "avant" => $before90,
                "apres" => $after90
            ]);
            $nbPlanesReserved = $req2->fetch();
            $nbTaken = $nbPlanesReserved["nb"]; //on range le resultat dans une variavble pour la prochaine requète

            $req2 = $bdd->prepare("SELECT COUNT(*) as nb FROM options_location_ulm WHERE date > :avant AND date < :apres");
            $req2->execute([
                "avant" => $before90,
                "apres" => $after90
            ]);
            $nbPlanesReserved = $req2->fetch();
            $nbTaken += $nbPlanesReserved["nb"]; //on a la somme des deux resultats
            if($nbULM["nb"] <= $nbTaken){
                return 0;
            }else {
                return 1;
            }
            break;

        default:
            return -1;
            break;
    }
}
    //la fonction prend une date en parametre et vérifie si le centre est ouvert aux dates données
    function respectAerodromSchedule($date){
        $bdd = connectBdd();
        $query = $bdd->prepare('SELECT * FROM horaires');
        $query->execute();
        $schedules = $query->fetch();
        $timeStamp = strtotime($date);
        $timeOpen = strtotime( $schedules["ouverture"]);
        $timeClose = strtotime( $schedules["fermeture"]);
        if(date("m-d", $timeStamp) >= date("m-d", $timeOpen) && date("m-d", $timeStamp) <= date("m-d", $timeClose)){
            return 1;
        }else {

            if(date("D", $timeStamp) == "Sun" || date("D", $timeStamp) == "Sat"){
                return 1;
            }
            else {
                if (date("m-d", $timeStamp) == "01-01" || date("m-d", $timeStamp) == "11-11" || date("m-d", $timeStamp) == "12-25" || date("m-d", $timeStamp) == "11-01") {
                    return 1;
                }
                else {
                    return 0;
                }
            }
        }
    }

function alreadyLanded($startDate){

  $bdd = connectBdd();
  $query = $bdd -> prepare("SELECT id FROM facture WHERE idUser = :id");
  $query->execute(["id" => $_SESSION["user"]->getId()]);
  while($factures = $query->fetch()){
      $debutStationnement = $bdd->prepare("SELECT debut FROM options_stationnement WHERE facture = :facture");
      $debutStationnement->execute(["facture" => $factures[0]]);
      $resultat = $debutStationnement->fetch();
      if (empty($resultat)) {
          continue;
      } else {
          if ($startDate == $resultat['debut']) {
              return 1;
          }
       }
  }
    /*if($_SESSION["panier"]->getAtterissage()->getDate == $startDate){
        return 1;
    }*/
  return 0;

}

function landingPossible($currentDate){
  $bdd = connectBdd();
  $before = date("Y-m-d H:i:s", strtotime($currentDate)-60*59);
  $after = date("Y-m-d H:i:s", strtotime($currentDate)+60*59);
  $query = $bdd -> prepare("SELECT debut FROM options_atterissage WHERE debut > :before AND debut < :after");
  $query->execute([
    "before" => $before,
    "after"  => $after
  ]);
  $resultat = $query->fetch();
        if (!empty($resultat)) {
            return 0;
        }
  return 1;
}

function instructorAvailable($idInstructor ,$date){
    $bdd = connectBdd();
    $before = date("Y-m-d H:i:s", strtotime($date)-60*59);
    $after = date("Y-m-d H:i:s", strtotime($date)+60*59);
    $query = $bdd -> prepare("SELECT * FROM options_lecon WHERE instructeur = :id AND date > :before AND date < :after");
    $query->execute([
        "id" => $idInstructor,
        "before" => $before,
        "after" => $after
    ]);
    $resultat = $query->fetch();
    if (!empty($resultat)){
        return 0;
    }
    $query = $bdd -> prepare("SELECT * FROM options_bapteme WHERE instructeur = :id AND date > :before AND date < :after");
    $query->execute([
        "id" => $idInstructor,
        "before" => $before,
        "after" => $after
    ]);
    $resultat = $query->fetch();
    if (!empty($resultat)){
        return 0;
    }
    return 1;
}


?>
