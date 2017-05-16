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
		<title>Bibliothèque multim&eacute;dia</title>
		<link rel="stylesheet" href="./css/default.css" title = "default">
    
		<script type="text/javascript" src="js/affichage.js"></script>
	</head>
	<body>


EOT;
echo '<header>'."\n";
echo '<h1><a href="index.php">SNAP SNAP SPOT !</a></h1>'."\n";
echo '</header>'."\n";
?>
<div id="explain">Partagez vos photos sur ce spot tout au long de la soirée !</div>
<!--Solution 1-->
<img src="./image/favicon.png" id="upfile1" style="cursor:pointer" />
<input type="file" id="file1"  name="file1" style="display:none" />
<script type="text/javascript" src="js/jquery-3.2.1.js" > </script>
<script type="text/javascript" src="js/snapspot.js" > </script>


    </body>
</html>

