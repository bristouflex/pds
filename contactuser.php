<?php
    require 'init.php';
    $bdd = connectBdd();
    
?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="contact" description="répondres aux utilisateurs">
        <script src="js/ajax.js"></script>
        <title>gérer les problèmes des utilisateurs</title>
    </head>
    <body>
        <a href="#" onclick="noTreat()">problèmes non traités</a>
        <a href="#" onclick="archives()">archivés</a>
        <a href="#" onclick="noTerminated()">en cours</a>
        <div id="content">
            
        </div>
    </body>
</html>

