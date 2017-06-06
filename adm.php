<?php
require_once('/php/autoload.php');
session_start();
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
			if (!$admin->isAuthenticated()) { ?>
			<form action="" method="post">
            		<center><label>Mot de Passe</label><br>
                    <input type="password" name="mdp" required/><br>
                    <input class="btn" type="submit" value="Valider"/></center>
        	</form>
    	<?php } ?>

		<?php 
			if ($admin->isAuthenticated()) { ?>
			<center><ul id="menu_horizontal">
            		<li class="btn" ><a href="adm.php?page=adminappli.php">Appli</a></li>';
            		<li class="btn" ><a href="admindata.php">Data</a></li>';
            		</ul></center>
		<?php } ?>


		<footer>
            <center>
		<p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
            </center>
        </footer>
	</body>
</html>
