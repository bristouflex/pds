<?php
require 'init.php';
    $bdd = connectBdd();
    

    if(!empty($_POST["message"])){
    $query=$bdd->prepare("INSERT INTO messageprive(message, idRecu, idEnvoi) VALUES(:message, :destinataire, :id)");
    $query->execute([
       "message" => $_POST["message"],
       "destinataire" => $_POST["id"], 
       "id" => $_SESSION["id"]
    ]);
    }
    
    $bdd = connectBdd();
  
    $bdd = connectBdd();
    $query = $bdd->prepare("SELECT message, date FROM messageprive WHERE idEnvoi = :id");
    $query ->execute(["id" => $_SESSION["id"]]);                   
    $resultat = $query->fetchAll();             
    if(empty($resultat)){
        echo '<h3>vous n\'avez envoyé aucun messages</h3>';
                        
    }
    else{
        foreach($resultat as list($message, $date)){
            echo '<h3><br>'.nl2br(htmlspecialchars($message))." ".$date.'</h3>';    
        }               
    }
    
    echo '<form method="POST" action="">
                <textarea name="message" class="form-control"></textarea>
                <input type="hidden" value="1" name="id">
                <input type="button" value="envoyer" onclick="sendMessages()">
            </form>';
           

    