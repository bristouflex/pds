<?php 
 if(isset($_FILES['avatar'])){

  
    $dossier = 'upload/';
    $fichier = basename($_FILES['avatar']['name']);
    $taille_maxi = 100000;
    $taille = filesize($_FILES['avatar']['tmp_name']);
    $extensions = array('.png', '.bmp', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['avatar']['name'],'.');

    //verification de securité 
    if(!in_array($extension, $extensions))
    {
      $_SESSION["error_subscribe"][]=11;
      $error = true;
      $erreur = 'Vous devez uploader un fichier de type png, bmp, jpg, jpeg';
    }
    if ($taille > $taille_maxi) 
    {
      // $_SESSION["error_subscribe"][]=14;
     $erreur = 'Le fichier est trop gros...';
    }
   if(!isset($_SESSION["error_subscribe"])) //S'il n'y a pas d'erreur, on upload
    {
    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier.$fichier))//Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {
        echo 'Upload effectué avec succés !';
    }
    else //sinon (la fonction renvoie FALSE)
    {
        $_SESSION["error_subscribe"][]=13;
      //  echo 'Echec de l\'upload !';
    }  
    }

  
  else{
    echo "Fail";
  }
   }