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
?>

<!--emplacement de l'header-->
<?php include('header.php'); ?>

<!--emplacement accueil-->
<?php include('accueil.php'); ?>

<!--ici pied de cochon-->
<?php include('footer.php'); ?>

    	<script type="text/javascript" src="js/jquery-3.2.1.js" ></script>
		<script type="text/javascript" src="js/snapspot.js" ></script>

    </body>
</html>
