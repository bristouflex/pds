<!DOCTYPE HTML>
<html>
<head>
    <title>AEN - Online</title>
    <meta name="description" lang="en" content="Bienvenue sur le site de l'AEN">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Ecommerce service aerodrome Evreux" />

    <!-- Bootstrap files -->
    <link href="css/theme-front/bootstrap.css" rel='stylesheet' type='text/css'/>

	<!-- Custom Theme files -->
	<link href="css/theme-front/style.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->

	<!--webfont-->
	<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
	<div class="container">
		<div class="header-top">
			<div class="logo">
				<a href="index.php"><img src="images/aenLogo.png" alt=""/></a>
			</div>
			<div class="header_right">
               <!-- <br><a href="logout.php">Deconnexion</a> -->
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="banner_wrap">
			<div class="bannertop_box">
				<ul class="login">
					<li class="login_text"><a href="logout.php">Logout</a></li>
					<li class="wish"><a href="online.php">Accueil</a></li>
					<div class='clearfix'></div>
				</ul>
				<div class="cart_bg">
					<ul class="cart">
						<a href="panier.php">
							<h4><i class="cart_icon"> </i><p>Panier: <span class=""><?php echo $_SESSION["panier"]->getTotal()."€"; ?></span> </p><div class="clearfix"> </div></h4>
						</a>
						<h5 class="empty"><a  class="simpleCart_empty"><?php echo $_SESSION["panier"]->isEmpty()?"panier vide":"achats non validés" ?></a></h5>
						<div class="clearfix"> </div>
					</ul>
				</div>
				<ul class="quick_access">
					<li class="view_cart"><a href="panier.php">Voir Panier</a></li>
					<li class="check"><a href="">Vider Panier</a></li>
					<div class='clearfix'></div>
				</ul>
				<div class="search">
					<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
					<input type="submit" value="">
				</div>
				<div class="welcome_box">
                    <?php
                        welcome();
                        verifDate(); // verifie si la date d'aujourdhui est en bdd
                       // printMeteo(); // affiche la meteo
                        showmoney();
                    ?>
				</div>
			</div>
			<div class="banner_right">
				<h1>Bienvenue <br>chez AEN</h1>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
			</div>
			<div class='clearfix'></div>
		</div>
	</div>
</div>
<div class="main">
    <div class="content_box">
        <div class="container">
            <div class="row">