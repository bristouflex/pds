<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <meta charset="utf-8">
    <title>AEN</title>
    <meta name="Description" content="Bienvenue sur le site de l'AEN">
</head>

<body id="index">
    <!-- Modal -->
    <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
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
                    require_once "init.php";
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">AEN-Aérodrome Evreux</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" data-toggle="modal" class="active" data-target="#connexion">Connexion</a></li>
                        <li><a href="register.php">S'inscrire</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </header>
    <div class="container" id="accueil">
        <div class="col-xs-offset-1 col-xs-10 content-background">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">A propos</a></li>
                <li role="presentation"><a href="#club" aria-controls="club" role="tab" data-toggle="tab">Club de l'aérodrome</a></li>
                <li role="presentation"><a href="#benefits" aria-controls="benefits" role="tab" data-toggle="tab">Avantages clients AEN</a></li>
            </ul>

            <!-- Tab panes -->
            <?php
                if(isset($_SESSION['inscription']) && $_SESSION['inscription'] == 1){
                    echo "<h1 align='center'>inscription réussie!</h1>";
                    $_SESSION['inscription'] = 0;
                }else{
                    echo '<div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="about">
                    <h1>AEN - Accueil</h1>

                    <h3>Description</h3>
                    <p>Bienvenue sur le site de l\'AEN, situé à EVREUX, nous avons un positionnement stratégique et un système de
                        service simple et efficace.<br>Vous pouvez vous inscrire en tant que membre pour particier à des activitées,
                        ou vous pouvez vous inscrire en tant que client pour utiliser nos services.<br>Merci de votre confiance</p>

                    <h3>Inscription</h3>
                    <p>Vous souhaitez faire parti du club de membres de l\'AEN ?<br>Ou vous souhaitez utiliser nos services comme
                        simple client ? Inscrivez vous sur notre site !</p>

                    <h3>Connexion</h3>
                    <p>Déjà propriétaire d\'un compte client où d\'un compte membre ? Connectez vous pour acceder à vos services.</p>

                    <h3>Contacts</h3>
                    <p>Vous pouvez nous contacter au XX.XX.XX.XX.XX</p>

                </div>
                <div role="tabpanel" class="tab-pane" id="club">
                    <h1>Club de l\'aérodrome</h1>
                    <h3>Rejoignez notre aeroclub pour pouvoir profiter des nos offres les plus sensationnelles! Prenez vos heures pour
                     votre permis de vol,<br> réservez des baptêmes de l\'air ou des sauts en parachutes...</h3>
                </div>
                <div role="tabpanel" class="tab-pane" id="benefits">
                    <h1>CLients de l\'aérodrôme</h1>
                    <h3>Devenez clients de l\'aeroclub et accéder à tous nos avantages! Réservez vos atterrissages, stationnez sur notre
                    base, faîtes nettoyer votre appareil...<br> Inscrivez vous pour tout découvrir!</h3>
                </div>
            </div>';
                }
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/code.js"></script>
</body>

</html>
