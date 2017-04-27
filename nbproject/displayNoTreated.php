<?php
    require 'init.php';
    $bdd = connectBdd();
    
    $query = $bdd->query("SELECT message, id, date FROM messageprive WHERE lu = 0 ORDER BY date desc");
    $resultat = $query->fetchAll();
    
    if(empty($resultat)){
                    echo '<h3>vous n\'avez aucun messages</h3>';
                        
                }
                else{
                    foreach($resultat as list($message, $id, $date)){
                        echo '<h3><br>'.nl2br(htmlspecialchars($message))." ".$date.'</h3>';    
                    }               
                }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

