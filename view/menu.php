<div class="col-md-3">
	<div class="menu_box">
		<h3 class="menu_head">Menu</h3>
		<ul class="nav">
			<li><a href="money.php">Ajouter du crédit</a></li>
			<li><a href="historiquetransaction.php">Historique Transactions</a></li>
            <?php
            if ( $_SESSION["user"]->getIsMember() == 0 ) {
                echo '<li><a href="myservice.php">Mes services</a></li>';
            }
            if ( $_SESSION["user"]->getIsMember() == 1 ) {
                echo '<li><a href="myactivity.php">Mes activités</a></li>';
            }
            ?>
            <li><a href="messages.php">Contacter un administrateur</a></li>
            <li><a href="myinfo.php">Mes informations personnelles</a></li>
		</ul>






	</div>
</div>