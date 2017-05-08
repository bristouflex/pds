<?php
/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 08/05/2017
 * Time: 16:24
 */
require_once 'initprintback.php';
if(!isConnected()){
    session_destroy();
    header("location: ../index.php");
}

echo $_SESSION["panier"]->getTotal();

