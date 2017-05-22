<?php
//==================================Code de calcul des données de la page
require_once('php/autoload.php');
$s = Session::getInstance();
$s->setMaxAge(10); 
$s->start();
$a = Authentification::getInstance();


include('./php/includes/heading.php'); 

//emplacement de l'header
include('./php/includes/header.php');

//emplacement accueil
include('./php/includes/accueil.php');

//ici pied de page
include('./php/includes/footer.php');
?>

    	<script type="text/javascript" src="js/jquery-3.2.1.js" ></script>
	<script type="text/javascript" src="js/snapspot.js" ></script>

    </body>
</html>
