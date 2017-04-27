<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="js/code.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>AEN</title>
    <meta name="Description" content="Bienvenue sur le site de l'AEN">
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Connectez vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                </div>
                <div class="modal-body">
                    <?php 
            include "login.php";
          ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <header>
        <div class="container" id="accueil">
            <div class="navbar navbar-default">
                <div class="navbar-header">
                    <a class="navbar-brand">AEN-Aerodrome Evreux</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#connexion">
  connexion
</button> </li>
                    <li> <button type="button" class="btn"><a href="register.php"> s'inscrire </a></button></li>
                </ul>
            </div>
            <div class="col-xs-offset-1 col-xs-10 content-background">
                <ul class="breadcrumb">
                    <li><a href="#">A propos d'AEN</a></li>
                    <li><a href="#">Club de l'aerodrome</a></li>
                    <li><a href="#">Avantages clients AEN</a></li>
                </ul>

                <h1>AEN - Accueil</h1>

                <h3>Description</h3>
                <p>Bienvenue sur le site de l'AEN, situé à EVREUX, nous avons un positionnement stratégique et un système de service simple et efficace.<br>Vous pouvez vous inscrire en tant que membre pour particier à des activitées, ou vous pouvez vous inscrire en tant que client pour utiliser nos services.<br>Merci de votre confiance</p>

                <h3>Inscription</h3>
                <p>Vous souhaitez faire parti du club de membres de l'AEN ?<br>Ou vous souhaitez utiliser nos services comme simple client ? Inscrivez vous sur notre site !</p>

                <h3>Connexion</h3>
                <p>Déjà propriétaire d'un compte client où d'un compte membre ? Connectez vous pour acceder à vos services.</p>

                <h3>Contacts</h3>
                <p>Vous pouvez nous contacter au XX.XX.XX.XX.XX</p>
            </div>
        </div>
    </header>
</body>

</html>
