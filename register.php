<?php require "init.php";  ?>

<?php 
  
if(isset($_SESSION['error_subscribe']) ){
	$_POST = $_SESSION;
	echo "<ul>";
	foreach ($_SESSION['error_subscribe'] as $error) {
		echo "<li>".$list_of_errors[$error];
	}
	echo "</ul>";
}

session_destroy();
?>

<?php
require 'recaptchalib.php';
$siteKey = '6LcFdBQUAAAAAFIDOzCpsU75RzkkVB2HEJYdyWSM'; // votre clé publique
$secret = '6LcFdBQUAAAAAHnYigmWw4ALqQ8lard80vlmuQMA'; // votre clé privée
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <title>AEN - Inscription</title>
        <meta name="Description" lang="fr" content="Inscription AEN">
        <script src="https://www.google.com/recaptcha/api.js"></script>
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
        <div class="container content-background">
            <h1>Inscription</h1>
            <a href="index.php">Retour</a>
            <div class="row">
                <div class="col-xs-5">
                    <h3>Bienvenue sur le formulaire d'inscription, Veuillez remplir tous les champs ci-dessous.</h3>
                </div>
            </div>
            <div class="form-container">



                <form class="register-form" method="POST" action="subscribe.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class=" form-group row">
                            <label for="nom" class="col-sm-4 col-form-label">Nom</label>
                            <div class=" col-sm-8">
                                <input class="form-control" type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo (isset($_POST["nom"]))?$_POST["nom"]:"";?>" required><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <label for="prenom" class="col-sm-4 col-form-label">Prenom</label>
                            <div class=" col-sm-8">
                                <input class="form-control" type="text" name="prenom" id="prenom" placeholder="Prenom" value="<?php echo (isset($_POST["prenom"]))?$_POST["prenom"]:"";?>" required><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class=" col-sm-8">
                                <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="<?php echo (isset($_POST["email"]))?$_POST["email"]:"";?>" required><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class=" col-sm-8">
                                <input class="form-control" type="password" id="password" class="form-control-file" name="password1" placeholder="Mot de passe" required><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <label for="confirmation" class="col-sm-4 col-form-label">Confirmation</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="password" id="confirmation" class="form-control-file" name="password2" placeholder="Confirmation" required>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <label for="file" class="col-sm-4 col-form-label">Avatar</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                                <input class="form-control-file file" type="file" name="avatar"><br>
                            </div>
                        </div>
                        <div class="row">
                            <label for="genre" class="col-sm-4 col-form-label">Genre:</label>
                            <div class="col-sm-8">
                                <select name="genre" class="form-control" id="genre">
                                <?php 
                                foreach ($list_of_genre as $genre) {
                                    echo "<option ".((isset($_POST["genre"]) && $genre == $_POST["genre"])?"selected='selected'":"").">".$genre."</option>";
                                }
                                ?>
		                        </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="birth" class="col-sm-4 col-form-label">Date de naissance</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="date" id="birth" name="birth" placeholder="Votre naissance" value="<?php echo (isset($_POST["birth"]))?$_POST["birth"]:" "; ?>" required><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <label for="adresse" class="col-sm-4 col-form-label">Adresse</label>
                            <div class="col-sm-8">
                                <input type="text" name="adresse" id="adresse" placeholder="rue numero de rue, ville" class="form-control" value="<?php echo (isset($_POST["adresse"]))?$_POST["adresse"]:"";?>" required><br><br>
                            </div>
                        </div>
                        <div class="row">
                            <label for="phone" class="col-sm-4 col-form-label">Téléphone</label>
                            <div class="col-sm-8">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Telephone" value="<?php echo (isset($_POST["phone"]))?$_POST["phone"]:"";?>" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="type" class="col-sm-4 col-form-label">Type de compte</label>
                            <div class="col-sm-8">
                                <select name="isMember" id="type" class="form-control">       
                            <?php 
                                foreach ($list_of_accounts as $account) {
			                     echo "<option ".((isset($_POST["isMember"]) && $account == $_POST["isMember"])?"selected='selected'":"").">".$account."</option>";
		                      }
		                      ?>
		                      </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label class="form-check-label col-sm-4 col-form-label">Validation des CGU</label>
                            <div class="form-check col-sm-8">
                                <input class="form-check-input" type="checkbox" name="cgu"> j'accepte les clauses du CGU
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="g-recaptcha" data-sitekey="6LcFdBQUAAAAAFIDOzCpsU75RzkkVB2HEJYdyWSM"></div>
                                <input class="btn btn-default" type="submit" value="Valider">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>

    </html>
