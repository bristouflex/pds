<?php
require 'init.php';

unset($_SESSION['panier'][$_GET['inf']]);
header('Location: online.php');
?>