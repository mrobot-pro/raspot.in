<?php
/*
require_once('php/autoload.php');
session_start();
$s = Session::getInstance();
$s->setMaxAge(10); 
$s->start();
$a = Authentification::getInstance();
*/

require_once('php/autoload.php');
session_start();

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

echo session_id();
echo '<br>';
echo session_cache_expire();
echo <<< ZOB
<header>
<center><h1><a href="index.php">Snap Snap Spot !</a></h1></center>
<center><img src="./image/favicon.png" alt="logo_appli" /></center>
</header>

<form method="post" id='uploadform' action="reception.php" enctype="multipart/form-data">
<center><img src="./css/camera.ico" id="upfile1" width="75" style="cursor:pointer" image-orientation="center"  alt="logo_appli" type="submit" />
<input type="file" id="mon_fichier"  name="mon_fichier" style="display:none"  />
</form>

<script>
document.getElementById("mon_fichier").onchange = function() {document.getElementById("uploadform").submit();}
</script>

<div>
	<p>Partagez vos photos </p>
	<p>sur ce spot </p>
	<p>tout au long de l'événement !</p>
</div></center>
ZOB;

if(isset($_POST['evenement']) && !empty($_POST['evenement'])){
    echo $_POST['evenement'];
}
else{
    echo '<center><h1>BONJOUR</h1></center>';
}

//ici pied de page
echo <<<EOT
        <footer>
            <center>
		<p>&copy;2017 - David Fournier&nbsp;&amp;&nbsp;Olivier Welter.</p>
            </center>
        </footer>
    </body>
</html>

    	<script type="text/javascript" src="js/jquery-3.2.1.js" ></script>
	<script type="text/javascript" src="js/snapspot.js" ></script>
EOT;
 echo   '</body>';
echo'</html>';
