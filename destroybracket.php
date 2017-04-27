<?php
require 'init.php';

$cartPropertySetter = 'set' . ucfirst($_GET['type']);

$_SESSION['panier']->{$cartPropertySetter}(null);

if($_SESSION["user"]->getIsMember()){
    header('Location: buyactivite.php');
}else{
    header('Location: buyservice.php');
}
?>
