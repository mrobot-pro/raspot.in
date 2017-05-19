<?php

if(isset($_POST['mdp']) AND ($_POST['mdp'] == "admin")) {
	
echo <<< EOT
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SnapAdmin</title>
		<link rel="stylesheet" href="./css/default.css" title = "default">

	</head>
	<body>
EOT;

include('header.php');

echo '
<form action="" method="post">
	 <center>
	 	<label>Nom de l\'Evenement:</label><br>
			<input type="text" name="evenement" placeholder="Evenement..." />
       		<input type="submit" value="Valider"/><br>
       	<label>Message d\'Explication:</label><br>
       		<input type="text" name="explication" placeholder="Slogan..." />
       		<input type="submit" value="Valider"/><br>
       	<label>Changer de Mot de Passe:</label><br>
       		<input type="password" name="password" placeholder="********" />
       		<input type="submit" value="Valider"/><br>
       	<label>Changer Image de Fond:</label><br>
        	<input type="file" name="imagefond" />
        	<input type="submit" value="Valider"/><br>
       	<label>Taille Maximale des Photos:</label><br>
       		<input type="number" name="taillemaxphoto" min="0" placeholder="En MegaOctet..." />
       		<input type="submit" value="Valider"/><br>
       	<p>Utilisation du Disque Principal:
       		<progress id="avancement" value="50" max="100"></progress>
		</p>
</form>
';

include('footer.php');

}

?>

	</body>
</html>
