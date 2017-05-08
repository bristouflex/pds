<?php
require 'init.php';

$cartPropertySetter = 'set' . ucfirst($_GET['type']);

$_SESSION['panier']->{$cartPropertySetter}(null);

header('Location: panier.php');
?>
