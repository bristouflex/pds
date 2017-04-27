<?php
require "init.php";
if (!isConnected()) {
    header("location: login.php");
}
?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="contact" description="page d'envoi de messages aux admins">
        <script src="js/ajax.js"></script>
        <title>contacter un administrateur</title>
        
            <?php
            require 'header.php';
            welcome();
            showmoney();
            ?>
                
        <div id="liste_messages">
            <?php
            $bdd = connectBdd();
            /*
              $query2 = $bdd->prepare("SELECT id FROM inscrit WHERE email = :email");
              $resultat2 = $query2 -> execute(["email" => $_SESSION["email"]]);
              echo $resultat2; */

            $query = $bdd->prepare("SELECT message, date FROM messageprive WHERE idEnvoi = :id");
            $query->execute(["id" => $_SESSION["id"]]);
            $resultat = $query->fetchAll();
            if (empty($resultat)) {
                echo '<h3>vous n\'avez envoyé aucun messages</h3>';
            } else {
                foreach ($resultat as list($message, $date)) {
                    echo '<h3><br>' . nl2br(htmlspecialchars($message)) . " " . $date . '</h3>';
                }
            }
            ?>
            <form method="POST" action="">
                <textarea name="message" class="form-control"></textarea>
                <input type="hidden" value="1" name="id">
                <input type="button" value="envoyer" onclick="sendMessages()">
            </form>
        </div>
    </body>
</html>
