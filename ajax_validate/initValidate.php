<?php
// Si on inclus pas ces classes (utilisées en session) PHP ne sera pas en mesure d'executer des méthodes directement
// depuis la session.
// Exemple : $_SESSION['panier']->getLocationUlm()
require_once "../Classes/User.php";
require_once "../Classes/Panier.php";

session_start();
require "../conf.inc.php";
require "../functions.php";
