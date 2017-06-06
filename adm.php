<?php
require_once('/php/autoload.php');
Session::getInstance()->start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SNAPTOAST</title>
		<link rel="stylesheet" href="./css/default.css" title = "default">
	</head>

	<body>

		<header>
		<center><h1><a href="index.php">Snap Snap Spot !</a></h1></center>
		<!-- <center><img src="./image/favicon.png" alt="logo_appli" /></center> -->
		</header>

		<h1>TITRE EVENEMENT</h1>

		<?php 
			if (Authentification::getInstance()->isAuth()==false) { ?>
			<center><a href="adm.php?page=connexion">Connexion</a></center>

    	<?php } 
    		else { ?>
    		<center><ul id="menu_horizontal">
		    			<li class="btn" ><a href="adm.php?page=appli">Appli</a></li>
		    			<li class="btn" ><a href="adm.php?page=data">Data</a></li>
					</ul></center>
    	<?php	} ?>

		<footer>
            <center>
		<p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
            </center>
        </footer>
	</body>
</html>
