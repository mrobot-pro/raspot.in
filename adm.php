<?php

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

//gestion mot de passe
echo '<form action="adminappli.php" method="post">';
	echo '<center><label>Mot de Passe</label><br>';
	echo	'<input type="password" name="mdp" required/><br>';
    echo    '<input type="submit" value="Valider"/></center>';
echo '</form>';

include('footer.php');

?>

    </body>
</html>
