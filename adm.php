<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SnapSpot</title>
		<link rel="stylesheet" href="./css/default.css" title = "default">
	</head>
	<body>

<header>
<center><h1><a href="index.php">Snap Snap Spot !</a></h1></center>
<!-- <center><img src="./image/favicon.png" alt="logo_appli" /></center> -->
</header>
<body>

<?php

//gestion mot de passe
echo '<form action="adm.php" method="post">';
	echo '<center><label>Mot de Passe</label><br>';
	echo	'<input type="password" name="mdp" required/><br>';
    echo    '<input class="btn" type="submit" value="Valider"/></center>';
echo '</form>';

//affichage menu
if(isset($_POST['mdp']) AND ($_POST['mdp'] == "admin")) {
	echo '<center><ul id="menu_horizontal">';
	echo '<li class="btn" ><a href="adminappli.php">Appli</a></li>';
	echo '<li class="btn" ><a href="admindata.php">Data</a></li>';
	echo '</ul></center>';
} else {
   // echo'<center><p>Mot de Passe non reconnu <br>Veuillez contacter <br>l\'Administrateur !</p></center>';
}

?>
		<footer>
            <center>
		<p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
            </center>
        </footer>
	</body>
</html>