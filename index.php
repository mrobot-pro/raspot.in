<?php
//==================================Code de calcul des données de la page
require_once('php/autoload.php');
$s = Session::getInstance();
$s->setMaxAge(10000); 
$s->start();
$a = Authentification::getInstance();


//===========Code d'affichage de la page==========
echo <<< EOT
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SnapSpot</title>
		<link rel="stylesheet" href="./css/default.css" title = "default">
    
	</head>
	<body>
EOT;

		
echo '<header>'."\n";
echo '<h1><a href="index.php">SNAP SNAP SPOT !</a></h1>'."\n";
echo '</header>'."\n";
?>

<!--Affichage de l'accueil-->
<div class="accueil">
<img src="./image/favicon.png" id="upfile1" style="cursor:pointer" image-orientation="center" alt="logo_appli" />
<input type="file" id="file1"  name="file1" style="display:none" />
<br>
<div id="explain">Partagez vos photos <br>sur ce spot <br>tout au long de l'événement !</div>
<button id="admin">ADMIN</button>
</div>

<!--Affichage connexion-->
<div class="connexion">
	<img src="./image/favicon.png" alt="logo_appli"/><br>
<!--lien php pour traiter la vérification du mot de passe attendu-->
	<form action='' method='post'>
		<label>Mot de Passe</label>
			<input type='password' name='mdp' value='' required/>
        	<input type='submit' value='Valider'/>
    </form>
</div>

<script type="text/javascript" src="js/jquery-3.2.1.js" ></script>
<script type="text/javascript" src="js/snapspot.js" ></script>

    </body>
</html>
