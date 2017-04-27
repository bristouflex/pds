<?php
require 'init.php';

unset($_SESSION['panier'][$_GET['inf']]);
if($_SESSION["user"]->getIsMember()){
    header('Location: buyactivite.php');
}else{
    header('Location: buyservice.php');
}
?>
