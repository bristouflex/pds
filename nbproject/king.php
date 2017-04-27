<?php

require "init.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>AEN - Administration Users</title>
        <meta name="Description" lang="en" content="Bienvenue sur le site QuizAndCo">
    </head>
    <body>
         <h1>Modération Utilisateurs</h1>
         <a href='onlineadmin.php'>Retour</a>

<?php
if(isset($_SESSION["email"])){

$i=0;
echo "<br><br>";
echo "<table>";
    $bdd = connectBdd();
    $answer = $bdd->query ('SELECT * FROM inscrit');
    while($data = $answer->fetch()){
        if ($i==0) {
            echo "<tr><td><b>ID</b></td><td><b>Nom</b></td><td><b>Prenom</b></td><td><b>Email</b></td><td><b>Password</b></td><td><b>Birth</b></td><td><b>Genre</b></td><td><b>Adresse</b></td><td><b>Phone</b></td><td><b>Identity</b></td><td><b>Credit</b></td><td><b>IsMember</b></td><td><b>Statut</b></td></tr>";
            $i=1;
        }      
         echo "<tr>";
        echo "<td>".$data['id']."</td>";
        echo "<td>".$data['nom']."</td>";
        echo "<td>".$data['prenom']."</td>";
        echo "<td>".$data['email']."</td>";
        echo "<td>".$data['password']."</td>";
        echo "<td>".$data['birth']."</td>";
        echo "<td>".$data['genre']."</td>";
        echo "<td>".$data['adresse']."</td>";
        echo "<td>".$data['phone']."</td>";
        echo "<td>".$data['identity']."</td>";
        echo "<td>".$data['credit']."</td>";
        echo "<td>".$data['isMember']."</td>";
        echo "<td>".$data['statut']."</td>";
        echo "<td><a class='boutonstylee' href='activateking.php?id=".$data['id']."'>PARDON</a></td>";
        echo "<td><a class='boutonstylee' href='deleteking.php?id=".$data['id']."'>BAN HAMMER</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
else{
    header("Location: loginadmin.php");
}
?>        
    </body>
</html>